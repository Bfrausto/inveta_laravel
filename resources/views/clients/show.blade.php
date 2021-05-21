@include('layouts/tohome')
<div class="cont" style="margin-left:10%; margin-top:5%">
    <div class="up">
        <p>Nombre: {{$client->name}}</p>
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
                <p>Teléfono: {{$client->tel}}</p>
            @endif
            @if ($client->rfc)
                <p>RFC: {{$client->rfc}}</p>
            @endif
            @if ($client->balance)
                <p>Saldo: $@money($client->balance)</p>
            @endif
        </div>
        <div  style="margin-top:10px">
            <a style="margin-right: 40px;" href="{{$client->path()}}/edit" class="rounded-full border borde-gray-300 py-2 px-4 text-black text-sm mr-2">Editar Cliente</a>
            <a href="{{$client->path()}}/saldo" class="rounded-full border borde-gray-300 py-2 px-4 text-black text-sm mr-2">Modificar Saldo</a>

        </div>
    </div>
</div>
