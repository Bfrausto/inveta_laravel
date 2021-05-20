@extends('layouts/login')

@section('content')

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div id="container">
            <div id="loader"></div>
            <img src="{{asset('media/logo.png')}}" style="display:none;" id="img">

            <div id="inputs">
                <div id="usuario" class="@error('name') is-danger @enderror">
                    <input type="text" placeholder="Usuario" name="name" value="{{session('name')}}" >

                </div>
                <div id="pass">
                    <input type="password" placeholder="Contraseña" name="password"  value="{{session('password')}}" >
                </div>
            </div>

            @error('name')
                    <p style="font-size:20px; font-weight:bold; padding-top:0px; color:red">Usuario o contraseña inválidos</p>
                     @enderror
            <div id = "singin">
                <button type="submit" >Acceder</button>
            </div>
        </div>
    </form>
@endsection
