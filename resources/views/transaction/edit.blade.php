@extends('layouts.conquer2')

@section('content')
<form method="POST" action="{{route('transaction.update',$data->id)}}">
    @csrf
    @method('PUT')
    <input type="hidden" name="transaction_id" value="{{ $data->id }}">
    <div class="form-group">
    <input type="hidden" name="transaction_id" value="{{ $data->id }}">
    <input type="hidden" name="old_product_id" value="{{ $prodTrans->product_id }}">
        <select class="form-control" name="cust">
            @foreach ($cust as $c)
                <option <?php if($data->cust == $c->id){echo "selected";} ?> 
                @if($data->customer_id==$c->id)
                selected
                @endif
                value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
        </select>   
        <small id="produkHelp" class="form-text text-muted">Please determine the customer.</small>
        <select class="form-control" name="user">
            @foreach ($user as $u)
                <option <?php if($data->user_id == $u->id){echo "selected";} ?> 
                @if($data->user_id==$u->id)
                selected
                @endif
                value="{{$u->id}}">{{$u->name}}</option>
            @endforeach
        </select>
        <small id="produkHelp" class="form-text text-muted">Please determine the user.</small>
        <select class="form-control" name="product_id" id="productSelect" onchange="calculateSubtotal()">
            @foreach ($prod as $p)
                <option data-price="{{ $p->price }}" <?php if($data->product_id== $p->id){echo "selected";} ?> 
                @if($prodTrans->product_id==$p->id)
                selected
                @endif
                value="{{$p->id}}">{{$p->name}}</option>
            @endforeach
        </select>
        <small id="produkHelp" class="form-text text-muted">Please determine your product.</small>
        <input name="qty" id="quantityInput" oninput="calculateSubtotal()" type="number" class="form-control" id="tipetxt" aria-describedby="tipeHelp" placeholder="Enter Quantity" value="{{$prodTrans->quantity}}">
        <small id="produkHelp" class="form-text text-muted">Please determaine your product Quantity.</small><br>
        <p>Subtotal: Rp. <span id="subtotalDisplay">0.00</span></p>
        <input type="hidden" id="subtotal" name="total" value="0.00">
    </div>
    <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
        function calculateSubtotal() {
            const productSelect = document.getElementById('productSelect');
            const quantityInput = document.getElementById('quantityInput');
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const price = parseFloat(selectedOption.dataset.price);
            const quantity = parseInt(quantityInput.value) || 0;
            const subtotal = price * quantity;

            document.getElementById('subtotalDisplay').innerText = subtotal.toFixed(2);

            document.getElementById('subtotal').value = subtotal.toFixed(2);
        }
    </script>
@endsection