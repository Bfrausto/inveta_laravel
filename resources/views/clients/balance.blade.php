@extends('layouts/creation')
@section('title')
    <title>Registro de Cliente</title>
@endsection
@section('head')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
@endsection
@section('content')
    <div id="contenedor-principal">
        <form action="/clients/{{$client->id}}/saldo" method="post">
            @csrf
            @method('PATCH')
            <div id="contenedor-texto">
                <p style="padding:10px; text-align:center; font-weight:bold;font-size:25px"> Actualizar Crédito</p>
                <div id="fecha">
                    <p id="fecha-sol"  style="font-size:25px">{{ $client->name}}<br></p>
                </div>
                <div class="boxes">

                    <div class="container">
                        <div class="row ">
                            <div class="col-2 borde salto">
                                <p  style="font-weight:bold;">Crédito Actual:</p>
                            </div>
                            <div class="col  min">
                                <input class="input @error('balance') is-danger @enderror" type="text" name="balance"
                                    required value="{{$client->balance}}">
                            </div>
                        </div>
                        @error('balance')
                            <p class="help is-danger is-size-6" style="margin-left:112px;text-align: left;padding-top:0px">El Crédito tiene un formato incorrecto (solo números).</p>
                        @enderror
                    </div>
                </div>
                <button type="submit">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
