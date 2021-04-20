<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        #contenedor-principal{
            margin: 30px 300px 0px;
            padding: 0px 100px;
            
        }
        #contenedor-texto{
            font-size:17px;
            font-family:Arial, Helvetica, sans-serif;
            display: flex;
            background-color:rgb(221, 220, 220);
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
            background-color:whitesmoke;
            margin-bottom:30px;
            font-weight: 800;
            text-align: center;
            font-size: 34px;
        }
        .container{
            margin-bottom: 20px;
        }
        .container input[type=text]{
            border: none;
            border-radius: 10px  ;
            padding: 10px;
            height:100%;
            width:100%;
        }
        .container p{
            padding-top: 10px;
            height:30px;
            text-align:center;
        }
        .salto p{
            padding:0px;
        }
        .borde{
            border-radius: 10px  ;
            background-color: rgb(199, 196, 196);
        }
        .borde2{
            border-radius: 10px  ;
        }
        button{
            border: 3px rgb(192, 191, 191);
            border-radius: 10px  ;
            font-size:25px;
            
            box-shadow: 5px 5px 5px #aaaaaa;
        }
        button:hover{
            background-color:rgb(184, 183, 183);
        }
        .row{
            margin-bottom:10px;
        }
        .min input[type=text]{
            width: 250px;
        }
    </style>
  
</head>
<body>
  <div id="contenedor-principal">
    <form action="/verifyclient" method="post">
        @csrf
      <div id="contenedor-texto">
        <div id="fecha">
          <p id="fecha-sol">Registro de Cliente<br></p>
        </div>
        @error('balance')
            <div class="alert alert-danger">El saldo tiene un formato incorrecto</div>
        @enderror
        @error('tel')
            <div class="alert alert-danger">El teléfono tiene un formato incorrecto</div>
        @enderror
        <div class="boxes">
          <p>Datos del Cliente </p>
          <div class="container">
            <div class="row">
              <div class="col-2 borde">
                <p>Nombre:*</p>
              </div>
              <div class="col borde2">
                <input type="text" name="name" required value="{{old('name')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Empresa:</p>
              </div>
              <div class="col borde2">
                <input type="text" name="enterprise" value="{{old('enterprise')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde ">
                <p>Dirección:</p>
              </div>
              <div class="col borde2">
                <input type="text" name="adress"value="{{old('adress')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Correo:</p>
              </div>
              <div class="col borde2">
                <input type="text" name="email" value="{{old('email')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Teléfono:</p>
              </div>
              <div class="col  min">
                <input type="text" name="tel" value="{{old('tel')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde ">
                <p>RFC:</p>
              </div>
              <div class="col  min">
                <input type="text" name="rfc" value="{{old('rfc')}}">
              </div>
            </div>
            <div class="row ">
              <div class="col-2 borde salto">
                <p>Saldo Inicial:*</p>
              </div>
              <div class="col  min ">
                <input type="text" name="balance" required value="{{old('balance')}}">
              </div>
            </div>
          </div>
          <p style="font-size:13px;">*Datos obligatorios </p>
        </div>
        <button type="submit" >Registrar</button>
      </div>
      
    </form>
  </div>
</body>
</html>