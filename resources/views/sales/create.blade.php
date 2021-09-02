@extends('layouts/creation')
@section('title')
    <title>Registro de Producto</title>
@endsection
@section('head')

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css"> --}}
@endsection
@section('content')
    <div id="contenedor-principal">
        <form action="/sales" method="post">
            @csrf
            <div id="contenedor-texto">
                <div id="fecha">
                    <p id="fecha-sol">Registro de Venta<br></p>
                </div>
                <div class="boxes">
                    <p>Datos del Producto </p>
                    <div class="container">
                        <div class="row">
                            <div class="col-2 borde salto">
                                <p>Cliente:</p>
                            </div>
                            <div class="col borde2">
                                <div class="dropdown show">
                                    <select name="client_id" class="custom-select " id="inputGroupSelect01" style="@error('client_id')border:0.5px solid red; @enderror">
                                        <option selected
                                            @if (old('client_id') and old('client_id')!='Selecciona un cliente')
                                                value="{{old('client_id')}}">
                                                {{App\models\Sale::getClient(old('client_id'))}}
                                            @else
                                               >Selecciona un cliente
                                            @endif
                                        </option>
                                        @foreach ($data['clients'] as $client)
                                            <option  value="{{$client->id}}">
                                                {{$client->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @error('client_id')
                            <p class="help is-danger is-size-6" style="margin-left:112px; text-align: left;padding-top:0px">Por favor seleccione un cliente.</p>
                        @enderror
                        <div class="row">
                            <div class="col-2 borde salto">
                                <p>Producto:</p>
                            </div>
                            <div class="col borde2">
                                <div class="dropdown show">
                                    <select name="product_id" class="custom-select " id="inputGroupSelect01 "style="@error('product_id')border:0.5px solid red; @enderror">
                                        <option selected
                                            @if (old('product_id') and old('product_id')!='Selecciona un producto')
                                                value="{{old('product_id')}}">
                                                {{App\models\Sale::getProduct(old('product_id'))}}
                                            @else
                                                >Selecciona un producto
                                            @endif
                                        </option>
                                        @foreach ($data['products'] as $product)
                                            <option  value="{{$product->id}}">
                                                {{$product->name}} - {{$product->description}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @error('product_id')
                            <p class="help is-danger is-size-6" style="margin-left:112px; text-align: left;padding-top:0px">Por favor seleccione un producto. </p>
                        @enderror
                        <div class="row">
                            <div class="col-2 borde ">
                                <p>Precio:</p>
                            </div>
                            <div class="col min">
                                <input class="input @error('price') is-danger @enderror" type="text" name="price" value="{{ old('price') }}" >
                            </div>
                        </div>
                        @error('price')
                            <p class="help is-danger is-size-6" style="margin-left:112px; text-align: left;padding-top:0px">La cantidad tiene un formato incorrecto (solo números).</p>
                        @enderror
                        <div class="row">
                            <div class="col-2 borde salto ">
                                <p>Cantidad: (Kg)</p>
                            </div>
                            <div class="col min">
                                <input class="input @error('kg') is-danger @enderror" type="text" name="kg" value="{{ old('kg') }}" >
                            </div>
                            <div class="col salto "  style="padding-top:5px;@error('inv')border-radius:5px;border:0.5px solid red; @enderror">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"
                                            type="radio"
                                            name="inv"
                                            value="store"
                                            @if( old('inv') =='store')
                                                checked
                                            @endif
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Bodega</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input"
                                            type="radio"
                                            name="inv"
                                            value="house"
                                            @if( old('inv') =='house')
                                                checked
                                            @endif>
                                    <label class="form-check-label" for="inlineRadio2">Almacén</label>
                                  </div>
                            </div>
                        </div>
                        @error('kg')
                            <p class="help is-danger is-size-6" style="margin-left:112px; text-align: left;padding-top:0px">La cantidad de kg tiene un formato incorrecto (solo números).</p>
                        @enderror
                        @error('inv')
                            <p class="help is-danger is-size-6" style="margin-left:112px; text-align: left;padding-top:0px">Seleccione de donde salió la mercancía</p>
                         @enderror

                    </div>
                </div>
                <button type="submit">Registrar</button>
            </div>

        </form>
    </div>

@endsection
