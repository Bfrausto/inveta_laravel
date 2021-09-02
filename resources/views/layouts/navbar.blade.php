<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inveta</title>
    <link rel="shortcut icon" href="media/favicon.ico" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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

           <a href="{{route('home')}}"><img src="{{asset('media/logo.png')}}" style="height: 50px;"></a>
            <div class="nav">
                <a class="" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Clientes
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('clients.create')}}">Nuevo</a>
                    <a class="dropdown-item" href="{{route('clients')}}">Gestionar</a>
                </div>
            </div>
            <div class="nav">
                <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Productos
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('products.create')}}">Nuevo</a>
                    <a class="dropdown-item" href="{{route('products')}}">Gestionar</a>
                </div>
            </div>
            <div class="nav">
                <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Ventas
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('sales.create')}}">Crear venta</a>
                    <a class="dropdown-item" href="{{route('sales')}}">Gestionar</a>
                </div>
            </div>
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
