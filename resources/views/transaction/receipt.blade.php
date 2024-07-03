@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
    <div class="receipt">
        <h1>Nota Pembelian</h1>
        <hr>
        <p><strong>Tanggal Transaksi:</strong> {{ $t->transaction_date }}</p>
        <p><strong>Nomor Transaksi:</strong> {{ $t->id }}</p>
        <p><strong>Pelanggan:</strong> {{ Auth::user()->name }}</p>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($t->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>Rp. {{ number_format($product->price, 2) }}</td>
                    <td>Rp. {{ number_format($product->pivot->subtotal, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <p><strong>Total Before Redemption:</strong> Rp. {{ number_format($preRedemptionTotal, 2) }}</p>
        <p><strong>Total After Redemption:</strong> Rp. {{ number_format($totals['total'], 2) }}</p>
        <p><strong>PPN (11%):</strong> Rp. {{ number_format($totals['tax'], 2) }}</p>
        @if ($totals['discount'] > 0)
        <p><strong>Discount from Points:</strong> -Rp. {{ number_format($totals['discount'], 2) }}</p>
        @endif
        <p><strong>Grand Total:</strong> Rp. {{ number_format($totals['grandTotal'], 2) }}</p>
        <hr>
        <p>Thank you for your purchase!</p>
    </div>
</div>

<style>
    .receipt {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        background: #fff;
    }

    .receipt h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .receipt hr {
        border-top: 1px solid #ddd;
        margin: 20px 0;
    }

    .receipt table {
        width: 100%;
        border-collapse: collapse;
    }

    .receipt table th,
    .receipt table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .receipt p {
        margin: 10px 0;
    }
</style>
@endsection