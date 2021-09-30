<!DOCTYPE html>
<head>
  <title>Inventario </title>
  <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
  <script src="https://kit.fontawesome.com/3fd1b9fc4b.js" crossorigin="anonymous"></script>

  <style>
    * {
        margin: 0px;
        padding: 0px;

    }

    #contenedor-principal{
        margin: 60px 35px 0px;
        padding: 0px 100px 30px;
        border-radius: 10px  ;
        box-shadow: 5px 5px 5px #aaaaaa;
        background-color: whitesmoke;
    }


#modal-contenedor-principal{
    margin:0 auto;
    color: #495057;
    font-weight: bold;
}
#modal-contenedor-texto{
    width: 630px;
    font-size:17px;
    font-family:Arial, Helvetica, sans-serif;
    display: flex;
    background-color:white;
    justify-content: space-between;
    flex-direction: column;
    padding: 0px 30px 30px;
    box-shadow: 5px 5px 5px #aaaaaa;
    border-radius: 10px  ;
}
#fecha{
    margin-top:10px;
    height:100%;
    width:100%;
}
#fecha-sol{
    padding:15px;
    border-radius: 10px  ;
    background-color:#e9ecef;
    margin-bottom:30px;
    font-weight: 700;
    text-align: center;
    font-size: 34px;
}
.modal-container{
    margin-bottom: 20px;
    margin-left: 15px;
}
.modal-container input[type=text]{
    border-radius: 10px  ;
    padding: 10px;
    height:100%;
    width:100%;
}
.modal-container input[type=text]:focus-visible{
    border-radius: 10px !important;
}
.modal-container input[type=text]:focus{
    border-color: #3273dc;
    border-radius: 10px !important;

    box-shadow: 0 0 0 0.125em rgb(50 115 220 / 25%);
}
.modal-container p{
    padding-top: 10px;
    height:30px;
    text-align:center;
}
.salto p{
    padding:0px;
}
.borde{
    border-radius: 10px  ;
    background-color: #e9ecef ;
}
.borde2{
    border-radius: 10px  ;
    border-style: none !important ;
}
.modal-button{
    border: 3px #e9ecef;
    border-radius: 10px  !important;
    font-size:25px !important;
    background-color: #E9ECEE;
    box-shadow: 5px 5px 5px #aaaaaa;
}
button:hover{
    background-color:#b4c3ce;
    color: white;
}
.row{
    margin-bottom:10px;
}
.min input[type=text]{
    width: 250px;
}
.is-danger{
    color:red;
}
</style>
</head>
<body>
    @include('layouts/navbar')
    <div id="contenedor-principal">

        <h1 style="padding-top: 10px;padding-bottom: 10px">Clientes</h1>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Empresa</th>
                {{-- <th scope="col">Dirección</th> --}}
                <th scope="col">Email</th>
                <th scope="col">Telefóno</th>
                <th scope="col">RFC</th>
                <th scope="col">Saldo</th>
                <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                <th scope="row">{{$client->id}}</th>
                <td><a href="{{$client->path()}}"><p>{{$client->name}}</p></a></td>
                <td>@if ($client->enterprise){{$client->enterprise}} @endif</td>
                {{-- <td>@if ($client->adress){{$client->adress}}@endif</td> --}}
                <td>@if ($client->email){{$client->email}}@endif</td>
                <td>@if ($client->tel){{$client->tel}}@endif</td>
                <td>@if ($client->rfc){{$client->rfc}}@endif</td>
                <td> $@money($client->balance)</td>
                <td>

                    @include("clients.modal-edit")

                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
