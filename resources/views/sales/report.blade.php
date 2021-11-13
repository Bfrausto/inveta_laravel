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

                <button type="submit" class="btn btn-primary ml-1">Filtrar</button>

            </form>
        </div>
        <div class="">
            <a href="{{route('sales.generateCSV')}}?start_at={{request('start_at')}}&end_at={{request('end_at')}}&ids="
            class="btn btn-outline-primary " onclick="return getClientIds();" id="csv"
           ><i class="fa fa-download"></i> Descargar reporte
        </a>
    </div>
    </div>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Total Comprado</th>
                <th scope="col">Total Pagado</th>
                <th scope="col">Incluir en el reporte</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                <tr>
                    <td >
                        <strong>{{$loop->iteration}}</strong>
                    </td>

                <td>{{$sale->getClient($sale->client_id)}}</td>
                <td>{{$sale->total}}</td>
                <td>{{$sale->paid}}  </td>
                <td>
                    <div class="clients_ids">
                        <input class=' form-check-input ml-0' type='checkbox'  id="{{$sale->client_id}}" value="{{$sale->client_id}}">
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

@stop
@section('scripts')
    @parent
    <script>
        var selector =null
        function getClientIds(){
            if(selector!=null){
                $("#csv").prop("href",selector);
            }
            selector=$('#csv').attr('href');
            $('.clients_ids input[type=checkbox]').each(function () {
                if(this.checked){
                    $("#csv").prop("href", $('#csv').attr('href')+$(this).val()+",");
                }
            });
        }


    </script>
@stop

