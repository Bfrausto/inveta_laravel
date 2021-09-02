<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventario </title>
  <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
  <script src="https://kit.fontawesome.com/3fd1b9fc4b.js" crossorigin="anonymous"></script>

  <style>
    * {
        margin: 0px;
        padding: 0px;

    }

    #contenedor-principal{
        margin: 30px 35px 0px;
        padding: 0px 100px 30px;
        border-radius: 10px  ;
        box-shadow: 5px 5px 5px #aaaaaa;
        background-color: whitesmoke;
    }
</style>
</head>
<body>
    @include('layouts/navbar')
  <div id="contenedor-principal">
        <h1 style="padding-top: 10px;padding-bottom: 10px">Inventario</h1>
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cliente</th>
                <th scope="col">Producto</th>
                <th scope="col">Bodega</th>
                <th scope="col">Almacén</th>
                <th scope="col">Precio</th>
                <th scope="col">Transacción</th>
                <th scope="col">Saldo</th>
                <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                <tr>
                <th scope="row"><a href="{{$sale->path()}}">{{$sale->id}}</a></th>
                <td>{{$sale->created_at->setTimezone('GMT-5')}}</td>
                <td>{{$sale->client_name}}</td>
                <td>{{$sale->product_name}}-{{App\models\Sale::getProductDescription($sale->product_id)}}</td>
                <td>{{$sale->inv_store}} kg </td>
                <td>{{$sale->inv_house}} kg</td>
                <td>${{$sale->price}}</td>
                <td>${{$sale->transaction}} </td>
                <td>${{$sale->balance}}</td>
                <td> <a href="{{route('sales.edit',$sale->id)}}"><i class="fas fa-edit"></i></a> <a href=""><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</body>
</html>

