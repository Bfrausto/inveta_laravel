@include('layouts/tohome')
<div id="contenedor-principal " style="margin-left: 200px;">
    <h1 style="padding-top: 10px;padding-bottom: 10px">Inventario</h1>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre del cliente</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Bodega</th>
            <th scope="col">Almacén</th>
            </tr>
        </thead>
        <tbody>
            <tr >
            <th scope="row">{{$sale->id}}</th>
            <td>{{$sale->name}}</td>
            <td>{{$sale->description}}</td>
            <td>{{$sale->inv_store}} kg </td>
            <td>{{$sale->inv_house}} kg</td>
            </tr>
        </tbody>
    </table>
    <img src="{{$sale->img}}" alt="" style="height: 200px;margin-bottom: px">

</div>
<div  style="margin-left: 200px;margin-top:10px">
    <a style="margin-right: 40px;" href="{{$sale->path()}}/edit" class="rounded-full border borde-gray-300 py-2 px-4 text-black text-sm mr-2">Editar Producto</a>

    <a href="{{$sale->path()}}/inventario" class="rounded-full border borde-gray-300 py-2 px-4 text-black text-sm mr-2">Modificar Inventario</a>

</div>
