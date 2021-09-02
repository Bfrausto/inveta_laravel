<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function search(request $request){

        $users=User::all();
        foreach($users as $user){
            if( $user->name == $request->name && $user->password == $request->password){
                return view('home');
            }
        }
        return back()->with('error','Usuario o contraseña inválidos');

    }
}
