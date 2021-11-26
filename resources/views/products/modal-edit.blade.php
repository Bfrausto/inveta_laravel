<form method="POST" action="{{$product->path()}}/delete">
    @csrf
    <button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modal{{$product->id}}" style="border: none;color: #007bff; "></button>
    <button id="delete" type="submit" class="fas fa-trash-alt" style="border: none;color: rgb(201, 13, 13);" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?');"></button>
</form>
<div class="modal fade bd-example-modal-lg" id="modal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$product->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color:transparent;border-style: none !important">
            <div class="modal-header" style="border-style: none !important">
                <div id="modal-contenedor-principal">
                    <form action="/products/{{$product->id}}/edit/modal{{$product->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div id="modal-contenedor-texto">
                            <p id="fecha-sol">Actualizar Producto<br></p>
                            <div class="boxes">
                                <p>Datos del Producto:</p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text input-group-text122" id="inputGroup-sizing-default">Nombre:</span>
                                    <input type="text " class="form-control  @error('name') is-invalid @enderror"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" value="{{$product->name }}" placeholder="Negro">
                                    @error('name')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Ingresar nombre del producto.
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text input-group-text122" id="inputGroup-sizing-default">Tipo:</span>
                                    <input type="text " class="form-control  @error('description') is-invalid @enderror"   name="description" value="{{ $product->description }}" placeholder="Hass">
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
                                @if($errors->has('price_small/'.$product->id)||$errors->has('inv_store_small/'.$product->id)||$errors->has('inv_house_small/'.$product->id)||$errors->has('price_medium/'.$product->id)||$errors->has('inv_store_medium/'.$product->id)||$errors->has('inv_house_medium/'.$product->id)||$errors->has('price_big/'.$product->id)||$errors->has('inv_store_big/'.$product->id)||$errors->has('inv_house_house/'.$product->id))
                                    <div id="validationServerUsernameFeedback " class="invalid-feedback " style="display:  block !important;" style="margin:0px">
                                        Sólo números.
                                    </div>
                                @endif
                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" style="margin-top:8px">
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="small-{{$product->id}}" autocomplete="off" name="small-{{$product->id}}" @if($product->small) checked @endif >
                                        <label class="btn btn-outline-primary space" for="small-{{$product->id}}">Chico</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check " id="medium-{{$product->id}}" autocomplete="off" name="medium-{{$product->id}}" @if($product->medium) checked @endif >
                                        <label class="btn btn-outline-primary space" for="medium-{{$product->id}}">Mediano</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="big-{{$product->id}}" autocomplete="off" name="big-{{$product->id}}" @if( $product->big ) checked @endif >
                                        <label class="btn btn-outline-primary space" for="big-{{$product->id}}">Grande</label>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <div class="col  " id="show_small-{{$product->id}}">
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text input-group-text72" id="inputGroup-sizing-sm">Precio $</span>
                                            <input type="text" class="form-control  @error('price_small/'.$product->id) is-invalid @enderror" name="price_small-{{$product->id}}" placeholder="50"
                                            value="@if( $product->small ){{ $product->small->price }}@else{{ old('price_small-'.$product->id) }}@endif" >
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-text72" >Bodega</span>
                                            </div>
                                            <input type="text" class="form-control @error('inv_store_small/'.$product->id) is-invalid @enderror" name="inv_store_small-{{$product->id}}" placeholder="150"
                                             value="@if( $product->small ){{ $product->small->inv_store}}@else{{ old('inv_store_small-'.$product->id) }}@endif" >
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Almacén</span>
                                            </div>
                                            <input type="text" class="form-control @error('inv_house_small/'.$product->id) is-invalid @enderror"  name="inv_house_small-{{$product->id}}" placeholder="150"
                                            value="@if( $product->small ){{ $product->small->inv_house}}@else{{ old('inv_house_small-'.$product->id) }}@endif" >
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" id="show_medium-{{$product->id}}">
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text input-group-text72" id="inputGroup-sizing-sm">Precio $</span>
                                            <input type="text" class="form-control @error('price_medium/'.$product->id) is-invalid @enderror"  name="price_medium-{{$product->id}}" placeholder="50"
                                            value="@if( $product->medium ){{ $product->medium->price}}@else{{ old('price_medium-'.$product->id) }}@endif" >
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-text72">Bodega</span>
                                            </div>
                                            <input type="text" class="form-control @error('inv_store_medium/'.$product->id) is-invalid @enderror"  name="inv_store_medium-{{$product->id}}" placeholder="150"
                                            value="@if( $product->medium ){{ $product->medium->inv_store}}@else{{ old('inv_store_medium-'.$product->id) }}@endif" >

                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Almacén</span>
                                            </div>
                                            <input type="text" class="form-control @error('inv_house_medium/'.$product->id) is-invalid @enderror"  name="inv_house_medium-{{$product->id}}" placeholder="150"
                                            value="@if( $product->medium ){{ $product->medium->inv_house}}@else{{ old('inv_house_medium-'.$product->id) }}@endif" >
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" id="show_big-{{$product->id}}">
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text input-group-text72" id="inputGroup-sizing-sm">Precio $</span>
                                            <input type="text" class="form-control @error('price_big/'.$product->id) is-invalid @enderror"  name="price_big-{{$product->id}}" placeholder="50"
                                            value="@if( $product->big ){{ $product->big->price}}@else{{ old('price_big-'.$product->id) }}@endif" >
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-text72">Bodega</span>
                                            </div>
                                            <input type="text" class="form-control  @error('inv_store_big/'.$product->id) is-invalid @enderror"    name="inv_store_big-{{$product->id}}" placeholder="150"
                                            value="@if( $product->big ){{ $product->big->inv_store}}@else{{ old('inv_store_big-'.$product->id) }}@endif" >

                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Almacén</span>
                                            </div>
                                            <input type="text" class="form-control  @error('inv_house_big/'.$product->id) is-invalid @enderror"   name="inv_house_big-{{$product->id}}" placeholder="150"
                                            value="@if( $product->big ){{ $product->big->inv_house}}@else{{ old('inv_house_big-'.$product->id) }}@endif" >
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="modal-button">Actualizar</button>
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

        show(document.querySelector('#small-{{$product->id}}'),"small-{{$product->id}}");
        show(document.querySelector('#medium-{{$product->id}}'),"medium-{{$product->id}}");
        show(document.querySelector('#big-{{$product->id}}'),"big-{{$product->id}}");


    $("#small-{{$product->id}}").change(function() {
        show(this,"small-{{$product->id}}");
    });
    $("#medium-{{$product->id}}").change(function() {
        show(this,"medium-{{$product->id}}");
    });
    $("#big-{{$product->id}}").change(function() {
        show(this,"big-{{$product->id}}");
    });
    $('form').submit(function() {
        let sizes=['small-{{$product->id}}','medium-{{$product->id}}','big-{{$product->id}}']
        let elements=[`price_`,`inv_store_`,`inv_house_`]
        sizes.forEach(size=>elements.forEach(element=>clear(document.getElementsByName(element+size)[0],size)));
    });

</script>
@stop
