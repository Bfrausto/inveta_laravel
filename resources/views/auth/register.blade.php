@extends('layouts/login')

@section('content')

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div id="container">
            <div id="loader"></div>
            <img src="{{asset('media/logo.png')}}" style="display:none;" id="img">

            <div id="inputs">
                <div id="usuario">
                    <input  placeholder="Nombre" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div id="pass">
                    <input placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div id="pass">
                    <input placeholder="Ingresa de nuevo tu contraseña"id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div id = "singin">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
        </div>
    </form>
@endsection
