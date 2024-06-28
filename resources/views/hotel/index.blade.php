@extends('layouts.frontend')
<!-- @section('disc') -->
@section('content')
    <div class="container-fluid">
        @if (Auth::user()->role == 'owner')
            <a class="btn btn-success" href="{{ route('hotel.create') }}">+ Create New Hotel</a>
            <a href="#disclaimer" data-toggle="modal" class="btn btn-warning my-2">Disclaimer</a>
        @endif
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">DISCLAIMER</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                    </div>
                    <div class="modal-body">
                        Pictures shown are for illustration purpose only. Actual product may vary due to product
                        enhancement.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hotel Name</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Hotel type</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $d)
                    <tr>
                        <th scope="row">{{ $d->id }}</th>
                        <td>{{ $d->name }}</td>
                        <td>
                            <img height='100px' src="{{ asset('images/' . $d->image) }}" /><br>
                            <a href="{{ url('hotel/uploadLogo/' . $d->id) }}">
                                <button class='btn btn-xs btn-default'>upload</button></a>
                        </td>
                        <td>{{ $d->address }}</td>
                        <td>{{ $d->city }}</td>
                        <td>
                            @if ($d->typeWithTrashed)
                                {{ $d->typeWithTrashed->name }}
                            @endif
                        </td>
                        <td>{{ $d->created_at }}</td>
                        <td>{{ $d->updated_at }}</td>
                        <td><a class="btn btn-warning" href="{{ route('hotel.edit', $d->id) }}">Edit</a></td>
                        <td>
                            @can('delete-permission', Auth::user())
                                <form method="POST" action="{{ route('hotel.destroy', $d->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete {{ $d->id }}-{{ $d->name }} ? ')"
                                        value="Delete" action="{{ route('hotel.destroy', $d->id) }}">
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <ul>
            @foreach ($datas as $d)
                <li>{{ $d->name }}</li>
            @endforeach
        </ul>


        @foreach ($datas as $d)
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img src="{{ asset('images/' . $d->image) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $d->name }}</h5>
                                    <p class="card-text">Alamat : {{ $d->address }}</p>
                                    <p class="card-text">Kota : {{ $d->city }}</p>
                                    <a class="btn btn-info" href="#detail_{{ $d->id }}"
                                        data-toggle="modal">{{ $d->name }}</a>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                            <div class="modal fade" id="detail_{{ $d->id }}" tabindex="-1" role="basic"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{ $d->name }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('images/' . $d->image) }}" height='200px' />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endforeach



@endsection
