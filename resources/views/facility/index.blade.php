@extends('layouts.frontend')

@section('content')
    <div class="container-fluid">
        @if (Auth::user()->role == 'owner')
            <a class="btn btn-success" href="{{ route('facility.create') }}">+ New Facility</a>
            <a href="#modalCreateFacility" data-toggle="modal" class="btn btn-info">+ New Facility(with Modals)</a>
        @endif
        @csrf
        <h2>Welcome page</h2>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Fasilitas</th>
                    <th scope="col">Deskripsi</th>
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
                        <td id="td_description_{{ $d->id }}">{{ $d->description }}</td>
                        <td>{{ $d->created_at }}</td>
                        <td>{{ $d->updated_at }}</td>
                        <td><a class="btn btn-warning" href="{{ route('facility.edit', $d->id) }}">Edit</a></td>
                        <td>
                            <a href="#modalEditB" class="btn btn-info" data-toggle="modal"
                                onclick="getEditFormB({{ $d->id }})">Edit Type B</a>
                            @can('delete-permission', Auth::user())
                                <a href="#" value="DeleteNoReload" class="btn btn-danger"
                                    onclick="if(confirm('Are you sure to delete {{ $d->id }} - {{ $d->name }} ? ')) deleteDataRemoveTR({{ $d->id }})">Delete
                                    without Reload</a>
                                <form method="POST" action="{{ route('facility.destroy', $d->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete {{ $d->id }}-{{ $d->name }} ? ')"
                                        value="Delete" action="{{ route('facility.destroy', $d->id) }}">
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
                        <h4 class="modal-title">Add New Facility</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('facility.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Input Facility</label>
                                <input type="text" name="name" class="form-control" id="fasilitastxt"
                                    aria-describedby="tipeHelp" placeholder="Enter Facility Name">
                                <small id="tipeHelp" class="form-text text-muted">Please determine your facility
                                    name.</small>
                                <input type="text" name="description" class="form-control" id="descriptiontxt"
                                    aria-describedby="tipeHelp" placeholder="Enter Description">
                                <small id="tipeHelp" class="form-text text-muted">Please determine your facility
                                    description.</small>
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
        function getEditFormB(facility_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route("facility.getEditFormB") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': facility_id
                },
                success: function(data) {
                    $('#modalContentB').html(data.msg)
                }
            });
        }

        function saveDataUpdateTD(facility_id) {
            var eName = $('#eName').val();
            var eDescription = $('#eDescription').val();
            console.log(eName); //debug->print to browser console
            console.log(eDescription);
            $.ajax({
                type: 'POST',
                url: '{{ route("facility.saveDataTD") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': facility_id,
                    'name': eName,
                    'description': eDescription
                },
                success: function(data) {
                    if (data.status == "oke") {
                        $('#td_name_' + facility_id).html(eName);
                        $('#td_description_' + facility_id).html(eDescription);
                        $('#modalEditB').modal('hide');
                    }
                }
            })
        }

        function deleteDataRemoveTR(facility_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route("facility.deleteData") }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': facility_id
                },
                success: function(data) {
                    if (data.status == "oke") {
                        $('#tr_' + facility_id).remove();
                    }
                }
            });
        }
    </script>
@endsection
