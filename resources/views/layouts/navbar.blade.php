<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="icon" href="{!! asset('media/favicon.ico') !!}" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}"> --}}
    <script src="https://kit.fontawesome.com/3fd1b9fc4b.js" crossorigin="anonymous"></script>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: row;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 2;
            height: 60px;
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
            padding: 16px;
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
        #contenedor-principal{
            margin: 75px 15px 15px;
            padding: 30px;
            border-radius: 10px  ;
            box-shadow: 3px 3px 5px 2px #aaaaaa;
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
        .dropdown-item{
            font-size: 16px !important;
        }
        .dropdown-menu{
            padding: 0 !important;
            min-width: 130px !important;
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
        tr{
            background-color: white;
        }
        .navhover{
            color: black !important;
            background-color:rgba(0,0,0,.075);
        }
    </style>
    @yield('style')
</head>
<body>
    @if (session('mensaje'))
        <p style="font-size:20px; font-weight:bold; padding-top:30px; color:red">{{session('mensaje')}}</p>
    @endif
    <div style="top: 0px;width: 100%;position: fixed;z-index: 2;text-align:center; background-color: rgb(234,235,239);">
        <h1 style="font-size: 20px; color: rgb(82, 82, 82); padding: 15px; font-weight: bold;" >@yield('title')</h1>
    </div>
    <div id="navbar">
        <div id ="navtext">
           <a href="{{route('home')}}"><img src="{{asset('media/logo.png')}}" style="height: 40px;"></a>
            <div class="nav">
                <a class="{{Request::url() === route('clients')?'navhover':''}}" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Clientes
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a href="#modalClient" class="dropdown-item " data-toggle="modal" data-target="#modalClient">Nuevo</a>
                    <a class="dropdown-item" href="{{route('clients')}}">Gestionar</a>
                </div>
            </div>
            <div class="nav">
                <a class="{{Request::url() === route('products')?'navhover':''}}" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Productos
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a href="#modalClient" class="dropdown-item" data-toggle="modal" data-target="#modalProduct">Nuevo</a>
                    <a class="dropdown-item" href="{{route('products')}}">Gestionar</a>
                </div>
            </div>
            <div class="nav">
                <a class="{{Request::url() === route('sales')?'navhover':''}}" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Ventas
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a href="#modalSale" class="dropdown-item" data-toggle="modal" data-target="#modalSale">Crear venta</a>
                    <a class="dropdown-item" href="{{route('sales')}}">Gestionar</a>
                </div>
            </div>
            <!-- <div class="nav"><a href="#home">Experience</a></div> -->
        </div>
        <div class="nav" style="margin-right: 20px "><a class="" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Cerrar sesión') }}
        </a></div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    @yield('content')
@include('clients.modal-create')
@include('products.modal-create')
@include('sales.modal-create')
</body>
</html>
<script type="text/javascript">
    @if (count($errors) > 0)
        $('#{{\Session::get('modal')}}').modal('show');
    @endif
</script>
