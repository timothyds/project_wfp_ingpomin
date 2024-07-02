<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Facility::all();
        return view('facility.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('facility.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data = new Facility();
        $data->name = $request->get('name');
        $data->description = $request->get('description');
        $data->save();

        return redirect('facility')->with('status', 'Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Facility::find($id);
        return view('facility.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatedData = Facility::find($id);
        $updatedData->name = $request->name;
        $updatedData->description = $request->get('description');
        $updatedData->save();

        return redirect()->route('facility.index')->with('status', 'Horray ! Your data is successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            //if no contraint error, then delete data. Redirect to index after it.
            $data = Facility::find($id);
            $data->delete();
            return redirect()->route('facility.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\Throwable $th) {
            // Failed to delete data, then show exception message
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('facility.index')->with('status', $msg);
        }
    }

    public function getEditFormB(Request $request)
    {
        $id = $request->id;
        $data = Facility::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('facility.getEditFormB', compact('data'))->render()
        ), 200);
    }

    public function saveDataTD(Request $request)
    {
        $id = $request->id;
        $data = Facility::find($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'type data is up-to-date !'
        ), 200);
    }

    public function deleteData(Request $request)
    {
        $id = $request->id;
        $data = Facility::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'type data is removed !'
        ), 200);
    }
}
