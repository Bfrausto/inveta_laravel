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
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div id="pass">
                    <input type="password" placeholder="Contraseña" name="password"  value="{{session('password')}}" >
                </div>
            </div>
            @if (session('error'))
                <p style="font-size:20px; font-weight:bold; padding-top:0px; color:red">{{session('error')}}</p>
            @endif
            <div id = "singin">
                <button type="submit" >Acceder</button>
            </div>
        </div>
    </form>
@endsection
