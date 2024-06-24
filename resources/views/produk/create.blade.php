@extends('layouts.conquer2')

@section('content')
<form method="POST" action="{{route('produk.store')}}">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Input Product</label>
        <input type="text" name="name" class="form-control" id="produktxt" aria-describedby="tipeHelp" placeholder="Enter Product Name">
        <small id="produkHelp" class="form-text text-muted">Please determine your product name.</small>
        <input type="text" name="price" class="form-control" id="pricetxt" aria-describedby="tipeHelp" placeholder="Enter Product Price">
        <small id="produkHelp" class="form-text text-muted">Please determine your product price.</small>
        <input type="text" name="image" class="form-control" id="imgtxt" aria-describedby="tipeHelp" placeholder="Enter Product Image">
        <small id="produkHelp" class="form-text text-muted">Please determine your product image.</small>
        <input type="text" name="available_room" class="form-control" id="availtxt" aria-describedby="tipeHelp" placeholder="Enter Product Available Room">
        <small id="produkHelp" class="form-text text-muted">Please determine your product available room.</small>
        <select class="form-control" name="hotel">
            @foreach ($hotel as $h)
                <option value="{{$h->id}}">{{$h->name}}</option>
            @endforeach
        </select>
        <small id="produkHelp" class="form-text text-muted">Please determine your product Hotel.</small>
    </div>
    <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection