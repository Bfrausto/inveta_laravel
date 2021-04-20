<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="{{asset('media/favicon.ico')}}" type="image/x-icon" sizes="32x32">
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap');
        body{
            font-family: 'Roboto', sans-serif;
            background-color: rgba(0, 0, 0, 0.842);
        }
        #container{
            display: flex;
            justify-content: center;
            text-align: center;
            flex-direction: column;
            margin:80px  35%;
            border-radius:10px ;
            background-color:whitesmoke;
            
        }
        #container img{
            width: 40%;
            height: 40%;
            margin-top: 20px;
            align-self: center;
        }
        #inputs{
            margin: 40px 0px 20px;
        }
        #inputs input{
            width:300px;
            height:50px;
            border: 2px solid rgb(232,236,237);
            font-size: 16px;
            padding-left:10px;
            border-radius: 4px;
        
        }

        #singin p{
            align-self: center;
            border: 2px solid rgb(232,236,237);
            border-radius: 4px;
        }
        #pass input{
            margin-top:20px;
        }
        button {
            width:310px;
            height:50px;
            background-color: rgb(0,123,255);
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 4px;
            color:white;
            font-weight: bold;
            margin-top: 40px ;
            margin-bottom: 100px
        }

        button:hover {
            background-color: rgb(1, 102, 209);
        }
        #container a{
            text-decoration: none;
            color:rgb(97,177,255);
            margin: 20px;
        }

        .hr-text {
            width: 200px;
            color: black;
            margin:8px;
            border-top: 1px solid rgb(205,208,214);
        }
    </style>
</head>
<body>
    <form action="/verification" method="post">
        @csrf
        <div id="container">
            <img src="{{asset('media/logo.png')}}">
            @if (session('error'))
                <p style="font-size:20px; font-weight:bold; padding-top:30px; color:red">{{session('error')}}</p>
            @endif
            <div id="inputs">
                <div id="usuario">
                    <input type="text" placeholder="Usuario" name="name" value="{{session('name')}}" required> 
                </div>
                <div id="pass">
                    <input type="password" placeholder="Contraseña" name="password"  value="{{session('password')}}" required> 
                </div>
            </div>
            <div id = "singin">
                <button type="submit" >Sign In</button>
            </div>
        </div>
    </form>
</body>
</html>