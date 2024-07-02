@extends('layouts.frontend')
@section('content')

<div class="container-fluid">
    @if (Auth::user()->role == 'owner')
    <a class="btn btn-success" href="{{route('hotel.create')}}">+ Create New Hotel</a>
    @endif
    @if (session('status'))
    <div class="alert alert-success">{{session("status")}}</div>
    @endif
    </br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Hotel Name</th>
                <th scope="col">Logo</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Hotel type</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $d)
            <tr>
                <th scope="row">{{$d->id}}</th>
                <td>{{$d->name}}</td>
                <td>
                    <img height='100px' src="{{ asset('images/'.$d->image)}}" /><br>
                    <a href="{{ url('hotel/uploadLogo/'.$d->id) }}">
                        <button class='btn btn-xs btn-default'>upload</button></a>
                </td>
                <td>{{$d->address}}</td>
                <td>{{$d->phone}}</td>
                <td>@if($d->hotel_typeWithTrashed)
                    {{$d->hotel_typeWithTrashed->name}}
                    @endif
                </td>
                <td>{{$d->created_at}}</td>
                <td>{{$d->updated_at}}</td>
                <td><a class="btn btn-warning" href="{{ route('hotel.edit', $d->id)}}">Edit</a></td>
                <td>
                    @can('delete-permission',Auth::user())
                    <form method="POST" action="{{route('hotel.destroy',$d->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$d->id}}-{{$d->name}} ? ')" value="Delete" action="{{route('hotel.destroy',$d->id)}}">
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection