@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
    <a class="btn btn-success" href="{{ route('produkType.create') }}">+ New Product Type</a>
    <a href="#modalCreate" data-toggle="modal" class="btn btn-info">+ New Product Type(with Modals)</a>
    @csrf
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Type Name</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr id="tr_{{ $d->id }}">
                    <th scope="row">{{ $d->id }}</th>
                    <td id="td_name_{{ $d->id }}">{{ $d->name }}</td>
                    <td>{{ $d->created_at }}</td>
                    <td>{{ $d->updated_at }}</td>
                    <td><a class="btn btn-warning" href="{{ route('produkType.edit', $d->id) }}">Edit</a></td>
                    <td>
                        <a href="#modalEditA" class="btn btn-warning" data-toggle="modal"
                            onclick="getEditForm({{ $d->id }})">Edit Type A</a>
                        <a href="#modalEditB" class="btn btn-info" data-toggle="modal"
                            onclick="getEditFormB({{ $d->id }})">Edit Type B</a>
                        @can('delete-permission', Auth::user())
                            <a href="#" value="DeleteNoReload" class="btn btn-danger"
                                onclick="if(confirm('Are you sure to delete {{ $d->id }} - {{ $d->name }} ? ')) deleteDataRemoveTR({{ $d->id }})">Delete
                                without Reload</a>

                            <form method="POST" action="{{ route('produkType.destroy', $d->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure to delete {{ $d->id }}-{{ $d->name }} ? ')"
                                    value="Delete" action="{{ route('produkType.destroy', $d->id) }}">
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="modalEditA" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content">
                <div class="modal-body" id="modalContent">
                    {{-- You can put animated loading image here... --}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEditB" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content">
                <div class="modal-body" id="modalContentB">
                    {{-- You can put animated loading image here... --}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Product Type</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('produkType.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Type</label>
                            <input type="text" name="name" class="form-control" id="tipetxt"
                                aria-describedby="tipeHelp" placeholder="Enter Type name">
                            <small id="tipeHelp" class="form-text text-muted">Please determine your type name.</small>
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
        function getEditForm(type_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route("tipe.getEditForm") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': type_id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg)
                }
            });
        }

        function getEditFormB(type_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route("tipe.getEditFormB") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': type_id
                },
                success: function(data) {
                    $('#modalContentB').html(data.msg)
                }
            });
        }

        function saveDataUpdateTD(type_id) {
            var eName = $('#eName').val();
            var eDesc = $('#eDesc').val();
            console.log(eName); //debug->print to browser console
            console.log(eDesc);
            $.ajax({
                type: 'POST',
                url: '{{ route("tipe.saveDataTD") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': type_id,
                    'name': eName,
                    'desc': eDesc
                },
                success: function(data) {
                    if (data.status == "oke") {
                        $('#td_name_' + type_id).html(eName);
                        $('#td_desc_' + type_id).html(eDesc);
                        $('#modalEditB').modal('hide');
                    }
                }
            })
        }

        function deleteDataRemoveTR(type_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route("tipe.deleteData") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': type_id
                },
                success: function(data) {
                    if (data.status == "oke") {
                        $('#tr_' + type_id).remove();
                    }
                }
            });
        }
    </script>
@endsection
