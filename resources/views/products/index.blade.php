<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventario </title>
  <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
  <style>
    * {
        margin: 0px;
        padding: 0px;

    }

    #contenedor-principal{
        margin: 30px 200px 0px;
        padding: 0px 100px 30px;
        border-radius: 10px  ;
        box-shadow: 5px 5px 5px #aaaaaa;
        background-color: whitesmoke;
    }
</style>
</head>
<body>
    @include('layouts/tohome')
  <div id="contenedor-principal">
        <h1 style="padding-top: 10px;padding-bottom: 10px">Inventario</h1>
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Bodega</th>
                <th scope="col">Almacén</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                <th scope="row">{{$product->id}}</th>
                <td><a href="{{$product->path()}}">{{$product->name}}</a></td>
                <td>{{$product->description}}</td>
                <td>{{$product->inv_store}} kg </td>
                <td>{{$product->inv_house}} kg</td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</body>
</html>
