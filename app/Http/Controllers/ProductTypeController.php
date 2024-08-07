<?php

namespace App\Http\Controllers;

use App\Models\Product_Type;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product_Type::all();
        return view('pType.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = new Product_Type();
        $data->name = $request->get('name');
        $data->save();

        return redirect('produkType')->with('status', 'Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product_Type $product_Type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Product_Type::find($id);

        return view('pType.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatedData = Product_Type::find($id);
        $updatedData->name = $request->name;
        $updatedData->save();
        return redirect()->route('produkType.index')->with('status', 'Horray! Your data is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            //if no contraint error, then delete data. Redirect to index after it.
            $data = Product_Type::find($id);
            $data->delete();
            return redirect()->route('produkType.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\Throwable $th) {
            // Failed to delete data, then show exception message
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('produk.index')->with('status', $msg);
        }
    }
    public function getEditFormB(Request $request)
    {
        $id = $request->id;
        $data = Product_Type::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('pType.getEditFormB', compact('data'))->render()
        ), 200);
    }
}
