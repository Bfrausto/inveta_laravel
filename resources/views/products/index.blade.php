@extends('layouts/navbar')
@section('title', 'Inventario')
@section('content')
  <div id="contenedor-principal">
        <table class="table table-hover">
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
                <th scope="row">{{$product->id}} </th>
                <td><a href="{{$product->path()}}">{{$product->name}}</a></td>
                <td>{{$product->description}}</td>
                <td>{{$product->inv_store}} kg </td>
                <td>{{$product->inv_house}} kg</td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
  @stop
