@extends('layouts.frontend')
@section('content')
<div class="container-fluid">
    <div class='row'>
        <a class="btn btn-success" href="{{route('produk.create')}}">+ New Product</a>
        <a href="#modalCreateProd" data-toggle="modal" class="btn btn-info">+ New Product(with Modals)</a>
        @if (session('status'))
        <div class="alert alert-success">{{session("status")}}</div>
        @endif
        @csrf
        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Product Images</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Available room</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Hotel</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rs as $r)
                <tr id="tr_{{$r->id}}">
                    <th scope="row">{{$r->id}}</th>
                    <td id="td_name_{{$r->id}}">{{$r->name}}</td>
                    <td>
                        @if($r->filenames)
                        @foreach ($r->filenames as $filename)
                        <img height='100px' src="{{asset('product/'.$r->id.'/'.$filename)}}" />
                        <form style="display: inline" method="POST" action="{{url('produk/delPhoto')}}">
                            @csrf
                            <input type="hidden" value="{{'product/'.$r->id.'/'.$filename}}" name='filepath' />
                            <input type="submit" value="delete" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure ? ');">
                        </form>
                        <br>
                        @endforeach
                        @endif
                        <a href="{{ url('produk/uploadPhoto/'.$r->id) }}">
                            <button class='btn btn-xs btn-default'>upload</button></a>
                    </td>

                    <td id="td_price_{{$r->id}}">Rp. {{number_format($r->price, 0, ',', ',')}}</td>
                    <td id="td_avail_{{$r->id}}">{{$r->available_room}}</td>
                    <td>{{$r->created_at}}</td>
                    <td>{{$r->updated_at}}</td>
                    <td>
                        @if($r->hotelWithTrashed){{$r->hotelWithTrashed->name}}
                        @endif
                    </td>
                    <td>
                        @can('delete-permission',Auth::user())
                        <a href="#modalEditB" class="btn btn-info" data-toggle="modal" onclick="getEditFormB({{$r->id}})">Edit Type B</a>
                        <a class="btn btn-warning" href="{{ route('produk.edit', $r->id)}}">Edit</a>
                        <a href="#" value="DeleteNoReload" class="btn btn-danger" onclick="if(confirm('Are you sure to delete {{$r->id}} - {{$r->name}} ? ')) deleteDataRemoveTR({{$r->id}})">Delete without Reload</a>
                        <form method="POST" action="{{route('produk.destroy',$r->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$r->id}}-{{$r->name}} ? ')" value="Delete" action="{{route('produk.destroy',$r->id)}}">
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
        <div class="modal fade" id="modalCreateProd" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New Product</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('produk.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Input Product</label>
                                <input type="text" name="name" class="form-control" id="produktxt" aria-describedby="tipeHelp" placeholder="Enter Product Name">
                                <small id="produkHelp" class="form-text text-muted">Please determine your product name.</small>
                                <input type="text" name="price" class="form-control" id="pricetxt" aria-describedby="tipeHelp" placeholder="Enter Product Price">
                                <small id="produkHelp" class="form-text text-muted">Please determine your product price.</small>
                                <input type="text" name="image" class="form-control" id="imgtxt" aria-describedby="tipeHelp" placeholder="Enter Product Image">
                                <small id="produkHelp" class="form-text text-muted">Please determine your product image.</small>
                                <input type="text" name="available_room" class="form-control" id="availtxt" aria-describedby="tipeHelp" placeholder="Enter Product Available Room">
                                <small id="produkHelp" class="form-text text-muted">Please determine your product available room.</small>
                                <select class="form-control" name="hotel">
                                    @foreach ($hotel as $h)
                                    <option value="{{$h->id}}">{{$h->name}}</option>
                                    @endforeach
                                </select>
                                <small id="produkHelp" class="form-text text-muted">Please determine your product Hotel.</small>
                                <select class="form-control" name="type">
                                    @foreach ($type as $t)
                                    <option value="{{$t->id}}">{{$t->name}}</option>
                                    @endforeach
                                </select>
                                <small id="produkHelp" class="form-text text-muted">Please determine your product type.</small>
                                <label for="facilities">Facilities:</label>
                                @foreach ($facility as $f)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="facilities[]" value="{{ $f->id }}" id="facility{{ $f->id }}">
                                    <label class="form-check-label" for="facility{{ $f->id }}">
                                        {{ $f->name }}
                                    </label>
                                </div>
                                @endforeach
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
        @foreach ($rs as $r)
        <div class="thumbnail" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset ('images/'.$r->image) }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$r->name}}</h5>
                <p class="card-text">Harga : Rp. {{number_format($r->price, 0,',', ',')}}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($rs as $r)
    <li> {{$r->name}} dari <i>@if($r->hotelWithTrashed){{$r->hotelWithTrashed->name}}
            @endif
        </i></li>
    @endforeach



</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
@section('js')
<script>
    function getEditFormB(product_id) {
        $.ajax({
            type: 'POST',
            url: '{{route("produk.getEditFormB")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': product_id
            },
            success: function(data) {
                $('#modalContentB').html(data.msg)
            }
        });
    }

    function saveDataUpdateTD(product_id) {
        var eName = $('#eName').val();
        var ePrice = $('#ePrice').val();
        var eAvail = $('#eAvail').val();
        var eImage = $('#eImage').val();

        console.log(eName);
        console.log(ePrice);
        console.log(eAvail);
        console.log(eImage);
        $.ajax({
            type: 'POST',
            url: '{{route("produk.saveDataTD")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': product_id,
                'name': eName,
                'price': ePrice,
                'image': eImage,
                'available_room': eAvail,

            },
            success: function(data) {
                if (data.status == "oke") {
                    $('#td_name_' + product_id).html(eName);
                    $('#td_price_' + product_id).html(ePrice);
                    $('#td_avail_' + product_id).html(eAvail);
                    $('#modalEditB').modal('hide');
                }
            }
        })
    }

    function deleteDataRemoveTR(product_id) {
        $.ajax({
            type: 'POST',
            url: '{{route("produk.deleteData")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': product_id
            },
            success: function(data) {
                if (data.status == "oke") {
                    $('#tr_' + product_id).remove();
                }
            }
        });
    }
</script>

@endsection