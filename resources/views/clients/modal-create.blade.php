<div class="modal fade bd-example-modal-lg" id="modalClient" tabindex="-1" role="dialog" aria-labelledby="modalClientLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background-color:transparent;border-style: none !important">
      <div class="modal-header" style="border-style: none !important">
        <div id="modal-contenedor-principal">
            <form action="/clients" method="post">
                @csrf
                <div id="modal-contenedor-texto">
                    <div id="fecha">
                        <p id="fecha-sol">Registro de Cliente<br></p>
                    </div>
                    <div class="boxes">
                        <p style="padding-bottom:10px">Datos del Cliente </p>
                        <div class="modal-container" >
                            <div class="row">
                                <div class="col-2 borde">
                                    <p>Nombre:*</p>
                                </div>
                                <div class="col borde2">
                                    <input class="input @error('name') is-danger @enderror" type="text" name="name" required value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 borde">
                                    <p>Empresa:</p>
                                </div>
                                <div class="col borde2">
                                    <input class="input @error('enterprise') is-danger @enderror" type="text" name="enterprise" value="{{ old('enterprise') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 borde ">
                                    <p>Dirección:</p>
                                </div>
                                <div class="col borde2">
                                    <input class="input @error('adress') is-danger @enderror" type="text" name="adress" value="{{ old('adress') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 borde">
                                    <p>Correo:</p>
                                </div>
                                <div class="col borde2">
                                    <input class="input @error('email') is-danger @enderror" type="text" name="email" value="{{ old('email') }}">
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
                                    <input class="input @error('tel') is-danger @enderror" type="text" name="tel" value="{{ old('tel') }}">
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
                                        value="{{ old('rfc') }}">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-2 borde salto">
                                    <p>Crédito Inicial:*</p>
                                </div>
                                <div class="col  min">
                                    <input class="input @error('balance') is-danger @enderror" type="text" name="balance"
                                        required value="{{ old('balance') }}">
                                </div>
                            </div>
                            @error('balance')
                                <p class="help is-danger is-size-6" style="margin-left:112px;text-align: left;padding-top:0px">El crédito tiene un formato incorrecto (solo números).</p>
                            @enderror
                        </div>
                        <p style="font-size:13px;padding-bottom:10px">*Datos obligatorios </p>
                    </div>
                    <button type="submit" class="modal-button">Registrar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
