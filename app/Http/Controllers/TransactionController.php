<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->query('transaction_id');
        $trans = Transaction::all();
        $user = User::all();
        $cust = Customer::all();
        $prod = Product::all();
        $prodTrans = DB::table('product_transaction')
            ->where('transaction_id', $id)
            ->first();
        return view('transaction.index', ['data' => $trans, 'user' => $user, 'cust' => $cust, 'prod' => $prod, 'prodTrans' => $prodTrans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prod = Product::all();
        $user = User::all();
        $cust = Customer::all();
        return view('transaction.create', compact('prod', 'user', 'cust'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'cust' => 'required',
            'user' => 'required',

        ]);
        // Type::create($request->all());

        $data = new Transaction();
        $data->customer_id = $request->get('cust');
        $data->user_id = $request->get('user');
        $data->save();

        $newIdTrans = $data->id;
        $product_id = $request->get('product');
        $qty = $request->get('qty');
        $total = $request->get('total');
        DB::insert('INSERT INTO product_transaction (product_id,transaction_id,quantity,subtotal) values (?,?,?,?)', [$product_id, $newIdTrans, $qty, $total]);

        // ----------------------- Start Nomor 2 ----------------------- //
        // $poin = 0;

        // // Variable untuk menyimpan data dari checkbox redemption
        // $redemption = false;
        // $product = DB::table('products')->where('id', $product_id)->first();
        // $poinCustomer = DB::table('customers')->where('id', $request->get('cust'))->value('point');

        // // Ngecek apakah checkbox redemption tercentang
        // if ($redemption == true) {

        //     // Konversi dari total belanjaan jadi poin
        //     $total = round($total / 100000);
        //     $poinCustomer = $poinCustomer - $total;

        //     // Update poin customer
        //     $cust = Customer::find($request->get('cust'));
        //     $cust->point = $poinCustomer;
        //     $cust->save();
        // } else {
        //     if ($product == "deluxe" || $product == "superior" || $product == "suite") {
        //         $poin += 5;
        //     } else {
        //         $poin += 1;
        //     }
        //     $cust = Customer::find($request->get('cust'));
        //     $cust->point += $poin;
        //     $cust->save();
        // }
        // ----------------------- End Nomor 2 ----------------------- //

        return redirect('transaction')->with('status', 'Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Transaction::find($id);
        $user = User::all();
        $cust = Customer::all();
        $prod = Product::all();
        $prodTrans = DB::table('product_transaction')
            ->where('transaction_id', $id)
            ->first();
        return view('transaction.edit', compact('data', 'user', 'cust', 'prod', 'prodTrans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatedData = Transaction::find($id);
        $updatedData->customer_id = $request->get('cust');
        $updatedData->user_id = $request->get('user');
        $updatedData->save();

        $old_product_id = $request->get('old_product_id');
        $new_product_id = $request->get('product_id');
        $qty = $request->get('qty');
        $total = $request->get('total');
        $transaction_id = $id;
        DB::update('UPDATE product_transaction SET product_id = ?, quantity = ?, subtotal = ? WHERE product_id = ? AND transaction_id = ?', [$new_product_id, $qty, $total, $old_product_id, $transaction_id]);

        return redirect()->route('transaction.index')->with('status', 'Horray! Your data is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            //if no contraint error, then delete data. Redirect to index after it.
            $data = Transaction::find($id);
            $data->delete();
            return redirect()->route('transaction.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\Throwable $th) {
            // Failed to delete data, then show exception message
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('transaction.index')->with('status', $msg);
        }
    }
    public function showAjax(Request $request)
    {
        $id = ($request->get('id'));
        $data = Transaction::find($id);
        $products = $data->products;
        return response()->json(array('msg' => view('transaction.showModal', compact('data', 'products'))->render()), 200);
    }
    public function getEditFormB(Request $request)
    {
        $id = $request->id;
        $data = Transaction::find($id);
        $user = User::all();
        $cust = Customer::all();
        $prod = Product::all();
        $prodTrans = DB::table('product_transaction')
            ->where('transaction_id', $id)
            ->first();
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('transaction.getEditFormB', compact('data', 'user', 'cust', 'prod', 'prodTrans'))->render()
        ), 200);
    }
    public function saveDataTD(Request $request)
    {
        $id = $request->id;
        $data = Transaction::find($id);
        $data->customer_id = $request->get('cust');
        $data->user_id = $request->get('user');
        $data->save();

        $old_product_id = $request->get('old_product_id');
        $new_product_id = $request->get('product_id');
        $qty = $request->get('qtys');
        $total = $request->get('totals');
        $transaction_id = $id;
        DB::update('UPDATE product_transaction SET product_id = ?, quantity = ?, subtotal = ? WHERE product_id = ? AND transaction_id = ?', [$new_product_id, $qty, $total, $old_product_id, $transaction_id]);
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Transaction data is up-to-date !'
        ), 200);
    }
    public function deleteData(Request $request)
    {
        $id = $request->id;
        $data = Transaction::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Transaction data is removed !'
        ), 200);
    }
    public function showTransactions()
    {
        $transactions = Transaction::with(['products' => function ($query) {
            $query->select('products.id', 'products.name');
        }])->get();

        // Inisialisasi array untuk menyimpan data
        $transactionDetails = [];

        // Loop melalui setiap transaksi
        foreach ($transactions as $transaction) {
            foreach ($transaction->products as $product) {
                $transactionDetails[] = [
                    'transaction_id' => $transaction->id,
                    'user_id' => $transaction->user_id, 
                    'transaction_date' => $transaction->transaction_date,
                    'product_name' => $product->name,
                    'quantity' => $product->pivot->quantity,
                    'subtotal' => $product->pivot->subtotal
                ];
            }
        }

        return view('transaction.showTransactionList', compact('transactionDetails'));
    }
    public function showTransactionsCustomer()
    {
        $userId = Auth::id();
        $transactions = Transaction::with(['products' => function ($query) {
            $query->select('products.id', 'products.name');
        }]) ->where('user_id', $userId)->get();
        // Inisialisasi array untuk menyimpan data
        $transactionDetails = [];

        // Loop melalui setiap transaksi
        foreach ($transactions as $transaction) {
            foreach ($transaction->products as $product) {
                $transactionDetails[] = [
                    'transaction_id' => $transaction->id,
                    'user_id' => $transaction->user_id, 
                    'transaction_date' => $transaction->transaction_date,
                    'product_name' => $product->name,
                    'quantity' => $product->pivot->quantity,
                    'subtotal' => $product->pivot->subtotal
                ];
            }
        }

        return view('transaction.showTransPerCust', compact('transactionDetails'));
    }
}
