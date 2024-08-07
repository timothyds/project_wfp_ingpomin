<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LaraLux - Hotel Reservation</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap') }}" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/slick/slick-theme.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Top bar Start -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-envelope"></i>
                    laralux@gmail.com
                </div>
                <div class="col-sm-6">
                    <i class="fa fa-phone-alt"></i>
                    +62 822-3056-0212
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="{{ url('laralux') }}" class="nav-item nav-link active">Home</a>
                        {{-- <a href="{{ url('laralux') }}" class="nav-item nav-link ">Products</a> --}}
                        <a href="{{ route('cart') }}" class="nav-item nav-link">Cart</a>
                        <a href="{{ route('showTransactionListCust') }}" class="nav-item nav-link">Transaction History</a>


                        {{-- <a href="checkout.html" class="nav-item nav-link">Checkout</a> --}}
                        {{-- <a href="my-account.html" class="nav-item nav-link">My Account</a> --}}
                        @if (Auth::user()->role == 'staff' || Auth::user()->role == 'owner')
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                            <div class="dropdown-menu">
                                @can('delete-permission', Auth::user())
                                <a href="{{ url('customer') }}" class="dropdown-item">Customer</a>
                                @endcan
                                <a href="{{ route('frontend.topMember') }}" class="dropdown-item">TopMember</a>
                                <a href="{{ route('frontend.topReserved') }}" class="dropdown-item">Top Reserved</a>
                                <a href="{{ url('produk') }}" class="dropdown-item">Products</a>
                                <a href="{{ url('transactions/list') }}" class="dropdown-item">Transaction</a>
                                <a href="{{ url('tipe') }}" class="dropdown-item">Hotel Type</a>
                                <a href="{{ url('hotel') }}" class="dropdown-item">List Hotel</a>
                                <a href="{{ url('produkType') }}" class="dropdown-item">Produk Type</a>
                                <a href="{{ url('facility') }}" class="dropdown-item">Facility</a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="navbar-nav ml-auto">
                        <div class="nav-item dropdown">
                            <span class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</span>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i>{{ __('Logout') }}</i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="{{route('laralux.index')}}">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <div class="user">
                        <a href="{{ url('laralux/user/cart') }}" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            @php
                            $cartCount = count(session()->get('cart', []));
                            @endphp
                            <span>({{$cartCount}})</span>
                        </a>
                        <button class="btn ml-3">
                            <i class="fa fa-star"></i>
                            <span>{{ Auth::user()->point }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->

    @php
    $pageNames = [
    'customer' => 'Customer',
    'produk' => 'Products',
    'laralux/user/cart' => 'Cart',
    'hotel' => 'Hotel',
    'transaction' => 'Transaction',
    'laralux' => '',
    'facility' => 'Facility',
    'tipe' => 'Hotel Type',
    'produkType' => 'Product Type'
    ];

    $currentUrl = request()->path();
    $pageName = $pageNames[$currentUrl] ?? '';
    @endphp

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('laralux') }}">Home</a></li>
                @if ($pageName)
                <li class="breadcrumb-item active">{{ $pageName }}</li>
                @endif
            </ul>
        </div>
    </div>

    <!-- Breadcrumb End -->

    <!-- Product List Start -->
    <div class="product-view">
        @yield('content')
        @yield('js')
    </div>
    <!-- Product List End -->

    <!-- Brand Start -->
    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <div class="brand-item"><img src="{{ asset('img/brand-1.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('img/brand-2.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('img/brand-3.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('img/brand-4.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('img/brand-5.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('img/brand-6.png') }}" alt=""></div>
            </div>
        </div>
    </div>
    <!-- Brand End -->

    <!-- Footer Start -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Get in Touch</h2>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>Surabaya, Indonesia</p>
                            <p><i class="fa fa-envelope"></i>laralux@gmail.com</p>
                            <p><i class="fa fa-phone"></i>+62 822-3056-0212</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Follow Us</h2>
                        <div class="contact-info">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Company Info</h2>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Condition</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Purchase Info</h2>
                        <ul>
                            <li><a href="#">Pyament Policy</a></li>
                            <li><a href="#">Shipping Policy</a></li>
                            <li><a href="#">Return Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row payment align-items-center">
                <div class="col-md-6">
                    <div class="payment-method">
                        <h2>We Accept:</h2>
                        <img src="{{ asset('frontend/img/payment-method.png') }}" alt="Payment Method" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-security">
                        <h2>Secured By:</h2>
                        <img src="{{ asset('frontend/img/godaddy.svg') }}" alt="Payment Security" />
                        <img src="{{ asset('frontend/img/norton.svg') }}" alt="Payment Security" />
                        <img src="{{ asset('frontend/img/ssl.svg') }}" alt="Payment Security" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                </div>

                <div class="col-md-6 template-by">
                    <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/slick/slick.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>