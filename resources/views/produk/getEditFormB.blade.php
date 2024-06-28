<form method="POST" action="{{route('produk.update',$data->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleInputEmail1">Input Product</label>
        <input type="text" name="name" class="form-control" id="eName" aria-describedby="tipeHelp" placeholder="Enter Product Name" value="{{$data->name}}">
        <small id="produkHelp" class="form-text text-muted">Please determine your product name.</small>
        <input type="text" name="price" class="form-control" id="ePrice" aria-describedby="tipeHelp" placeholder="Enter Product Price" value="{{$data->price}}">
        <small id="produkHelp" class="form-text text-muted" >Please determine your product price.</small>
        <input type="text" name="image" class="form-control" id="eImage" aria-describedby="tipeHelp" placeholder="Enter Product Image" value="{{$data->image}}">
        <small id="produkHelp" class="form-text text-muted">Please determine your product image.</small>
        <input type="text" name="available_room" class="form-control" id="eAvail" aria-describedby="tipeHelp" placeholder="Enter Product Available Room" value="{{$data->available_room}}">
        <small id="produkHelp" class="form-text text-muted">Please determine your product available room.</small>
        <small id="produkHelp" class="form-text text-muted">Please determine your product available room.</small>
    </div>
    <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

    <button type="button" class="btn btn-primary" onclick="saveDataUpdateTD({{$data->id}})">Submit</button>
</form>