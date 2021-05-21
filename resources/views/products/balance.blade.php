@extends('layouts/creation')
@section('title')
    <title>Registro de Producto</title>
@endsection
@section('head')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css"> --}}
@endsection
@section('content')
    <div id="contenedor-principal">
        <form action="/products/{{$product->id}}/inventario" method="post">
            @csrf
            @method('PATCH')
            <div id="contenedor-texto">
                <div id="fecha">
                    <p id="fecha-sol" style="font-weight:normal">Actualizar inventario de <strong>{{$product->name}}</strong></p>
                </div>
                <div class="boxes">
                    <p>Cantidades Actuales </p>
                    <div class="container">
                        <div class="row">
                            <div class="col-2 borde ">
                                <p>Bodega:</p>
                            </div>
                            <div class="col min">
                                <input class="input @error('inv_store') is-danger @enderror" type="text" name="inv_store" value="{{ $product->inv_store }}">
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
                                <input class="input @error('inv_house') is-danger @enderror" type="text" name="inv_house" value="{{ $product->inv_house }}">
                            </div>
                        </div>
                        @error('inv_house')
                            <p class="help is-danger is-size-6" style="margin-left:112px; text-align: left;padding-top:0px">El saldo del Almacén tiene un formato incorrecto (solo números).</p>
                        @enderror
                    </div>
                </div>
                <button type="submit">Actualizar</button>
            </div>

        </form>
    </div>
@endsection
