@extends('layouts.frontend')
<!-- @section('disc') -->

@section('breadcrumb')
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Hotel</a></li>
                {{-- <li class="breadcrumb-item active">{{ $pageName }}</li> --}}
            </ul>
        </div>
    </div>
@endsection

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
        <div class="row">
            @foreach ($datas as $p)
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="{{ route('hotel.show', $p->id) }}">{{ $p->name }}</a>
                            <div class="ratting">
                                @for ($i = 1; $i <= $p->rating; $i++)
                                <i class="fa fa-star"></i>
                                @endfor
                                @if ($p->rating/.5%2 == 1)
                                <i class="fa fa-star-half"></i>
                                @endif
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.html">
                                @if ($p->image == null)
                                    <img src="{{ asset('images/blank.jpg') }}">
                                @else
                                    <img height='150px' src="{{ asset('images/' . $p->image) }}" alt="Product Image">
                                @endif

                            </a>
                        </div>
                        <div class="product-price">
                            <h3>{{ $p->hotel_type->name }}</h3>
                            <a class="btn" href="{{ route('hotel.show', $p->id) }}"><i class="fa fa-eye"></i>See Product(s)</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <ul>
            @foreach ($datas as $d)
                <li>{{ $d->name }}</li>
            @endforeach
        </ul> --}}


        {{-- @foreach ($datas as $d)
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
        @endforeach --}}
    </div>


@endsection
