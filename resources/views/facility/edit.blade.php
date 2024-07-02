@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
<form method="POST" action="{{route('facility.update',$data->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleInputEmail1">Input Facility</label>
        <input type="text" name="name" class="form-control" id="facilitytxt" aria-describedby="tipeHelp" placeholder="Enter Facility Name" value="{{$data->name}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine your facility name.</small>
        <input type="text" name="description" class="form-control" id="descriptiontxt" aria-describedby="tipeHelp" placeholder="Enter Description" value="{{$data->description}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine your description.</small>
    </div>
    <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection