<div class="modal fade bd-example-modal-lg" id="modalClient" tabindex="-1" role="dialog" aria-labelledby="modalClientLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background-color:transparent;border-style: none !important">
      <div class="modal-header" style="border-style: none !important">
        <div id="modal-contenedor-principal">
            <form action="/clients" method="post">
                @csrf
                <div id="modal-contenedor-texto">
                    <p id="fecha-sol">Registro de Cliente<br></p>
                    <div class="boxes">
                        <p>Datos del Cliente</p>
                        <div class="input-group mb-3">
                            <span class="input-group-text input-group-text122" id="inputGroup-sizing-default">Nombre:*</span>
                            <input type="text " class="form-control  @error('name') is-invalid @enderror"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    Ingresar nombre del cliente.
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text input-group-text122" id="inputGroup-sizing-default">Empresa:</span>
                            <input type="text " class="form-control  @error('enterprise') is-invalid @enderror"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="enterprise" value="{{ old('enterprise') }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text input-group-text122" id="inputGroup-sizing-default">Dirección:</span>
                            <input type="text " class="form-control @error('adress') is-invalid @enderror"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="adress" value="{{ old('adress') }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text input-group-text122" id="inputGroup-sizing-default">Correo:</span>
                            <input type="text " class="form-control  @error('email') is-invalid @enderror"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    El correo tiene un formato incorrecto (usuario@dominio).
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text input-group-text122" id="inputGroup-sizing-default">Teléfono:</span>
                            <input type="text " class="form-control  @error('tel') is-invalid @enderror"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tel" value="{{ old('tel') }}">
                            @error('tel')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    El teléfono tiene un formato incorrecto.
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text input-group-text122" id="inputGroup-sizing-default">RFC:</span>
                            <input type="text " class="form-control @error('rfc') is-invalid @enderror"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="rfc" value="{{ old('rfc') }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text input-group-text122" id="inputGroup-sizing-default">Crédito Inicial:*</span>
                            <input type="text " class="form-control  @error('balance') is-invalid @enderror"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="balance" value="{{ old('balance') }}">
                            @error('balance')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    El crédito tiene un formato incorrecto (solo números).
                                </div>
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
