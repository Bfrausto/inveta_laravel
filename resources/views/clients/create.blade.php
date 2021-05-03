@extends('layouts/creation')
@section('title')
    <title>Registro de Cliente</title>
@endsection
@section('head')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css"> --}}
@endsection
@section('content')
<div id="contenedor-principal">
    <form action="/clients" method="post">
        @csrf
      <div id="contenedor-texto">
        <div id="fecha">
          <p id="fecha-sol">Registro de Cliente<br></p>
        </div>
        @error('balance')
            <div class="alert alert-danger">El saldo tiene un formato incorrecto</div>
        @enderror
        @error('tel')
            <div class="alert alert-danger">El teléfono tiene un formato incorrecto</div>
        @enderror
        <div class="boxes">
          <p>Datos del Cliente </p>
          <div class="container">
            <div class="row">
              <div class="col-2 borde">
                <p>Nombre:*</p>
              </div>
              <div class="col borde2">
                <input type="text" name="name" required value="{{old('name')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Empresa:</p>
              </div>
              <div class="col borde2">
                <input type="text" name="enterprise" value="{{old('enterprise')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde ">
                <p>Dirección:</p>
              </div>
              <div class="col borde2">
                <input type="text" name="adress"value="{{old('adress')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Correo:</p>
              </div>
              <div class="col borde2">
                <input type="text" name="email" value="{{old('email')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Teléfono:</p>
              </div>
              <div class="col  min">
                <input type="text" name="tel" value="{{old('tel')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde ">
                <p>RFC:</p>
              </div>
              <div class="col  min">
                <input type="text" name="rfc" value="{{old('rfc')}}">
              </div>
            </div>
            <div class="row ">
              <div class="col-2 borde salto">
                <p>Saldo Inicial:*</p>
              </div>
              <div class="col  min ">
                <input type="text" name="balance" required value="{{old('balance')}}">
              </div>
            </div>
          </div>
          <p style="font-size:13px;">*Datos obligatorios </p>
        </div>
        <button type="submit" >Registrar</button>
      </div>

    </form>
  </div>
  @endsection


