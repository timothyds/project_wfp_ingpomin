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

        return redirect('pType')->with('status', 'Berhasil Ditambah!');
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
        return redirect()->route('pType.index')->with('status', 'Horray! Your data is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product_Type $product_Type)
    {
        //
    }
}
