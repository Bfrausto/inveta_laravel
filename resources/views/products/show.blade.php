<div id="contenedor-principal">
    <h1 style="padding-top: 10px;padding-bottom: 10px">Inventario</h1>
    <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Bodega</th>
            <th scope="col">Almacén</th>
            </tr>
        </thead>
        <tbody>
            <tr >
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->inv_store}} kg </td>
            <td>{{$product->inv_house}} kg</td>
            </tr>
        </tbody>
    </table>
</div>
