@extends('layouts.conquer2')

@section('content')
<form method="POST" action="{{route('tipe.update',$data->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleInputEmail1">Edit Tipe hotel</label>
        <input type="text" name="name" class="form-control" id="tipetxt" aria-describedby="tipeHelp" placeholder="Enter Type name" value="{{$data->name}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine your type name.</small>
        <input type="text" name="desc" class="form-control" id="tipetxt" aria-describedby="tipeHelp" placeholder="Enter Description" value="{{$data->description}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine your description.</small>
    </div>
    <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection