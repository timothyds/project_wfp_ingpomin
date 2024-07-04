<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FrontEndController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        // return view('frontend.index', compact('products'));

        $hotels = DB::table('hotels')->get();
        $caralain = Hotel::all();
        // dd($caralain);
        return view('hotel.index0', ['datas' => $caralain]); //menuju ke view hotel/index.blade.php
    }
    public function show($id)
    {
        //
        $product = Product::find($id);
        if ($product) {
            $directory = public_path('product/' . $product->id);

            if (File::exists($directory)) {
                $files = File::files($directory);
                $filenames = [];

                foreach ($files as $file) {
                    $filenames[] = $file->getFilename();
                }

                $product->filenames = $filenames;
            } else {
                $product->filenames = [];
            }

            return view('frontend.product-detail', compact('product'));
        } else {
            return redirect()->back()->with('error', 'Product not found');
        }
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $cart = session()->get('cart');

        // Fetch the filenames of the product
        $directory = public_path('product/' . $product->id);
        $filenames = [];
        if (File::exists($directory)) {
            $files = File::files($directory);
            foreach ($files as $file) {
                $filenames[] = $file->getFilename();
            }
        }

        if (!isset($cart[$id])) {
            $cart[$id] = [
                'id' => $id,
                'name' => $product->name,
                'type' => $product->product_type->name,
                'quantity' => 1,
                'price' => $product->price,
                'photo' => $product->image,
                'filenames' => $filenames // Store filenames in cart
            ];
        } else {
            $cart[$id]['quantity']++;
        }

        session()->put('cart', $cart);
        return redirect()->back()->with("status", "Produk Telah ditambahkan ke Cart");
    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function addQuantity(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('cart');
        $product = Product::find($cart[$id]['id']);
        if (isset($cart[$id])) {
            $jumlahAwal = $cart[$id]['quantity'];
            $jumlahPesan = $jumlahAwal + 1;
            if ($jumlahPesan < $product->available_room) {
                $cart[$id]['quantity']++;
            } else {
                return redirect()->back()->with('error', 'Jumlah pemesanan melebihi total kamar yang tersedia');
            }
        }
        session()->forget('cart');
        session()->put('cart', $cart);
    }
    public function reduceQuantity(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 0) {
                $cart[$id]['quantity']--;
            }
        }
        session()->forget('cart');
        session()->put('cart', $cart);
    }
    public function deleteFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->forget('cart');
        session()->put('cart', $cart);
        return redirect()->back()->with("status", "Produk Telah dibuang dari Cart");
    }
    public function cartCount()
    {
        $cart = session()->get('cart', []);
        $cartCount = count($cart);
        return view('layouts.frontend', compact('cartCount'));
    }
    public function checkout(Request $request)
    {
        $cart = session('cart');
        $user = User::find(Auth::user()->id);

        $pointsToRedeem = $request->input('points', 0);

        $t = new Transaction();
        $t->user_id = $user->id;
        $t->transaction_date = Carbon::now()->toDateTimeString();
        $t->save();

        $totals = $t->insertProducts($cart, $user);
        $preRedemptionTotal = $totals['total'];

        if ($totals['total'] >= 100000) {
            $pointsToRedeem = min($pointsToRedeem, floor($totals['total'] / 100000));
            $discount = $pointsToRedeem * 100000;
            $user->point -= $pointsToRedeem;
            $user->save();

            $totals['total'] -= $discount;
            $totals['tax'] = $totals['total'] * 0.11;
            $totals['grandTotal'] = $totals['total'] + $totals['tax'];
            $totals['discount'] = $discount;
        } else {
            $totals['discount'] = 0;
        }

        session()->forget('cart');

        return view('transaction.receipt', compact('t', 'totals', 'preRedemptionTotal'));
    }
    public function topPoints(){
        $user = DB::select('SELECT name, point FROM users order by point DESC');
        // dd($user);
        return view('frontend.topMember',compact('user'));
    }
    public function topReserved(){
        $top = DB::select('select COUNT(DISTINCT(t.id)) AS jumlah, SUM(subtotal) AS total from transactions t LEFT JOIN product_transaction pt ON t.id = pt.transaction_id');
        // dd($top);
        return view('frontend.topReserved',compact('top'));
    }

}
