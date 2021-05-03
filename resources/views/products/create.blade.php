@extends('layouts/creation')
@section('title')
    <title>Registro de Producto</title>
@endsection
@section('head')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css"> --}}
@endsection
@section('content')
  <div id="contenedor-principal">
    <form action="/verifyproduct" method="post" enctype="multipart/form-data">
        @csrf
      <div id="contenedor-texto">
        <div id="fecha">
          <p id="fecha-sol">Registro de Producto<br></p>
        </div>
        @error('inv_store')
            <div class="alert alert-danger">El saldo de Bodega tiene un formato incorrecto</div>
        @enderror
        @error('inv_house')
            <div class="alert alert-danger">El saldo de Almacén tiene un formato incorrecto</div>
        @enderror
        @error('img')
            <div class="alert alert-danger">La imagen tiene un formato incorrecto</div>
        @enderror
        <div class="boxes">
          <p>Datos del Producto </p>
          <div class="container">
            <div class="row">
              <div class="col-2 borde">
                <p>Nombre:</p>
              </div>
              <div class="col borde2">
                <input type="text" name="name" required  value="{{old('name')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Descripción:</p>
              </div>
              <div class="col borde2">
                <input type="text" name="description" required  value="{{old('description')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Imagen:</p>
              </div>
              <div class="col borde2 salto">
                <input type="file" name="img" required value="{{old('img')}}">
              </div>
            </div>
          </div>
          <p>Cantidades Iniciales </p>
          <div class="container">
            <div class="row">
              <div class="col-2 borde ">
                <p>Bodega:</p>
              </div>
              <div class="col min">
                <input type="text" name="inv_store" required value="{{old('inv_store')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde ">
                <p>Almacén:</p>
              </div>
              <div class="col  min">
                <input type="text" name="inv_house" required value="{{old('inv_house')}}">
              </div>
            </div>
          </div>
        </div>
        <button type="submit" >Registrar</button>
      </div>

    </form>
  </div>
@endsection
