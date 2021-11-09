

<form method="POST" action="{{$client->path()}}/delete">
    @csrf
    <button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modal{{$client->id}}" style="border: none;color: #007bff; "></button>
    <button id="delete" type="submit" class="fas fa-trash-alt" style="border: none;color: rgb(201, 13, 13);" onclick="return confirm('¿Estás seguro de que quieres eliminar este cliente?');"></button>
</form>
<div class="modal fade bd-example-modal-lg" id="modal{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$client->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color:transparent;border-style: none !important">
            <div class="modal-header" style="border-style: none !important">
                <div id="modal-contenedor-principal">
                    <form action="/clients/{{$client->id}}/edit/modal{{$client->id}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div id="modal-contenedor-texto">
                            <div id="fecha">
                                <p id="fecha-sol">Actualizar Cliente<br></p>
                            </div>
                            <div class="boxes">
                                <p style="padding-bottom:10px">Datos del Cliente </p>
                                <div class="modal-container" >
                                    <div class="row">
                                        <div class="col-2 borde">
                                            <p>Nombre:*</p>
                                        </div>
                                        <div class="col borde2">
                                            <input class="input @error('name') is-danger @enderror" type="text" name="name" required value="{{ $client->name}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 borde">
                                            <p>Empresa:</p>
                                        </div>
                                        <div class="col borde2">
                                            <input class="input @error('enterprise') is-danger @enderror" type="text" name="enterprise" value="{{ $client->enterprise}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 borde ">
                                            <p>Dirección:</p>
                                        </div>
                                        <div class="col borde2">
                                            <input class="input @error('adress') is-danger @enderror" type="text" name="adress" value="{{ $client->adress }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 borde">
                                            <p>Correo:</p>
                                        </div>
                                        <div class="col borde2">
                                            <input class="input @error('email') is-danger @enderror" type="text" name="email" value="{{ $client->email }}">
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
                                            <input class="input @error('tel') is-danger @enderror" type="text" name="tel" value="{{$client->tel}}">
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
                                                value="{{ $client->rfc }}">
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-2 borde ">
                                            <p>Crédito:*</p>
                                        </div>
                                        <div class="col  min">
                                            <input class="input @error('balance') is-danger @enderror" type="text" name="balance"
                                                required value="{{$client->balance}}">
                                        </div>
                                    </div>
                                    @error('balance')
                                        <p class="help is-danger is-size-6" style="margin-left:112px;text-align: left;padding-top:0px">El crédito tiene un formato incorrecto (solo números).</p>
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

