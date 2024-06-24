@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
<a class="btn btn-success" href="{{route('customer.create')}}">+ New Customer</a>
<a href="#modalCreateCust" data-toggle="modal" class="btn btn-info">+ New Customer(with Modals)</a>
@csrf
<h2>Welcome page</h2>
@if (session('status'))
<div class="alert alert-success">{{session("status")}}</div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Customer</th>
      <th scope="col">Alamat</th>
      <th scope="col">Created at</th>
      <th scope="col">Updated at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $d)
    <tr id="tr_{{$d->id}}">
      <th scope="row">{{$d->id}}</th>
      <td id="td_name_{{$d->id}}">{{$d->name}}</td>
      <td id="td_address_{{$d->id}}">{{$d->address}}</td>
      <td>{{$d->created_at}}</td>
      <td>{{$d->updated_at}}</td>
      <td><a class="btn btn-warning" href="{{ route('customer.edit', $d->id)}}">Edit</a></td>
      <td>
        <a href="#modalEditB" class="btn btn-info" data-toggle="modal" onclick="getEditFormB({{$d->id}})">Edit Type B</a>
        @can('delete-permission',Auth::user())
        <a href="#" value="DeleteNoReload" class="btn btn-danger" onclick="if(confirm('Are you sure to delete {{$d->id}} - {{$d->name}} ? ')) deleteDataRemoveTR({{$d->id}})">Delete without Reload</a>
        <form method="POST" action="{{route('customer.destroy',$d->id)}}">
          @csrf
          @method('DELETE')
          <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$d->id}}-{{$d->name}} ? ')" value="Delete" action="{{route('customer.destroy',$d->id)}}">
        </form>
        @endcan
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="modal fade" id="modalEditB" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-wide">
    <div class="modal-content">
      <div class="modal-body" id="modalContentB">
        {{-- You can put animated loading image here... --}}
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalCreateCust" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Add New Customer</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('customer.store')}}">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Input Customer</label>
            <input type="text" name="name" class="form-control" id="tipetxt" aria-describedby="tipeHelp" placeholder="Enter Customer Name">
            <small id="tipeHelp" class="form-text text-muted">Please determine your customer name.</small>
            <input type="text" name="address" class="form-control" id="addresstxt" aria-describedby="tipeHelp" placeholder="Enter Address">
            <small id="tipeHelp" class="form-text text-muted">Please determine your customer address.</small>
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
</div>
@endsection

@section('js')
<script>
  function getEditFormB(customer_id) {
    $.ajax({
      type: 'POST',
      url: '{{route("customer.getEditFormB")}}',
      data: {
        '_token': '<?php echo csrf_token() ?>',
        'id': customer_id
      },
      success: function(data) {
        $('#modalContentB').html(data.msg)
      }
    });
  }

  function saveDataUpdateTD(customer_id) {
    var eName = $('#eName').val();
    var eAddress = $('#eAddress').val();
    console.log(eName); //debug->print to browser console
    console.log(eAddress);
    $.ajax({
      type: 'POST',
      url: '{{route("customer.saveDataTD")}}',
      data: {
        '_token': '<?php echo csrf_token() ?>',
        'id': customer_id,
        'name': eName,
        'address': eAddress
      },
      success: function(data) {
        if (data.status == "oke") {
          $('#td_name_' + customer_id).html(eName);
          $('#td_address_' + customer_id).html(eAddress);
          $('#modalEditB').modal('hide');
        }
      }
    })
  }

  function deleteDataRemoveTR(customer_id) {
    $.ajax({
      type: 'POST',
      url: '{{route("customer.deleteData")}}',
      data: {
        '_token': '<?php echo csrf_token() ?>',
        'id': customer_id
      },
      success: function(data) {
        if (data.status == "oke") {
          $('#tr_' + customer_id).remove();
        }
      }
    });
  }
</script>

@endsection