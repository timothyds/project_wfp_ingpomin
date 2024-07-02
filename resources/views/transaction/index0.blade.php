@extends('layouts.frontend')
@section('content')
<div class="container-fluid">
@if (Auth::user()->role == 'owner')
<a class="btn btn-success" href="{{route('transaction.create')}}">+ New Transaction</a>
<a href="#modalCreateCust" data-toggle="modal" class="btn btn-info">+ New Transaction(with Modals)</a>
@endif
@csrf
@if (session('status'))
<div class="alert alert-success">{{session("status")}}</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Kasir</th>
            <th>Tanggal Transaction</th>
            <th>Updated at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr id="tr_{{$d->id}}">
            <td>{{ $d->id }}</td>
            <td id="td_cust_{{$d->id}}">@if($d->customerWithTrashed)
                {{$d->customerWithTrashed->name}}
                @endif
            </td>
            <td id="td_user_{{$d->id}}">{{ $d->user->name }}</td>
            <td>{{ $d->transaction_date }}</td>
            <td>{{ $d->updated_at }}</td>
            <td><a class="btn btn-default" data-toggle="modal" href="#myModal" onclick="getDetailData({{ $d->id}});">Lihat Rincian Pembelian</a></td>
            <td><a class="btn btn-warning" href="{{ route('transaction.edit', $d->id)}}">Edit</a></td>
            <td>
                <a href="#modalEditB" class="btn btn-info" data-toggle="modal" onclick="getEditFormB({{$d->id}})">Edit Type B</a>
                @can('delete-permission',Auth::user())
                <a href="#" value="DeleteNoReload" class="btn btn-danger" onclick="if(confirm('Are you sure to delete {{$d->id}} ? ')) deleteDataRemoveTR({{$d->id}})">Delete without Reload</a>
                <form method="POST" action="{{route('transaction.destroy',$d->id)}}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete Transaction ID : {{$d->id}}, customer ID : {{$d->customer_id}}, User ID : {{$d->user_id}} ? ')" value="Delete" action="{{route('transaction.destroy',$d->id)}}">
                </form>
                @endcan
            </td>

        </tr>
        @endforeach
</table>
<div class="modal fade" id="modalCreateCust" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add New Customer</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('transaction.store')}}">
                    @csrf
                    <div class="form-group">
                        <select class="form-control" name="cust">
                            @foreach ($cust as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                        <small id="produkHelp" class="form-text text-muted">Please determine the customer.</small>
                        <select class="form-control" name="user">
                            @foreach ($user as $u)
                            <option value="{{$u->id}}">{{$u->name}}</option>
                            @endforeach
                        </select>
                        <small id="produkHelp" class="form-text text-muted">Please determine the user.</small>
                        <select class="form-control" name="product" id="productSelect" onchange="calculateSubtotal()">
                            @foreach ($prod as $p)
                            <option value="{{$p->id}}" data-price="{{ $p->price }}">{{$p->name}}</option>
                            @endforeach
                        </select>
                        <small id="produkHelp" class="form-text text-muted">Please determine your product.</small>
                        <input name="qty" id="quantityInput" oninput="calculateSubtotal()" type="number" class="form-control" id="tipetxt" aria-describedby="tipeHelp" placeholder="Enter Quantity">
                        <small id="produkHelp" class="form-text text-muted">Please determine your product Quantity.</small><br>
                        <p>Subtotal: Rp. <span id="subtotalDisplay">0.00</span></p>
                        <input type="hidden" id="subtotal" name="total" value="0.00">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEditB" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
        <div class="modal-content">
            <div class="modal-body" id="modalContentB">
                test
                {{-- You can put animated loading image here... --}}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
        <div class="modal-content" id="msg">
            <!--loading animated gif can put here-->
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<script>
    function getDetailData(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("transaction.showAjax")}}',
            data: '_token=<?php echo csrf_token() ?> &id=' + id,
            success: function(data) {
                $("#msg").html(data.msg);
            }
        });
    }

    function getEditFormB(trans_id) {
        $.ajax({
            type: 'POST',
            url: '{{route("transaction.getEditFormB")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': trans_id
            },
            success: function(data) {
                $('#modalContentB').html(data.msg)
            }
        });
    }

    function saveDataUpdateTD(trans_id) {
        var eOld = $('#eOld').val();
        var eCust = $('#eCust').val();
        var eCustName = $('#eCust option:selected').text();
        var eUser = $('#eUser').val();
        var eUserName = $('#eUser option:selected').text(); 
        var productSelect = $('#productSelectEdit').val();
        var eQty = $('#quantityInputEdit').val();
        var subtotal = $('#subtotaledit').val();

        console.log(eOld);
        $.ajax({
            type: 'POST',
            url: '{{route("transaction.saveDataTD")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': trans_id,
                'cust': eCust,
                'cust_name': eCustName,
                'user': eUser,
                'user_name': eUserName,
                'old_product_id': eOld,
                'product_id': productSelect,
                'qtys': eQty,
                'totals': subtotal
            },
            success: function(data) {
                if (data.status == "oke") {
                    $('#td_cust_' + trans_id).html(eCustName);
                    $('#td_user_' + trans_id).html(eUserName);
                    $('#modalEditB').modal('hide');
                }
            }
        })
    }

    function deleteDataRemoveTR(trans_id) {
        $.ajax({
            type: 'POST',
            url: '{{route("transaction.deleteData")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': trans_id
            },
            success: function(data) {
                if (data.status == "oke") {
                    $('#tr_' + trans_id).remove();
                }
            }
        });
    }

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