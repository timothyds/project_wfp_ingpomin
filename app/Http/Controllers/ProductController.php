<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Hotel;
use App\Models\Product;
use App\Models\Product_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$product = Product::all();
        $hotel = Hotel::all();
        $type = Product_Type::all();
        $facility = Facility::all();
        $rs = Product::all();
        foreach ($rs as $r) {
            $directory = public_path('product/' . $r->id);
            if (File::exists($directory)) {
                $files = File::files($directory);
                $filenames = [];
                foreach ($files as $file) {
                    $filenames[] = $file->getFilename();
                }
                $r['filenames'] = $filenames;
            }
        }
        return view('produk.index', compact('rs', 'hotel', 'type', 'facility'));
        // return view('produk.index', compact('rs', 'hotel'));
        //dd($product); -> Untuk Debugging
        //return view('produk.index', ['datas' => $product, 'hotel' => $hotel]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotel = Hotel::all();
        return view('produk.create', compact('hotel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'available_room' => 'required',
            'type' => 'required',
            'hotel' => 'required',
            'facilities' => 'required|array',

        ]);
        // Type::create($request->all());

        $data = new Product();
        $data->name = $request->get('name');
        $data->price = $request->get('price');
        $data->image = $request->get('image');
        $data->available_room = $request->get('available_room');
        $data->product_type_id = $request->get('type');
        $data->hotel_id = $request->get('hotel');
        $data->save();

        $product_id = $data->id;
        $facility_ids = $request->get('facilities');
        foreach ($facility_ids as $facility_id) {
            DB::insert('INSERT INTO facility_product (product_id, facility_id) values (?, ?)', [$product_id, $facility_id]);
        }
        return redirect('produk')->with('status', 'Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::find($id);
        //dd($data);
        return view('produk.show', compact('data'));

        // return view('produk.show',['data'->$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Product::find($id);
        $hotel = Hotel::all();
        $tipe = Product_Type::all();
        return view('produk.edit', compact('data', 'hotel', 'tipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatedData = Product::find($id);
        $updatedData->name = $request->name;
        $updatedData->price = $request->get('price');
        $updatedData->image = $request->get('image');
        $updatedData->available_room = $request->get('available_room');
        $updatedData->product_type_id = $request->get('type');
        $updatedData->save();

        $facility_ids = $request->get('facilities');

        DB::table('facility_product')->where('product_id', $id)->delete();

        foreach ($facility_ids as $facility_id) {
            DB::insert('INSERT INTO facility_product (product_id, facility_id) values (?, ?)', [$id, $facility_id]);
        }
        return redirect()->route('produk.index')->with('status', 'Horray ! Your data is successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            //if no contraint error, then delete data. Redirect to index after it.
            $data = Product::find($id);
            $data->delete();
            return redirect()->route('produk.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\Throwable $th) {
            // Failed to delete data, then show exception message
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('produk.index')->with('status', $msg);
        }
    }
    public function getEditFormB(Request $request)
    {
        $id = $request->id;
        $data = Product::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('produk.getEditFormB', compact('data'))->render()
        ), 200);
    }
    public function saveDataTD(Request $request)
    {
        $id = $request->id;
        $data = Product::find($id);
        $data->name = $request->name;
        $data->price = $request->get('price');
        $data->image = $request->get('image');
        $data->available_room = $request->get('available_room');
        $data->save();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'product data is up-to-date !'
        ), 200);
    }
    public function deleteData(Request $request)
    {
        $id = $request->id;
        $data = Product::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'type data is removed !'
        ), 200);
    }
    public function uploadPhoto(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        return view('produk.formUploadLogo', compact('product'));
    }
    public function simpanPhoto(Request $request)
    {
        $file = $request->file("file_photo");
        $folder = 'product/' . $request->product_id;
        @File::makeDirectory(public_path() . "/" . $folder);
        $filename = time() . "_" . $file->getClientOriginalName();
        $file->move($folder, $filename);
        return redirect()->route('produk.index')->with('status', 'photo terupload');
    }
    public function delPhoto(Request $request)
    {
        File::delete(public_path() . "/" . $request->filepath);
        return redirect()->route('produk.index')->with('status', 'photo dihapus');
    }
}
