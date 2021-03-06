@extends('layouts/navbar')
@section('title', 'Ver cliente')
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
#blog{
    font-size:40px;
    margin:10px  120px;
    color:rgb(71, 76, 76);
    font-weight:bold;

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
</style>
@stop
@section('content')
<div id= "contenedor-principal">
<div id= "cont-2">
    <div id="cont-3">
        <div class="cont">
            <div class="up">
                <p>{{$client->name}}</p>
            </div>
            <div class="down">
                <div class="text">
                    @if ($client->enterprise)
                        <p>Empresa: {{$client->enterprise}}</p>
                    @endif
                    @if ($client->adress)
                        <p>Direccion: {{$client->adress}}</p>
                    @endif
                    @if ($client->email)
                        <p>Email: {{$client->email}}</p>
                    @endif
                    @if ($client->tel)
                        <p>Tel??fono: {{$client->tel}}</p>
                    @endif
                    @if ($client->rfc)
                        <p>RFC: {{$client->rfc}}</p>
                    @endif
                    @if ($client->balance)
                        <p>Cr??dito: $@money($client->balance)</p>
                    @endif
                </div>
                {{-- <div class="icon">
                    <i class="fas fa-edit" style="background-color:orange"></i>
                    <i class="far fa-trash-alt" ></i>
                </div> --}}
                <div  style="margin-top:150px;padding-left:15px">
                    <a style="margin-right: 40px;" href="{{$client->path()}}/edit" class="rounded-full border borde-gray-300 py-2 px-4 text-black text-sm mr-2">Editar Cliente</a>
                    <a href="{{$client->path()}}/saldo" class="rounded-full border borde-gray-300 py-2 px-4 text-black text-sm mr-2">Modificar Cr??dito</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop
