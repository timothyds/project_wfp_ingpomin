
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class='row'>
        @foreach ($datas as $p)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset ('images/'.$p->image) }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$p->name}}</h5>
                <p class="card-text">Harga : {{$p->price}}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        @endforeach
        
        <table class="table table-striped">
            @foreach ($datas as $p)
            <li> {{$p->name}} dari <i>{{$p->hotel->name}}</i></li>
            @endforeach
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Hotel</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $p)
                <tr>
                    <th scope="row">{{$p->id}}</th>
                    <td>{{$p->name}}</td>
                    <td>{{$p->price}}</td>
                    <td>{{$p->hotel->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>