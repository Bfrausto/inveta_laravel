<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Producto </title>
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
    <form action="/verifyproduct" method="post" enctype="multipart/form-data">
        @csrf
      <div id="contenedor-texto">
        <div id="fecha">
          <p id="fecha-sol">Registro de Producto<br></p>
        </div>
        @error('inv_store')
            <div class="alert alert-danger">El saldo de Bodega tiene un formato incorrecto</div>
        @enderror
        @error('inv_house')
            <div class="alert alert-danger">El saldo de Almacén tiene un formato incorrecto</div>
        @enderror
        @error('img')
            <div class="alert alert-danger">La imagen tiene un formato incorrecto</div>
        @enderror
        <div class="boxes">
          <p>Datos del Producto </p>
          <div class="container">
            <div class="row">
              <div class="col-2 borde">
                <p>Nombre:</p>
              </div>
              <div class="col borde2">
                <input type="text" name="name" required  value="{{old('name')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Descripción:</p>
              </div>
              <div class="col borde2">
                <input type="text" name="description" required  value="{{old('description')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde">
                <p>Imagen:</p>
              </div>
              <div class="col borde2 salto">
                <input type="file" name="img" required value="{{old('img')}}">
              </div>
            </div>
          </div>
          <p>Cantidades Iniciales </p>
          <div class="container">
            <div class="row">
              <div class="col-2 borde ">
                <p>Bodega:</p>
              </div>
              <div class="col min">
                <input type="text" name="inv_store" required value="{{old('inv_store')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-2 borde ">
                <p>Almacén:</p>
              </div>
              <div class="col  min">
                <input type="text" name="inv_house" required value="{{old('inv_house')}}">
              </div>
            </div>
          </div>
        </div>
        <button type="submit" >Registrar</button>
      </div>
      
    </form>
  </div>
</body>
</html>
