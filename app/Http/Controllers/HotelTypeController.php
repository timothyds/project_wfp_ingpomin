<?php

namespace App\Http\Controllers;

use App\Models\Hotel_Type;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Hotel_Type::all();
        return view('tipe.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required',
        ]);
        $data = new Hotel_Type();
        $data->name = $request->get('name');
        $data->save();

        return redirect('tipe')->with('status', 'Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel_Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Hotel_Type::find($id);
        //dd($data);
        return view('tipe.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatedData = Hotel_Type::find($id);
        $updatedData->name = $request->name;
        $updatedData->description = $request->desc;
        $updatedData->save();
        return redirect()->route('tipe.index')->with('status', 'Horray! Your data is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $this->authorize('delete-permission', $user);

        try {
            //if no contraint error, then delete data. Redirect to index after it.
            $data = Hotel_Type::find($id);
            $data->delete();
            return redirect()->route('tipe.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\Throwable $th) {
            // Failed to delete data, then show exception message
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('tipe.index')->with('status', $msg);
        }
    }

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $data = Hotel_Type::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('tipe.getEditForm', compact('data'))->render()
        ), 200);
    }

    public function getEditFormB(Request $request)
    {
        $id = $request->id;
        $data = Hotel_Type::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('tipe.getEditFormB', compact('data'))->render()
        ), 200);
    }

    public function saveDataTD(Request $request)
    {
        $id = $request->id;
        $data = Hotel_Type::find($id);
        $data->name = $request->name;
        $data->description = $request->desc;
        $data->save();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'type data is up-to-date !'
        ), 200);
    }

    public function deleteData(Request $request)
    {
        $id = $request->id;
        $data = Hotel_Type::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'type data is removed !'
        ), 200);
    }
}
