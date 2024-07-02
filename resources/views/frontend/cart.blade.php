@extends('layouts.frontend')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="cart-page-inner">
                <div class="table-responsive">
                    @php
                    $total = 0;
                    @endphp
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @if(session('cart'))
                            @foreach (session('cart') as $item)
                            <tr>
                                <td>
                                    <div class="img">
                                        @if ($item['photo'] == NULL)
                                        <a href="#"><img src="{{asset('images/blank.jpg') }}" alt="Image"></a>
                                        @elseif(!empty($item->filenames))
                                        @foreach ($item->filenames as $filename)
                                        <img height='250px' src="{{ asset('product/' . $item->id . '/' . $filename) }}" />
                                        @endforeach
                                        @endif
                                        <p>{{$item['name']}}</p>
                                    </div>
                                </td>
                                <td>{{'IDR '.$item['price']}}</td>
                                <td>
                                    <div class="qty">
                                        <button onclick="redQty({{$item['id']}})" class="btn-minus"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="{{ $item['quantity'] }}">
                                        <button onclick="addQty({{$item['id']}})" class="btn-plus"><i class="fa fa-plus"></i></button>
                                    </div>
                                </td>
                                <td>{{ 'IDR '.$item['quantity']* $item['price'] }}</td>
                                <td><a class="btn btn-danger" href="{{route('delFromCart',$item['id'])}}"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            @php
                            $total+= $item['quantity']* $item['price'];
                            @endphp
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5">
                                    <p>Tidak ada item di cart.</p>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="cart-page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="coupon">
                            <input type="text" placeholder="Coupon Code">
                            <button>Apply Code</button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="cart-summary">
                            <div class="cart-content">
                                <h1>Cart Summary</h1>
                                <h2>Grand Total<span>{{'IDR '.$total}}</span></h2>
                            </div>
                            <div class="cart-btn">
                                <a class="btn btn-xs" href="{{ route('laralux.index') }}">Continue Shopping</a>

                                <form action="{{ route('checkout') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-xs">Checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
<script>
    function checkout() {
        $.ajax({
            type: 'POST',
            url: '{{ route("checkout") }}',
            data: {
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'success') {
                    window.location.href = '{{ route("laralux.index") }}';
                } else {
                    alert('Checkout failed');
                }
            },
            error: function(xhr) {
                alert('An error occurred');
            }
        });
    }

    function redQty(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("redQty")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success: function(data) {
                location.reload();
            }
        });
    }

    function addQty(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("addQty")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success: function(data) {
                location.reload();
            }
        });
    }
</script>
@endsection