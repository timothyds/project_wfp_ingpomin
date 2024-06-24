@extends('layouts.frontend')
@section('content')
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="product-slider-single normal-slider slick-initialized slick-slider"><button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="">Previous</button>
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 4278px;"><img src="{{asset('images/'.$product->image) }}"  alt="Product Image" class="slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" style="width: 713px; position: relative; left: 0px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;"><img src="img/product-3.jpg" alt="Product Image" class="slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 713px; position: relative; left: -713px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;"><img src="img/product-5.jpg" alt="Product Image" class="slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" style="width: 713px; position: relative; left: -1426px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;"><img src="img/product-7.jpg" alt="Product Image" class="slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 713px; position: relative; left: -2139px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;"><img src="img/product-9.jpg" alt="Product Image" class="slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1" style="width: 713px; position: relative; left: -2852px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;"><img src="img/product-10.jpg" alt="Product Image" class="slick-slide slick-current slick-active" data-slick-index="5" aria-hidden="false" tabindex="0" style="width: 713px; position: relative; left: -3565px; top: 0px; z-index: 999; opacity: 1;"></div>
                                </div>





                                <button class="slick-next slick-arrow" aria-label="Next" type="button" style="">Next</button>
                            </div>
                            <div class="product-slider-single-nav normal-slider slick-initialized slick-slider"><button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="">Previous</button>
                                <div class="slick-list draggable" style="padding: 0px 50px;">
                                    <div class="slick-track" style="opacity: 1; width: 2928px; transform: translate3d(-1464px, 0px, 0px);">
                                        <div class="slider-nav-img slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1" style="width: 183px;"><img src="img/product-5.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1" style="width: 183px;"><img src="img/product-7.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" tabindex="-1" style="width: 183px;"><img src="img/product-9.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide slick-cloned slick-center" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 183px;"><img src="img/product-10.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" style="width: 183px;"><img src="img/product-1.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 183px;"><img src="img/product-3.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" style="width: 183px;"><img src="img/product-5.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 183px;"><img src="img/product-7.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide slick-active" data-slick-index="4" aria-hidden="false" tabindex="-1" style="width: 183px;"><img src="img/product-9.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide slick-current slick-active slick-center" data-slick-index="5" aria-hidden="false" tabindex="0" style="width: 183px;"><img src="img/product-10.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide slick-cloned slick-active" data-slick-index="6" aria-hidden="false" tabindex="-1" style="width: 183px;"><img src="img/product-1.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" tabindex="-1" style="width: 183px;"><img src="img/product-3.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" tabindex="-1" style="width: 183px;"><img src="img/product-5.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" tabindex="-1" style="width: 183px;"><img src="img/product-7.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide slick-cloned" data-slick-index="10" aria-hidden="true" tabindex="-1" style="width: 183px;"><img src="img/product-9.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img slick-slide slick-cloned" data-slick-index="11" aria-hidden="true" tabindex="-1" style="width: 183px;"><img src="img/product-10.jpg" alt="Product Image"></div>
                                    </div>
                                </div>





                                <button class="slick-next slick-arrow" aria-label="Next" type="button" style="">Next</button>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title">
                                    <h2>{{$product-> name}}</h2>
                                </div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">
                                    <h4>Price:</h4>
                                    <p>Rp. {{$product->price}}<span>$149</span></p>
                                </div>
                                <div class="quantity">
                                    <h4>Quantity:</h4>
                                    <div class="qty">
                                        <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="1">
                                        <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="p-size">
                                    <h4>Size:</h4>
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn">S</button>
                                        <button type="button" class="btn">M</button>
                                        <button type="button" class="btn">L</button>
                                        <button type="button" class="btn">XL</button>
                                    </div>
                                </div>
                                <div class="p-color">
                                    <h4>Color:</h4>
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn">White</button>
                                        <button type="button" class="btn">Black</button>
                                        <button type="button" class="btn">Blue</button>
                                    </div>
                                </div>
                                <div class="action">
                                    <a class="btn" href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                    <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row product-detail-bottom">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="description" class="container tab-pane active">
                                <h4>Product description</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque. Suspendisse sit amet neque neque. Praesent suscipit et magna eu iaculis. Donec arcu libero, commodo ac est a, malesuada finibus dolor. Aenean in ex eu velit semper fermentum. In leo dui, aliquet sit amet eleifend sit amet, varius in turpis. Maecenas fermentum ut ligula at consectetur. Nullam et tortor leo.
                                </p>
                            </div>
                            <div id="specification" class="container tab-pane fade">
                                <h4>Product specification</h4>
                                <ul>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Lorem ipsum dolor sit amet</li>
                                </ul>
                            </div>
                            <div id="reviews" class="container tab-pane fade">
                                <div class="reviews-submitted">
                                    <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                                    </p>
                                </div>
                                <div class="reviews-submit">
                                    <h4>Give your Review:</h4>
                                    <div class="ratting">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="row form">
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="email" placeholder="Email">
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea placeholder="Review"></textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <button>Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product">
                    <div class="section-header">
                        <h1>Related Products</h1>
                    </div>

                    <div class="row align-items-center product-slider product-slider-3 slick-initialized slick-slider"><button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="">Previous</button>





                        <div class="slick-list draggable">
                            <div class="slick-track" style="opacity: 1; width: 4464px; transform: translate3d(-1860px, 0px, 0px);">
                                <div class="col-lg-3 slick-slide slick-cloned" tabindex="-1" style="width: 372px;" data-slick-index="-2" aria-hidden="true">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#" tabindex="-1">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html" tabindex="-1">
                                                <img src="img/product-4.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#" tabindex="-1"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-heart"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href="" tabindex="-1"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 slick-slide slick-cloned" tabindex="-1" style="width: 372px;" data-slick-index="-1" aria-hidden="true">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#" tabindex="-1">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html" tabindex="-1">
                                                <img src="img/product-2.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#" tabindex="-1"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-heart"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href="" tabindex="-1"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 slick-slide" tabindex="-1" style="width: 372px;" data-slick-index="0" aria-hidden="true">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#" tabindex="-1">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html" tabindex="-1">
                                                <img src="img/product-10.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#" tabindex="-1"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-heart"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href="" tabindex="-1"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 slick-slide" tabindex="-1" style="width: 372px;" data-slick-index="1" aria-hidden="true">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#" tabindex="-1">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html" tabindex="-1">
                                                <img src="img/product-8.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#" tabindex="-1"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-heart"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href="" tabindex="-1"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 slick-slide" tabindex="-1" style="width: 372px;" data-slick-index="2" aria-hidden="true">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#" tabindex="-1">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html" tabindex="-1">
                                                <img src="img/product-6.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#" tabindex="-1"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-heart"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href="" tabindex="-1"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 slick-slide slick-current slick-active" tabindex="0" style="width: 372px;" data-slick-index="3" aria-hidden="false">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#" tabindex="0">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html" tabindex="0">
                                                <img src="img/product-4.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#" tabindex="0"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#" tabindex="0"><i class="fa fa-heart"></i></a>
                                                <a href="#" tabindex="0"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href="" tabindex="0"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 slick-slide slick-active" tabindex="0" style="width: 372px;" data-slick-index="4" aria-hidden="false">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#" tabindex="0">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html" tabindex="0">
                                                <img src="img/product-2.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#" tabindex="0"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#" tabindex="0"><i class="fa fa-heart"></i></a>
                                                <a href="#" tabindex="0"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href="" tabindex="0"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 slick-slide slick-cloned" tabindex="-1" style="width: 372px;" data-slick-index="5" aria-hidden="true">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#" tabindex="-1">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html" tabindex="-1">
                                                <img src="img/product-10.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#" tabindex="-1"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-heart"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href="" tabindex="-1"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 slick-slide slick-cloned" tabindex="-1" style="width: 372px;" data-slick-index="6" aria-hidden="true">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#" tabindex="-1">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html" tabindex="-1">
                                                <img src="img/product-8.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#" tabindex="-1"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-heart"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href="" tabindex="-1"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 slick-slide slick-cloned" tabindex="-1" style="width: 372px;" data-slick-index="7" aria-hidden="true">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#" tabindex="-1">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html" tabindex="-1">
                                                <img src="img/product-6.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#" tabindex="-1"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-heart"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href="" tabindex="-1"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 slick-slide slick-cloned" tabindex="-1" style="width: 372px;" data-slick-index="8" aria-hidden="true">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#" tabindex="-1">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html" tabindex="-1">
                                                <img src="img/product-4.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#" tabindex="-1"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-heart"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href="" tabindex="-1"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 slick-slide slick-cloned" tabindex="-1" style="width: 372px;" data-slick-index="9" aria-hidden="true">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#" tabindex="-1">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html" tabindex="-1">
                                                <img src="img/product-2.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#" tabindex="-1"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-heart"></i></a>
                                                <a href="#" tabindex="-1"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href="" tabindex="-1"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><button class="slick-next slick-arrow" aria-label="Next" type="button" style="">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection