@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
    <form method="POST" action="{{route('produk.update',$data->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Input Product</label>
            <input type="text" name="name" class="form-control" id="produktxt" aria-describedby="tipeHelp" placeholder="Enter Product Name" value="{{$data->name}}">
            <small id="produkHelp" class="form-text text-muted">Please determine your product name.</small>
            <input type="text" name="price" class="form-control" id="pricetxt" aria-describedby="tipeHelp" placeholder="Enter Product Price" value="{{$data->price}}">
            <small id="produkHelp" class="form-text text-muted">Please determine your product price.</small>
            <input type="text" name="image" class="form-control" id="imgtxt" aria-describedby="tipeHelp" placeholder="Enter Product Image" value="{{$data->image}}">
            <small id="produkHelp" class="form-text text-muted">Please determine your product image.</small>
            <input type="text" name="available_room" class="form-control" id="availtxt" aria-describedby="tipeHelp" placeholder="Enter Product Available Room" value="{{$data->available_room}}">
            <small id="produkHelp" class="form-text text-muted">Please determine your product available room.</small>
            <select class="form-control" name="hotel" id="eHotel">
                @foreach ($hotel as $h)
                <option @if($data->hotel_id==$h->id)
                    selected
                    @endif
                    value="{{$h->id}}">{{$h->name}}</option>

                @endforeach
            </select>
        </div>
        <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection