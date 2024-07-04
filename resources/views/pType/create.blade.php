@extends('layouts.frontend')

@section('content')
<form method="POST" action="{{route('produkType.store')}}">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Tipe Produk</label>
        <input type="text" name="name" class="form-control" id="tipetxt" aria-describedby="tipeHelp" placeholder="Enter Type name">
        <small id="tipeHelp" class="form-text text-muted">Please determine your type name.</small>
    </div>
    <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection