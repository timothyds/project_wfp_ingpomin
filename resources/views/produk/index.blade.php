@extends('layouts.frontend')
<!-- @section('disc') -->

@section('breadcrumb')
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Hotel</a></li>
            {{-- <li class="breadcrumb-item active">{{ $pageName }}</li> --}}
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class='row'>
        @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        @csrf
        @if (Auth::user()->role == 'staff' || Auth::user()->role == 'owner')
        <a class="btn btn-success" href="{{ route('produk.create') }}">+ New Product</a>
        <a href="#modalCreateProd" data-toggle="modal" class="btn btn-info">+ New Product(with Modals)</a>
        @endif
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
                <tr id="tr_{{ $r->id }}">
                    <th scope="row">{{ $r->id }}</th>
                    <td id="td_name_{{ $r->id }}">{{ $r->name }}</td>
                    <td>
                        @if ($r->filenames)
                        @foreach ($r->filenames as $filename)
                        <img height='100px' src="{{ asset('product/' . $r->id . '/' . $filename) }}" />
                        <form style="display: inline" method="POST" action="{{ url('produk/delPhoto') }}">
                            @csrf
                            <input type="hidden" value="{{ 'product/' . $r->id . '/' . $filename }}" name='filepath' />
                            <input type="submit" value="delete" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure ? ');">
                        </form>
                        <br>
                        @endforeach
                        @endif
                        <a href="{{ url('produk/uploadPhoto/' . $r->id) }}">
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
            </br>
            @if (Auth::user()->role == 'pembeli')
            <div class="row">
                <div class="col-md-12">
                    <div class="product-view-top">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="product-search">
                                    <input type="email" value="Search">
                                    <button><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="product-short">
                                    <div class="dropdown">
                                        <div class="dropdown-toggle" data-toggle="dropdown">Product short by</div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Newest</a>
                                            <a href="#" class="dropdown-item">Popular</a>
                                            <a href="#" class="dropdown-item">Most sale</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="product-price-range">
                                    <div class="dropdown">
                                        <div class="dropdown-toggle" data-toggle="dropdown">Product price range</div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">$0 to $50</a>
                                            <a href="#" class="dropdown-item">$51 to $100</a>
                                            <a href="#" class="dropdown-item">$101 to $150</a>
                                            <a href="#" class="dropdown-item">$151 to $200</a>
                                            <a href="#" class="dropdown-item">$201 to $250</a>
                                            <a href="#" class="dropdown-item">$251 to $300</a>
                                            <a href="#" class="dropdown-item">$301 to $350</a>
                                            <a href="#" class="dropdown-item">$351 to $400</a>
                                            <a href="#" class="dropdown-item">$401 to $450</a>
                                            <a href="#" class="dropdown-item">$451 to $500</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($rs as $p)
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="{{ route('produk.show', $p->id) }}">{{ $p->name }}</a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.html">
                                @if ($p->image == null)
                                <img src="{{ asset('images/blank.jpg') }}">
                                @else
                                <img src="{{ asset('images/' . $p->image) }}" alt="Product Image">
                                @endif
                            </a>
                            <div class="product-action">
                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><span>{{ $p->product_type->name }}</span></h3>
                            <br>
                            <h3><span>IDR</span>{{ $p->price }}</h3>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
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

        console.log(eName);
        console.log(ePrice);
        console.log(eAvail);
        $.ajax({
            type: 'POST',
            url: '{{route("produk.saveDataTD")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': product_id,
                'name': eName,
                'price': ePrice,
                'available_room': eAvail,

            },
            success: function(data) {
                if (data.status == "oke") {
                    $('#td_name_' + product_id).html(eName);
                    $('#td_price_' + product_id).html(ePrice);
                    $('#td_avail_' + product_id).html(eAvail);
                    $('#modalEditB').modal('hide');
                    $('.modal-backdrop').remove();
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