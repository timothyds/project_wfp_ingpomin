@extends('layouts.frontend')

@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="slider-nav-img">
                                @if ($product->image == NULL)
                                <img width="200" src="{{asset('images/blank.jpg')}}">
                                @elseif(!empty($product->filenames))
                                @foreach ($product->filenames as $filename)
                                <img height='200px' src="{{ asset('product/' . $product->id . '/' . $filename) }}" />
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title">
                                    <h2>{{$product->name}}</h2>
                                </div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">
                                    <h4>Available Room:</h4>
                                    <p>{{ $product->available_room }}</p>
                                </div>
                                <div class="price">
                                    <h4>Price:</h4>
                                    <p>{{'IDR '.number_format($product->price,0,',',',') }}</p>
                                </div>
                                <div class="action">
                                    <a class="btn" href="{{route('addCart',$product->id)}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                    <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection