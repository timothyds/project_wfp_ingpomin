<form method="POST" action="{{route('tipe.update',$data->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleInputEmail1">Edit Tipe hotel</label>
        <input type="text" name="name" class="form-control" id="eName" aria-describedby="tipeHelp" placeholder="Enter Type name" value="{{$data->name}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine your type name.</small>
        <input type="text" name="desc" class="form-control" id="eDesc" aria-describedby="tipeHelp" placeholder="Enter Description" value="{{$data->description}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine your description.</small>
    </div>
    <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

    
</form><button type="button" class="btn btn-primary" onclick="saveDataUpdateTD({{$data->id}})">Submit</button>