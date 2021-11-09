@extends('layouts/navbar')
@section('title', 'Inventario')
@section('style')
    <style>
        strong{
            color:#495057
        }
    </style>
@stop
@section('content')
  <div id="contenedor-principal">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Bodega</th>
                <th scope="col">Almacén</th>

                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td scope="row">{{$product->id}} </td>
                    <td><a href="{{$product->path()}}">{{$product->name}}</a></td>
                    <td>{{$product->description}}</td>
                    <td>
                        @if($product->small)<strong>Ch:</strong> ${{$product->small->price}} @if($product->medium||$product->big)<strong>|</strong>@endif @endif
                        @if($product->medium)<strong>M: </strong>${{$product->medium->price}} @if($product->big)<strong>|</strong>@endif @endif
                        @if($product->big)<strong>G: </strong>${{$product->big->price}}@endif
                    </td>
                    <td>
                        @if($product->small)<strong>Ch: </strong>{{$product->small->inv_store}} kg @if($product->medium||$product->big)<strong>|</strong>@endif @endif
                        @if($product->medium)<strong>M: </strong>{{$product->medium->inv_store}} kg @if($product->big)<strong>|</strong>@endif @endif
                        @if($product->big)<strong>G: </strong>{{$product->big->inv_store}} kg @endif
                    </td>
                    <td>
                        @if($product->small)<strong>Ch: </strong>{{$product->small->inv_house}} kg @if($product->medium||$product->big)<strong>|</strong>@endif @endif
                        @if($product->medium)<strong>M: </strong>{{$product->medium->inv_house}} kg @if($product->big)<strong>|</strong>@endif @endif
                        @if($product->big)<strong>G: </strong>{{$product->big->inv_house}} kg @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

  </div>
  @stop
