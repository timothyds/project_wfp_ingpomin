<form method="POST" action="{{route('customer.update',$data->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleInputEmail1">Input Customer</label>
        <input type="text" name="name" class="form-control" id="eName" aria-describedby="tipeHelp" placeholder="Enter Customer Name" value="{{$data->name}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine your customer name.</small>
        <input type="text" name="address" class="form-control" id="eAddress" aria-describedby="tipeHelp" placeholder="Enter Address" value="{{$data->address}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine your customer address.</small>
    </div>
    <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

    <button type="button" class="btn btn-primary" onclick="saveDataUpdateTD({{$data->id}})">Submit</button>
</form>