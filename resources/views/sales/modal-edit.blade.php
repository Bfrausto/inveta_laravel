

<form method="POST" action="{{$sale->path()}}/delete">
    @csrf
    <button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modal{{$sale->id}}" style="border: none;color: #007bff; "></button>
    <button type="submit" class="fas fa-trash-alt" style="border: none;color: rgb(201, 13, 13);"></button>
</form>
<div class="modal fade bd-example-modal-lg" id="modal{{$sale->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$sale->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color:transparent;border-style: none !important">
            <div class="modal-header" style="border-style: none !important">
                <div id="modal-contenedor-principal">
                    <form action="/sales/{{$sale->id}}/edit" method="post">
                        @csrf
                        @method('PATCH')
                        <div id="modal-contenedor-texto">
                            <div id="fecha">
                                <p id="fecha-sol">Registro de Venta<br></p>
                            </div>
                            <div class="boxes">
                                <p>Datos del Producto </p>
                                <div class="modal-container">
                                    <div class="row">
                                        <div class="col-2 borde salto">
                                            <p>Cliente:</p>
                                        </div>
                                        <div class="col borde2">
                                            <div class="dropdown show">
                                                <select name="client_id" class="custom-select " id="inputGroupSelect01" style="@error('client_id')border:0.5px solid red; @enderror">
                                                    <option selected
                                                            value="{{$sale->client_id}}">
                                                            {{App\models\Sale::getClient($sale->client_id)}}
                                                    </option>
                                                    @foreach ($dataSales['clients'] as $client)
                                                        <option  value="{{$client->id}}">
                                                            {{$client->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 borde salto">
                                            <p>Producto:</p>
                                        </div>
                                        <div class="col borde2">
                                            <div class="dropdown show">
                                                <select name="product_id" class="custom-select " id="inputGroupSelect01 "style="@error('product_id')border:0.5px solid red; @enderror">
                                                    <option selected
                                                            value="{{$sale->product_id}}">
                                                            {{App\models\Sale::getProduct($sale->product_id)}}
                                                    </option>
                                                    @foreach ($dataSales['products'] as $product)
                                                        <option  value="{{$product->id}}">
                                                            {{$product->name}} - {{$product->description}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 borde ">
                                            <p>Precio:</p>
                                        </div>
                                        <div class="col min">
                                            <input class="input @error('price') is-danger @enderror" type="text" name="price" value="{{ $sale->price }}" >
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
                                <p style="font-size:13px;padding-bottom:10px">*Datos obligatorios </p>
                            </div>
                            <button type="submit" class="modal-button">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    @if (count($errors) > 0)
        $('#{{\Session::get('modal')}}').modal('show');
    @endif
</script>

