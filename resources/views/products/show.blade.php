@extends('layouts/navbar')
@section('title', 'Ver producto')
@section('style')
<style>
*{
    padding: 0;
    margin: 0;
}
@import url('https://fonts.googleapis.com/css2?family=Antonio:wght@600&display=swap');
body{
    font-family: 'Antonio', sans-serif;

}
#cont-2{
    padding-top:10px;
    display: flex;
    flex-direction: column;
    width:100%;
}
#cont-3{
    padding:0px 40px;
    display: flex;
    flex-direction: row;
    text-align: center;
    justify-content:space-evenly;
    flex-wrap: wrap;
}
.cont{
    font-size:20px;
    width: 400px;
    margin: 20px 10px;
    display: flex;
    flex-direction: column;
    background-color:white;
    box-shadow: 5px 5px 5px #aaaaaa;
    border-radius: 10px  ;
}
.up{
    display: flex;
    height:60px;
    background-color:gray;
    padding:20px 20px;

}
.up p{
    color:white;
    font-size:20px;
    font-weight:bold;
}
.down{
    display: flex;
    height:300px;
    text-align:justify;
    flex-direction: column;

}
.down p{

    font-size:15px;
    color: gray;
    font-weight:bold;
}
.text{
    margin:20px 20px 0px 20px;
}
.icon{
    margin:0px 6px 00px 0px;
    align-self: flex-end;
}
.icon i {
    color:white;
    font-size:10px;
    padding:7px;
    background-color:red;
    border-radius:40px;
    justify-content:space-between;
}
.text{
    height:80px;
}
td {
  text-align: center;
}

.table td {
  text-align: center;
}

</style>
@stop
@section('content')
<div id= "contenedor-principal">
<div id= "cont-2">
    <div id="cont-3">
        <div class="cont">
            <div class="up">
                <p>{{$product->name}}</p>
            </div>
            <div class="down">
                <div class="text">
                    @if ($product->description)
                        <p>Descripcion: {{$product->description}}</p>
                    @endif
                    @if ($product->inv_store)
                        <p>Bodega: {{$product->inv_store}} kg</p>
                    @endif
                    @if ($product->inv_house)
                        <p>Almacén: {{$product->inv_house}} kg</p>
                    @endif
                    <img src="{{$product->img}}" alt="" style="height: 200px;height: 100px;">
                </div>
                {{-- <div class="icon">
                    <i class="fas fa-edit" style="background-color:orange"></i>
                    <i class="far fa-trash-alt" ></i>
                </div> --}}
                <div  style="margin-top:150px;padding-left:15px">
                    <a style="margin-right: 40px;" href="{{$product->path()}}/edit" class="rounded-full border borde-gray-300 py-2 px-4 text-black text-sm mr-2">Editar</a>
                    <a href="{{$product->path()}}/inventario" class="rounded-full border borde-gray-300 py-2 px-4 text-black text-sm mr-2">Modificar Inventario</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop
