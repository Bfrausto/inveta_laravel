@extends('layouts/navbar')
@section('title', 'Clientes')
@section('content')
    <div id="contenedor-principal">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Empresa</th>
                {{-- <th scope="col">Dirección</th> --}}
                <th scope="col">Email</th>
                <th scope="col">Telefóno</th>
                <th scope="col">RFC</th>
                <th scope="col">Crédito</th>
                <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                <td scope="row">{{$client->id}}</td>
                <td><b>{{$client->name}}</b></td>
                <td>@if ($client->enterprise){{$client->enterprise}} @endif</td>
                {{-- <td>@if ($client->adress){{$client->adress}}@endif</td> --}}
                <td>@if ($client->email){{$client->email}}@endif</td>
                <td>@if ($client->tel){{$client->tel}}@endif</td>
                <td>@if ($client->rfc){{$client->rfc}}@endif</td>
                <td> $@money($client->balance)</td>
                <td>
                    @include("clients.modal-edit")
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
