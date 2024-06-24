@extends('layouts.conquer2')

@section('content')
<form method="POST" action="{{route('hotel.update',$datas->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleInputEmail1">Input hotel</label>
        <input type="text" name="name" class="form-control" id="nametxt" aria-describedby="tipeHelp" placeholder="Enter Hotel name" value="{{$datas->name}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine your hotel name.</small>
        <input type="text" name="address" class="form-control" id="addresstxt" aria-describedby="tipeHelp" placeholder="Enter Hotel address" value="{{$datas->address}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine the hotel address.</small>
        <input type="text" name="city" class="form-control" id="tipetxt" aria-describedby="tipeHelp" placeholder="Enter Hotel city" value="{{$datas->city}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine the city.</small>
        <input type="text" name="image" class="form-control" id="tipetxt" aria-describedby="tipeHelp" placeholder="Enter Hotel image" value="{{$datas->image}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine your hotel image.</small>
        <select class="form-control" name="tipe">
            @foreach ($tipes as $t)
                <option <?php if($datas->tipe == $t->id){echo "selected";} ?> 
                @if($datas->hotel_type==$t->id)
                selected
                @endif
                value="{{$t->id}}">{{$t->name}}</option>

            @endforeach
        </select>
    </div>
    <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection