<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inveta</title>
    <link rel="shortcut icon" href="media/favicon.ico" >
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }
        body{
            font-family: 'Antonio', sans-serif;
        }
        ::-webkit-scrollbar {
            width: 10px;
            background :rgb(234,235,239);
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        #navbar{
            background-color: rgb(234,235,239);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: row;
            position: fixed;
            top: 0;
            width: 100%;

        }
        #navtext{
            height: 70px;
            /* background-color: rgb(234,235,239); */
            display: flex;
            align-items: center;
            flex-direction: row;

        }
        #navtext h1{
            font-size:30px;
            margin:25px;
            color:rgb(65,65,66);
        }

        .nav a{
            font-size:20px;
            color: rgb(156,156,158);
            text-decoration: none;
            padding: 25px 15px;
        }

        .nav a:hover{
            color: black;
            background-color:rgb(187, 187, 189);
        }
        #icons{
            height:100%;
        }
        #icons a{
            margin: 10px;
            font-size:40px;
            text-decoration: none;
            color:rgb(65,65,66);
        }
    </style>
</head>
<body>
    @if (session('mensaje'))
        <p style="font-size:20px; font-weight:bold; padding-top:30px; color:red">{{session('mensaje')}}</p>
    @endif
    <h1>Aplicación Principal</h1>

    <div id="navbar">
        <div id ="navtext">
            <img src="{{asset('media/logo.png')}}" style="height: 50px;">
            <div class="nav"><a href="{{route('clients')}}">Clientes</a></div>
            <div class="nav"><a href="{{route('clients.create')}}">Crear Clientes</a></div>
            <div class="nav"><a href="{{route('products')}}">Productos</a></div>
            <div class="nav"><a href="{{route('products.create')}}">Crear Productos</a></div>

            <!-- <div class="nav"><a href="#home">Experience</a></div> -->
        </div>
        <div class="nav" style="margin-right: 20px "><a class="" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}

        </a></div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</body>
</html>
