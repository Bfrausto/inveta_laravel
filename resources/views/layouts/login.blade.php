<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="{{asset('media/favicon.ico')}}" type="image/x-icon" sizes="32x32">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <style>
        *{
            padding: 0;
            margin: 0;
            overflow-y: hidden;
        }
        html{
            overflow-y: hidden;
        }
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap');
        body{
            font-family: 'Roboto', sans-serif;
            height: 800px;
            background-color: rgba(0, 0, 0, 0.842);
        }
        #container{
            display: flex;
            justify-content: center;
            text-align: center;
            flex-direction: column;
            margin:110px  35%;
            border-radius:10px ;
            background-color:whitesmoke;

        }
        #container img{
            display: none;
            text-align: center;
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
            width:300px;
            height:50px;
            background-color: rgb(0,123,255);
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 4px;
            color:white;
            font-weight: bold;
            margin-top: 60px ;
            margin-bottom: 80px
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
        #loader {

            margin-top: 20px;
            align-self: center;
            width: 112px;
            height: 112px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid rgb(9, 50, 94);
            -webkit-animation: spin 0.4s linear infinite;
            animation: spin 0.4s linear infinite;
            }

            @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
            }

            /* Add animation to "page content" */




    </style>
     <script>
        var myVar;

        function myFunction() {
          myVar = setTimeout(showPage, 1);
        }

        function showPage() {
          document.getElementById("loader").style.display = "none";
          document.getElementById("img").style.display = "block";
        }
        </script>
</head>
<body onload="myFunction()" style="margin:0;">
    @yield('content')
</body>
</html>
