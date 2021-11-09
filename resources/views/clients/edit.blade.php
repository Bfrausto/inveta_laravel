@extends('layouts/creation')
@section('title')
    <title>Registro de Cliente</title>
@endsection
@section('head')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
@endsection
@section('content')
    <div id="contenedor-principal">
        <form action="/clients/{{$client->id}}/edit" method="post">
            @csrf
            @method('PATCH')
            <div id="contenedor-texto">
                <div id="fecha">
                    <p id="fecha-sol">Actualizar Cliente<br></p>
                </div>
                <div class="boxes">
                    <p style="padding-bottom:10px">Datos del Cliente </p>
                    <div class="container">
                        <div class="row">
                            <div class="col-2 borde">
                                <p>Nombre:*</p>
                            </div>
                            <div class="col borde2">
                                <input class="input @error('name') is-danger @enderror" type="text" name="name" required value="{{ $client->name}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 borde">
                                <p>Empresa:</p>
                            </div>
                            <div class="col borde2">
                                <input class="input @error('enterprise') is-danger @enderror" type="text" name="enterprise" value="{{ $client->enterprise}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 borde ">
                                <p>Dirección:</p>
                            </div>
                            <div class="col borde2">
                                <input class="input @error('adress') is-danger @enderror" type="text" name="adress" value="{{ $client->adress }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 borde">
                                <p>Correo:</p>
                            </div>
                            <div class="col borde2">
                                <input class="input @error('email') is-danger @enderror" type="text" name="email" value="{{ $client->email }}">
                            </div>
                        </div>
                        @error('email')
                            <p class="help is-danger is-size-6" style="margin-left:112px; text-align: left;padding-top:0px">El correo tiene un formato incorrecto (usuario@dominio).</p>
                        @enderror
                        <div class="row">
                            <div class="col-2 borde">
                                <p>Teléfono:</p>
                            </div>
                            <div class="col  min">
                                <input class="input @error('tel') is-danger @enderror" type="text" name="tel" value="{{$client->tel}}">
                            </div>
                        </div>
                        @error('tel')
                            <p class="help is-danger is-size-6" style="margin-left:112px; text-align: left;padding-top:0px">El teléfono tiene un formato incorrecto.</p>
                        @enderror
                        <div class="row">
                            <div class="col-2 borde ">
                                <p>RFC:</p>
                            </div>
                            <div class="col  min">
                                <input class="input @error('RFC') is-danger @enderror" type="text" name="rfc"
                                    value="{{ $client->rfc }}">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-2 borde salto">
                                <p>Crédito Actual:*</p>
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
                    <p style="font-size:13px;padding-bottom:10px">*Datos obligatorios </p>
                </div>
                <button type="submit">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
