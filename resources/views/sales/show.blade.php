@extends('layouts/navbar')
@section('title', 'Venta '.$sale->id)
@section('content')
  <div id="contenedor-principal">
    <h5>Detalles de la venta</h5>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Cliente</th>
            <th scope="col">Total</th>
            <th scope="col">Pagado</th>

            </tr>
        </thead>
        <tbody>

            <tr>

            <td>{{$sale->created_at->format('d/m/Y')}}</td>
            <td>{{$sale->getClient($sale->client_id)}}</td>
            <td>${{$sale->total}}</td>
            <td>${{$sale->paid}}  </td>
            </tr>

        </tbody>

    </table>
    <h5>Productos vendidos</h5>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tamaño</th>
            <th scope="col">Precio</th>
            <th scope="col">Kg</th>
            <th scope="col">Total</th>
            <th scope="col">Salida</th>

            </tr>
        </thead>
        <tbody>
            @foreach($sale->productSales as $individualSale)
            <tr>
            <td>
                <strong>{{$loop->iteration}}</strong>
            </td>
            <td>{{$individualSale->product_name}}</td>
            <td>{{$individualSale->size=="small"?'Ch':($individualSale->size=="medium"?'M':'G')}} </td>
            <td>${{$individualSale->price}}</td>
            <td>{{$individualSale->kg}} kg  </td>
            <td>${{$individualSale->total}}</td>
            <td>{{$individualSale->out}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop
