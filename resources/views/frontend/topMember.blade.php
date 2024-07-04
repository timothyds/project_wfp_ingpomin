@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
    <h1>Customer with the Most Membership Points</h1>
    @foreach($user as $u)
    <p><strong>Customer Name:</strong> {{ $u->name }}</p>
    <p><strong>Membership Points:</strong> {{ $u->point }}</p>
    <br>
    @endforeach
</div>
@endsection
