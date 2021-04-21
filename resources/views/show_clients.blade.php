<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/3fd1b9fc4b.js" crossorigin="anonymous"></script>
    
    <title>Mostrar clientes</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        @import url('https://fonts.googleapis.com/css2?family=Antonio:wght@600&display=swap');
        body{
            font-family: 'Antonio', sans-serif;
           
        }
        #cont-principal{
            display: flex;
            flex-direction: column;
            text-align: left;
            margin: 10px 200px;
            background-color: whitesmoke;
            border-radius: 10px  ;
            box-shadow: 5px 5px 5px #aaaaaa;
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
            height:20px;
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
            height:150px;
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
</head>
<body>
    <div id= "cont-principal">
        <div id= "cont-2">
            <p id ="blog">Clientes</p>
            <div id="cont-3">
                @foreach($clients as $client)
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
                        {{-- <div class="icon">
                            <i class="fas fa-edit" style="background-color:orange"></i>
                            <i class="far fa-trash-alt" ></i>
                        </div> --}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>