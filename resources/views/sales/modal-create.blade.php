<style>
    #modal-contenedor-principal{
        margin:0 auto;
        color: #495057;
        font-weight: bold;
    }
    #modal-contenedor-texto{
        width: 630px;
        font-size:17px;
        font-family:Arial, Helvetica, sans-serif;
        display: flex;
        background-color:white;
        justify-content: space-between;
        flex-direction: column;
        padding: 0px 30px 30px;
        box-shadow: 5px 5px 5px #aaaaaa;
        border-radius: 10px  ;
    }
    #fecha{
        margin-top:10px;
        height:100%;
        width:100%;
    }
    #fecha-sol{
        padding:15px;
        border-radius: 10px  ;
        background-color:#e9ecef;
        margin-bottom:30px;
        font-weight: 700;
        text-align: center;
        font-size: 34px;
    }
    .modal-container{
        margin-bottom: 20px;
    }
    .modal-container input[type=text]{
        border-radius: 10px  ;
        padding: 10px;
        height:100%;
        width:100%;
    }
    .modal-container input[type=text]:focus-visible{
        border-radius: 10px !important;
    }
    .modal-container input[type=text]:focus{
        border-color: #3273dc;
        border-radius: 10px !important;

        box-shadow: 0 0 0 0.125em rgb(50 115 220 / 25%);
    }
    .modal-container p{
        padding-top: 10px;
        height:30px;
        text-align:center;
    }
    .salto p{
        padding:0px;
    }
    .borde{
        border-radius: 10px  ;
        background-color: #e9ecef ;
    }
    .borde2{
        border-radius: 10px  ;
        border-style: none !important ;
    }
    .modal-button{
        border: 3px #e9ecef;
        border-radius: 10px  !important;
        font-size:25px !important;
        background-color: #E9ECEE;
        box-shadow: 5px 5px 5px #aaaaaa;
    }
    button:hover{
        background-color:#b4c3ce;
        color: white;
    }
    .row{
        margin-bottom:10px;
    }
    .min input[type=text]{
        width: 250px;
    }
    .is-danger{
        color:red;
    }
    </style>
<div class="modal fade bd-example-modal-lg" id="modalSale" tabindex="-1" role="dialog" aria-labelledby="modalSaleLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background-color:transparent;border-style: none !important">
      <div class="modal-header" style="border-style: none !important">
        <div id="modal-contenedor-principal">
            <form action="/sales" method="post">
                @csrf
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
                                                @if (old('client_id') and old('client_id')!='Selecciona un cliente')
                                                    value="{{old('client_id')}}">
                                                    {{App\models\Sale::getClient(old('client_id'))}}
                                                @else
                                                   >Selecciona un cliente
                                                @endif
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
                                            @foreach ($dataSales['products'] as $product)
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
                    <button type="submit" class="modal-button">Registrar</button>
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

