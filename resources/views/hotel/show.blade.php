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
            <div class="col-md-12">
                <div class="product-view-top">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="product-search">
                                <input type="email" value="Search">
                                <button><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-short">
                                <div class="dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">Product short by</div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Newest</a>
                                        <a href="#" class="dropdown-item">Popular</a>
                                        <a href="#" class="dropdown-item">Most sale</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-price-range">
                                <div class="dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">Product price range</div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">$0 to $50</a>
                                        <a href="#" class="dropdown-item">$51 to $100</a>
                                        <a href="#" class="dropdown-item">$101 to $150</a>
                                        <a href="#" class="dropdown-item">$151 to $200</a>
                                        <a href="#" class="dropdown-item">$201 to $250</a>
                                        <a href="#" class="dropdown-item">$251 to $300</a>
                                        <a href="#" class="dropdown-item">$301 to $350</a>
                                        <a href="#" class="dropdown-item">$351 to $400</a>
                                        <a href="#" class="dropdown-item">$401 to $450</a>
                                        <a href="#" class="dropdown-item">$451 to $500</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($data as $p)
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="{{ route('laralux.show', $p->id) }}">{{ $p->name }}</a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.html">
                                @if ($p->image == null)
                                    <img src="{{ asset('images/blank.jpg') }}">
                                @else
                                    <img src="{{ asset('images/' . $p->image) }}" alt="Product Image">
                                @endif

                            </a>
                            <div class="product-action">
                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3>{{ $p->product_type->name }}</h3>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
