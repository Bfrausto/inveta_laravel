<div class="modal fade bd-example-modal-lg" id="modalProduct" tabindex="-1" role="dialog" aria-labelledby="modalProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color:transparent;border-style: none !important">
            <div class="modal-header" style="border-style: none !important">
                <div id="modal-contenedor-principal">
                    <form action="/products" method="post" enctype="multipart/form-data"  id="register">
                        @csrf
                        <div id="modal-contenedor-texto">
                            <p id="fecha-sol">Registro de Producto<br></p>
                            <div class="boxes">
                                <p>Datos del Producto:</p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text input-group-text122" id="inputGroup-sizing-default">Nombre:</span>
                                    <input type="text " class="form-control  @error('name') is-invalid @enderror"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" value="{{ old('name') }}" placeholder="Negro">
                                    @error('name')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Ingresar nombre del producto.
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text input-group-text122" id="inputGroup-sizing-default">Tipo:</span>
                                    <input type="text " class="form-control  @error('description') is-invalid @enderror"   name="description" value="{{ old('description') }}" placeholder="Hass">
                                    @error('description')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Ingresar el tipo del producto.
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="img" class="form-label">Imagen:</label>
                                    <input class="form-control @error('img') is-invalid  @enderror" type="file" id="img" name="img" value="{{ old('img') }}">
                                </div>
                                @error('img')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback"  style="display:  block !important;" >
                                        {{$message}}
                                    </div>
                                @enderror --}}
                            </div>
                            <div class="row is-invalid ">
                                <p style="margin:0px">Seleccione los tamaños del producto:</p>
                                @if($errors->has('price_small')||$errors->has('inv_store_small')||$errors->has('inv_house_small')||$errors->has('price_medium')||$errors->has('inv_store_medium')||$errors->has('inv_house_medium')||$errors->has('price_big')||$errors->has('inv_store_big')||$errors->has('inv_house_house'))
                                    <div id="validationServerUsernameFeedback " class="invalid-feedback " style="display:  block !important;" style="margin:0px">
                                        Sólo números.
                                    </div>
                                @endif
                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" style="margin-top:8px">
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="small" autocomplete="off" name="small" checked >
                                        <label class="btn btn-outline-primary space" for="small">Chico</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check " id="medium" autocomplete="off" name="medium" @if( old('medium') ) checked @endif >
                                        <label class="btn btn-outline-primary space" for="medium">Mediano</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="big" autocomplete="off" name="big" @if( old('big') ) checked @endif >
                                        <label class="btn btn-outline-primary space" for="big">Grande</label>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <div class="col  " id="show_small">
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text input-group-text72" id="inputGroup-sizing-sm">Precio $</span>
                                            <input type="text" class="form-control  @error('price_small') is-invalid @enderror" name="price_small" placeholder="50"  value="{{ old('price_small') }}" >
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-text72" >Bodega</span>
                                            </div>
                                            <input type="text" class="form-control @error('inv_store_small') is-invalid @enderror" name="inv_store_small" placeholder="150"  value="{{ old('inv_store_small') }}" >
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Almacén</span>
                                            </div>
                                            <input type="text" class="form-control @error('inv_house_small') is-invalid @enderror"  name="inv_house_small" placeholder="150"  value="{{ old('inv_house_small') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col size " id="show_medium">
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text input-group-text72" id="inputGroup-sizing-sm">Precio $</span>
                                            <input type="text" class="form-control @error('price_medium') is-invalid @enderror"  name="price_medium" placeholder="50"  value="{{ old('price_medium') }}">
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-text72">Bodega</span>
                                            </div>
                                            <input type="text" class="form-control @error('inv_store_medium') is-invalid @enderror"  name="inv_store_medium" placeholder="150"  value="{{ old('inv_store_medium') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Almacén</span>
                                            </div>
                                            <input type="text" class="form-control @error('inv_house_medium') is-invalid @enderror"  name="inv_house_medium" placeholder="150"  value="{{ old('inv_house_medium') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col size " id="show_big">
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text input-group-text72" id="inputGroup-sizing-sm">Precio $</span>
                                            <input type="text" class="form-control @error('price_big') is-invalid @enderror"  name="price_big" placeholder="50"  value="{{ old('price_big') }}">
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-text72">Bodega</span>
                                            </div>
                                            <input type="text" class="form-control  @error('inv_store_big') is-invalid @enderror"    name="inv_store_big" placeholder="150"  value="{{ old('inv_store_big') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Almacén</span>
                                            </div>
                                            <input type="text" class="form-control  @error('inv_house_big') is-invalid @enderror"   name="inv_house_big" placeholder="150"  value="{{ old('inv_house_big') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                    </div>
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

@section('scripts')
@parent
<script>

    $('document').ready(function(){
        @if ($errors->any())
            @if($errors->has('price_small')||$errors->has('inv_store_small')||$errors->has('inv_house_small')|| old('small'))
                document.getElementById("small").checked = true
            @else
                document.getElementById("small").checked = false
            @endif
        @endif
        show(document.querySelector('#small'),"small");
        show(document.querySelector('#medium'),"medium");
        show(document.querySelector('#big'),"big");

    });
    function clear(element,size) {
        if(!document.querySelector(`#${size}`).checked){
            element.value = "";
        }
    }
    function show(element,size){
        if(element.checked) {
            document.getElementById(`show_${size}`).style.visibility  = 'visible'
        }else{
            document.getElementById(`show_${size}`).style.visibility = 'hidden'
        }
    }
    $("#small").change(function() {
        show(this,"small");
    });
    $("#medium").change(function() {
        show(this,"medium");
    });
    $("#big").change(function() {
        show(this,"big");
    });
    $('form').submit(function() {
        let sizes=['small','medium','big']
        let elements=[`price_`,`inv_store_`,`inv_house_`]
        sizes.forEach(size=>elements.forEach(element=>clear(document.getElementsByName(element+size)[0],size)));
    });

</script>
@stop
