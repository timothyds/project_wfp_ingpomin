@extends('layouts.frontend')
<!-- @section('disc') -->

@section('breadcrumb')
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Hotel</a></li>
                <li class="breadcrumb-item active">Produk Hotel</li>
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
            @foreach ($data as $p)
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="{{ route('laralux.show', $p->id) }}">{{ $p->name }}</a>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.html">
                                @if ($p->filenames)
                                @foreach ($p->filenames as $filename)
                                <img height='100px' src="{{ asset('product/' . $p->id . '/' . $filename) }}" />
                                @endforeach
                                @endif

                            </a>
                            <div class="product-action">
                                <a href="{{ route('laralux.show', $p->id) }}"><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><span>{{ $p->product_type->name }}</span></h3>
                            <br>
                            <h3><span>IDR</span>{{number_format( $p->price,0,',',',') }}</h3>
                            <a class="btn" href="{{ route('laralux.show', $p->id) }}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
