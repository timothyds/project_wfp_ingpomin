@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
    <h1>Customer with the Most Membership Points</h1>
    @foreach($top as $t)
    <p><strong>Product Id:</strong> {{ $t->product_id }}</p>
    <p><strong>R:</strong> {{ $t->reservation_count }}</p>
    <br>
    @endforeach
</div>
@endsection
