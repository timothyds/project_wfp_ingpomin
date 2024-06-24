@extends('layouts.frontend')
@section('content')
<div class="container-fluid">
    <div class="page-content">
        <h3 class="page-title">Upload Logo untuk produk {{$product->name}}</h3>
        <div class="container">
            <form method="POST" enctype="multipart/form-data" action="{{url('produk/simpanPhoto')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputType">Pilih Logo</label>
                    <input type="file" class="form-control" name="file_photo" />
                    <input type="hidden" name='product_id' value="{{$product->id}}" />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection