<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Hotel_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //echo "Halo";
        $hotels = DB::table('hotels')->get();
        $caralain = Hotel::all();
        return view('hotel.index', ['datas' => $caralain]); //menuju ke view hotel/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipes = Hotel_Type::all();
        return view('hotel.create', compact('tipes'));
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
            'phone'=>'required',
            'email' => 'required',
            'rating'=>'required',
            'image' => 'required',
            'tipe' => 'required'
        ]);
        // Type::create($request->all());

        $data = new Hotel();
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->phone = $request->get('phone');
        $data->email = $request->get('email');
        $data->rating = $request->get('rating');
        $data->image = $request->get('image');
        $data->hotel_type_id = $request->get('tipe');

        $data->save();

        return redirect('hotel')->with('status', 'Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $hotel = Hotel::find($id);
        $nama = $hotel->name;
        $data = $hotel->products;
        return view('hotel.show', compact('nama', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $datas = Hotel::find($id);
        $tipes = Hotel_Type::all();
        return view('hotel.edit', compact('datas', 'tipes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatedData = Hotel::find($id);
        $updatedData->name = $request->name;
        $updatedData->address = $request->get('address');
        $updatedData->phone = $request->get('phone');
        $updatedData->email = $request->get('email');
        $updatedData->rating = $request->get('rating');
        $updatedData->image = $request->get('image');
        $updatedData->hotel_type_id = $request->get('tipe');
        $updatedData->save();
        return redirect()->route('hotel.index')->with('status', 'Horray ! Your data is successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            //if no contraint error, then delete data. Redirect to index after it.
            $data = Hotel::find($id);
            $data->delete();
            return redirect()->route('hotel.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\Throwable $th) {
            // Failed to delete data, then show exception message
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('hotel.index')->with('status', $msg);
        }
    }
    public function availableHotelRoom()
    {
        $data = Hotel::join('products as p', 'hotels.id', '=', 'p.hotel_id')
            ->select('hotels.id', 'hotels.name', DB::raw('sum(p.available_room) as room'))
            ->groupBy('hotels.id', 'hotels.name')
            ->get();
        //dd($data);
        return view('hotel.availableRoom', compact('data'));
    }
    public function avgPriceByHotelType()
    {
        $data = DB::table('types as t')
            ->select('t.name as Type', 'h.name as Name', DB::raw('coalesce(avg(p.price),0) as Rerata'))
            ->leftJoin('hotels as h', 'h.hotel_type', '=', 't.id')
            ->leftJoin('products as p', 'p.hotel_id', '=', 'h.id')
            ->groupBy('t.name', 'h.name')
            ->get();
        //dd($data);
        return view('hotel.avgPrice', compact('data'));
    }
    public function showInfo()
    {
        return response()->json(array(
            'status' => 'oke',
            'msg' => "<div class='alert alert-info'>
             Did you know? <br>This message is sent by a Controller.'</div>"
        ), 200);
    }
    public function uploadLogo(Request $request)
    {
        $hotel_id = $request->hotel_id;
        $hotel = Hotel::find($hotel_id);
        return view('hotel.formUploadLogo', compact('hotel'));
    }
    public function simpanLogo(Request $request)
    {
        $file = $request->file("file_logo");
        $folder = 'logo';
        $filename = $request->hotel_id . ".jpg";
        $file->move($folder, $filename);
        return redirect()->route('hotel.index')->with('status', 'logo terupload');
    }
    public function simpanPhoto(Request $request)
    {
        $file = $request->file("file_photo");
        $folder = 'images';
        $filename = time() . "_" . $file->getClientOriginalName();
        $file->move($folder, $filename);
        $hotel = Hotel::find($request->hotel_id);
        $hotel->image = $filename;
        $hotel->save();
        return redirect()->route('hotel.index')->with('status', 'photo terupload');
    }
}
