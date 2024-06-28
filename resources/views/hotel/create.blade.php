@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
    <form method="POST" action="{{route('hotel.store')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Input hotel</label>
            <input type="text" name="name" class="form-control" id="nametxt" aria-describedby="tipeHelp" placeholder="Enter Hotel name">
            <small id="tipeHelp" class="form-text text-muted">Please determine your hotel name.</small>
            <input type="text" name="address" class="form-control" id="addresstxt" aria-describedby="tipeHelp" placeholder="Enter Hotel address">
            <small id="tipeHelp" class="form-text text-muted">Please determine the hotel address.</small>
            <input type="number" name="phone" class="form-control" id="phonetxt" aria-describedby="tipeHelp" placeholder="Enter Hotel phone number">
            <small id="tipeHelp" class="form-text text-muted">Please determine the number.</small>
            <input type="text" name="email" step="any" class="form-control" id="ratingtxt" aria-describedby="tipeHelp" placeholder="Enter Hotel email">
            <small id="tipeHelp" class="form-text text-muted">Please determine the hotel email.</small>
            <input type="number" name="rating" step="any" class="form-control" id="ratingtxt" aria-describedby="tipeHelp" placeholder="Enter Hotel rating">
            <small id="tipeHelp" class="form-text text-muted">Please determine the hotel rating.</small>
            <input type="text" name="image" class="form-control" id="tipetxt" aria-describedby="tipeHelp" placeholder="Enter Hotel image">
            <small id="tipeHelp" class="form-text text-muted">Please determine your hotel image.</small>
            <select class="form-control" name="tipe">
                @foreach ($tipes as $t)
                <option value="{{$t->id}}">{{$t->name}}</option>
                @endforeach
            </select>
            <small id="tipeHelp" class="form-text text-muted">Please determine your hotel type.</small>
        </div>
        <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection