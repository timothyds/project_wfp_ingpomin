@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
    <form method="POST" action="{{route('hotel.update',$datas->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Input hotel</label>
            <input type="text" name="name" class="form-control" id="nametxt" aria-describedby="tipeHelp" placeholder="Enter Hotel name" value="{{$datas->name}}">
            <small id="tipeHelp" class="form-text text-muted">Please determine your hotel name.</small>
            <input type="text" name="address" class="form-control" id="addresstxt" aria-describedby="tipeHelp" placeholder="Enter Hotel address" value="{{$datas->address}}">
            <small id="tipeHelp" class="form-text text-muted">Please determine the hotel address.</small>
            <input type="text" name="phone" class="form-control" id="phonetxt" value="{{$datas->phone}}">
            <small id="tipeHelp" class="form-text text-muted">Please determine the hotel phone number.</small>
            <select class="form-control" name="tipe">
                @foreach ($tipes as $t)
                <option value="{{ $t->id }}" @selected($datas->tipe == $t->id)>{{ $t->name }}</option>
                @endforeach
            </select>
        </div>
        <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection