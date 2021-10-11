@extends('layouts/navbar')
@section('title', 'Ventas')
@section('content')
  <div id="contenedor-principal">
        <table class="table table-hover">
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
                <th scope="row">
                    {{$sale->id}}
                    {{-- <a href="{{$sale->path()}}">{{$sale->id}}</a> --}}
                </th>
                <td>{{$sale->created_at->setTimezone('GMT-5')}}</td>
                <td>{{$sale->client_name}}</td>
                <td>{{$sale->product_name}}-{{App\models\Sale::getProductDescription($sale->product_id)}}</td>
                <td>{{$sale->inv_store}} kg </td>
                <td>{{$sale->inv_house}} kg</td>
                <td>${{$sale->price}}</td>
                <td>${{$sale->transaction}} </td>
                <td>${{$sale->balance}}</td>
                <td>
                    @include("sales.modal-edit")
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @stop

