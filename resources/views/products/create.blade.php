@extends('layouts/creation')
@section('title')
    <title>Registro de Producto</title>
@endsection
@section('head')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css"> --}}
@endsection
@section('content')
    <div id="contenedor-principal">
        <form action="/products" method="post" enctype="multipart/form-data">
            @csrf
            <div id="contenedor-texto">
                <div id="fecha">
                    <p id="fecha-sol">Registro de Producto<br></p>
                </div>
                <div class="boxes">
                    <p>Datos del Producto </p>
                    <div class="container">
                        <div class="row">
                            <div class="col-2 borde">
                                <p>Nombre:</p>
                            </div>
                            <div class="col borde2">
                                <input class="input  @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        @error('name')
                            <p class="help is-danger is-size-6" style="margin-left:112px; text-align: left;padding-top:0px">Ingresar nombre del producto.</p>
                        @enderror
                        <div class="row">
                            <div class="col-2 borde">
                                <p>Descripción:</p>
                            </div>
                            <div class="col borde2">
                                <input class="input  @error('description') is-danger @enderror" type="text" name="description" value="{{ old('description') }}">
                            </div>
                        </div>
                        @error('description')
                            <p class="help is-danger is-size-6" style="margin-left:112px; text-align: left;padding-top:0px">Ingresar descripción del producto.</p>
                        @enderror
                        <div class="row">
                            <div class="col-2 borde">
                                <p>Imagen:</p>
                            </div>
                            <div class="col borde2 salto">
                                <input class="input  @error('img') is-danger @enderror" type="file" name="img" value="{{ old('img') }}">
                            </div>
                        </div>
                        @error('img')
                            <p class="help is-danger is-size-6" style="margin-left:112px; text-align: left;padding-top:0px">La imagen tiene un formato incorrecto.</p>
                        @enderror
                    </div>
                    <p>Cantidades Iniciales </p>
                    <div class="container">
                        <div class="row">
                            <div class="col-2 borde ">
                                <p>Bodega:</p>
                            </div>
                            <div class="col min">
                                <input class="input @error('inv_store') is-danger @enderror" type="text" name="inv_store" value="{{ old('inv_store') }}">
                            </div>
                        </div>
                        @error('inv_store')
                            <p class="help is-danger is-size-6" style="margin-left:112px; text-align: left;padding-top:0px">El saldo de Bodega tiene un formato incorrecto (solo números).</p>
                        @enderror
                        <div class="row">
                            <div class="col-2 borde ">
                                <p>Almacén:</p>
                            </div>
                            <div class="col  min">
                                <input class="input @error('inv_house') is-danger @enderror" type="text" name="inv_house" value="{{ old('inv_house') }}">
                            </div>
                        </div>
                        @error('inv_house')
                            <p class="help is-danger is-size-6" style="margin-left:112px; text-align: left;padding-top:0px">El saldo del Almacén tiene un formato incorrecto (solo números).</p>
                        @enderror
                    </div>
                </div>
                <button type="submit">Registrar</button>
            </div>

        </form>
    </div>
@endsection
