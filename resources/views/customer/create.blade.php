@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
    <form method="POST" action="{{ route('customer.store') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Input Customer</label>
            <input type="text" name="name" class="form-control" id="tipetxt" aria-describedby="tipeHelp"
                placeholder="Enter Customer Name">
            <small id="tipeHelp" class="form-text text-muted">Please determine your customer name.</small>
            <input type="text" name="address" class="form-control" id="addresstxt" aria-describedby="tipeHelp"
                placeholder="Enter Address">
            <small id="tipeHelp" class="form-text text-muted">Please determine your customer address.</small>
        </div>
        <a class="btn btn-primary" href="{{ url()->previous() }}">Cancel</a>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
