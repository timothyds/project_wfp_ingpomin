<form method="POST" action="{{route('facility.update',$data->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleInputEmail1">Input Facility</label>
        <input type="text" name="name" class="form-control" id="eName" aria-describedby="tipeHelp" placeholder="Enter Facility Name" value="{{$data->name}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine your facility name.</small>
        <input type="text" name="description" class="form-control" id="eDescription" aria-describedby="tipeHelp" placeholder="Enter Description" value="{{$data->description}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine your description.</small>
    </div>
    <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

    <button type="button" class="btn btn-primary" onclick="saveDataUpdateTD({{$data->id}})">Submit</button>
</form>