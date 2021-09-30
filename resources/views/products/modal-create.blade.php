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
<div class="modal fade bd-example-modal-lg" id="modalProduct" tabindex="-1" role="dialog" aria-labelledby="modalProductLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background-color:transparent;border-style: none !important">
      <div class="modal-header" style="border-style: none !important">
        <div id="modal-contenedor-principal">
            <form action="/products" method="post" enctype="multipart/form-data">
                @csrf
                <div id="modal-contenedor-texto">
                    <div id="fecha">
                        <p id="fecha-sol">Registro de Producto<br></p>
                    </div>
                    <div class="boxes">
                        <p>Datos del Producto </p>
                        <div class="modal-container">
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
                        <div class="modal-container">
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

