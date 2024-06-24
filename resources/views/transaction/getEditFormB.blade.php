<form method="POST" action="{{route('transaction.update',$data->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
    <input type="hidden" name="transaction_id" value="{{ $data->id }}">
    <input type="hidden" name="old_product_id" id="eOld" value="{{ $prodTrans->product_id }}">
        <select class="form-control" name="cust" id="eCust">
            @foreach ($cust as $c)
                <option <?php if($data->cust == $c->id){echo "selected";} ?> 
                @if($data->customer_id==$c->id)
                selected
                @endif
                value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
        </select>   
        <small id="produkHelp" class="form-text text-muted">Please determine the customer.</small>
        <select class="form-control" name="user" id="eUser">
            @foreach ($user as $u)
                <option <?php if($data->user_id == $u->id){echo "selected";} ?> 
                @if($data->user_id==$u->id)
                selected
                @endif
                value="{{$u->id}}">{{$u->name}}</option>
            @endforeach
        </select>
        <small id="produkHelp" class="form-text text-muted">Please determine the user.</small>
        <select class="form-control" name="product_id" id="productSelectEdit" onchange="calculateSubtotals()">
            @foreach ($prod as $p)
                <option data-price="{{ $p->price }}" <?php if($data->product_id== $p->id){echo "selected";} ?> 
                @if($prodTrans->product_id==$p->id)
                selected
                @endif
                value="{{$p->id}}">{{$p->name}}</option>
            @endforeach
        </select>
        <small id="produkHelp" class="form-text text-muted">Please determine your product.</small>
        <input name="qtys" id="quantityInputEdit" oninput="calculateSubtotals()" type="number" class="form-control" aria-describedby="tipeHelp" placeholder="Enter Quantity" value="{{$prodTrans->quantity}}">
        <small id="produkHelp" class="form-text text-muted">Please determaine your product Quantity.</small><br>
        <p>Subtotal: Rp. <span id="subtotalDisplayEdit">0.00</span></p>
        <input type="hidden" id="subtotaledit" name="totals" value="0.00">
    </div>
    <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

    <button type="button" class="btn btn-primary" onclick="saveDataUpdateTD({{$data->id}})">Submit</button>
</form>
<script>
    
        function calculateSubtotals() {
            const productSelect = document.getElementById('productSelectEdit');
            const quantityInput = document.getElementById('quantityInputEdit');
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const price = parseFloat(selectedOption.dataset.price);
            const quantity = parseInt(quantityInput.value) || 0;
            const subtotal = price * quantity;

            document.getElementById('subtotalDisplayEdit').innerText = subtotal.toFixed(2);

            document.getElementById('subtotaledit').value = subtotal.toFixed(2);
        }
    </script>