<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('users')->where('role', 'pembeli')->get();
        return view('customer.index', compact('data'));
    }

    public function showCust() {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required',
            'address' => 'required',

        ]);
        // Type::create($request->all());

        $data = new Customer();
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->point = 0;
        $data->save();

        return redirect('customer')->with('status', 'Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('customer.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatedData = User::find($id);
        $updatedData->name = $request->name;
        $updatedData->email = $request->get('email');
        $updatedData->save();
        return redirect()->route('customer.index')->with('status', 'Horray ! Your data is successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            //if no contraint error, then delete data. Redirect to index after it.
            $data = Customer::find($id);
            $data->delete();
            return redirect()->route('customer.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\Throwable $th) {
            // Failed to delete data, then show exception message
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('customer.index')->with('status', $msg);
        }
    }
    public function getEditFormB(Request $request)
    {
        $id = $request->id;
        $data = User::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('customer.getEditFormB', compact('data'))->render()
        ), 200);
    }
    public function saveDataTD(Request $request)
    {
        $id = $request->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'type data is up-to-date !'
        ), 200);
    }
    public function deleteData(Request $request)
    {
        $id = $request->id;
        $data = User::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'customer data is removed !'
        ), 200);
    }
}
