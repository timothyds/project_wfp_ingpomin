@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
    <div class='row'>
        <h2>Transaction Details</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactionDetails as $detail)
                <tr>
                    <td>{{ $detail['transaction_id'] }}</td>
                    <td>{{ $detail['product_name'] }}</td>
                    <td>{{ $detail['quantity'] }}</td>
                    <td>{{ $detail['subtotal'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection