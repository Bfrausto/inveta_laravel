@include('layouts/tohome')
<a href="{{url("clients")}}"><h1>Return to ARTICLES</h1></a>
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
                <p>Teléfono: {{$client->tel}}</p>
            @endif
            @if ($client->rfc)
                <p>RFC: {{$client->rfc}}</p>
            @endif
            @if ($client->balance)
                <p>Saldo: $@money($client->balance)</p>
            @endif
        </div>
    </div>
</div>
