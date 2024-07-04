@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
    <h1>Total Transaction</h1>
    <p><strong>Jumlah Transaksi:</strong> {{ $top[0]->jumlah }}</p>
    <p><strong>Total Jumlah Transaksi:</strong> {{ $top[0]->total }}</p>
    <br>
</div>
@endsection
