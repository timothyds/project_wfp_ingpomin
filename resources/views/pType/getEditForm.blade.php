<form method="POST" action="{{route('produkType.update',$data->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleInputEmail1">Edit Tipe Produk</label>
        <input type="text" name="name" class="form-control" id="tipetxt" aria-describedby="tipeHelp" placeholder="Enter Type name" value="{{$data->name}}">
        <small id="tipeHelp" class="form-text text-muted">Please determine your type name.</small>
    </div>
    <a class="btn btn-primary" href="{{url()->previous()}}">Cancel</a>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>