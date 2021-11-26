@extends('layouts/navbar')
@section('title', 'Ventas')
@section('content')
  <div id="contenedor-principal">
    <div class="d-flex justify-content-between">
        <div class="  mb-2">
            <form class="form-inline" method="GET">
                <div class="form-group">

                    <label class ="input-group-text input-group-text" for="start_at">Fecha de inicio</label>
                    <input type="date" class="form-control" id="start_at" name="start_at"
                           value="{{request('start_at')}}">
                </div>
                <div class="form-group ml-1">
                    <label class ="input-group-text input-group-text" for="end_at">Fecha de término</label>
                    <input type="date" class="form-control" id="end_at" name="end_at" value="{{request('end_at')}}">
                </div>
                <select name="client_id" class="custom-select ml-1" id="client_id">


                   @if (!request('client_id'))
                        <option selected
                                value="">
                                Seleccione un cliente
                        </option>
                    @else
                        <option
                            value="">
                            Ver todos los clientes
                        </option>
                    @endif
                    @foreach ($clients as $client)
                    @if (request('client_id') and request('client_id')==$client->id)
                        <option selected
                                value="{{request('client_id')}}">
                                {{App\models\Sale::getClient(request('client_id'))}}
                        </option>
                    @else
                        <option  value="{{$client->id}}">
                            {{$client->name}}
                        </option>
                    @endif

                    @endforeach
                </select>

                <button type="submit" class="btn btn-primary ml-1">Filtrar</button>

            </form>
        </div>
        <div class="">
            <a href="{{route('sales.report')}}?start_at={{request('start_at')}}&end_at={{request('end_at')}}&status={{request('status')}}"
             class="btn btn-outline-primary "
           ><i class="fas fa-file-alt"></i> Ver Reportes
        </a>
    </div>
    </div>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cliente</th>
                <th scope="col">Total</th>
                <th scope="col">Pagado</th>
                <th scope="col">Ver detalles</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                <tr>
                    <td >
                        <strong>{{$sale->id}}</strong>
                    </td>

                <td>{{$sale->created_at->format('d/m/Y')}}</td>
                <td>{{$sale->getClient($sale->client_id)}}</td>
                <td>{{$sale->total}}</td>
                <td>{{$sale->paid}}  </td>
                <td>
                    <a href="{{route('sales.show',$sale->id)}}"> <i class="far fa-eye"></i> Visualizar</a>
                 </td>
                 <td>
                    <form method="POST" action="{{$sale->path()}}/delete">
                        @csrf

                        <button id="delete" type="submit" class="fas fa-trash-alt" style="border: none;color: rgb(201, 13, 13);" onclick="return confirm('¿Estás seguro de que quieres eliminar esta venta?');"></button>
                    </form>
                 </td>

                </tr>
                @endforeach
            </tbody>
        </table>

@stop

