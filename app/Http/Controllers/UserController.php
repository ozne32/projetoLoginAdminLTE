<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function criar(Request $request){
        $email = $request->email ?? null;
        if(User::where('email', $email)){
            return redirect('/')->with('status', 'contaExiste');
        }else{
            $usuario = new User;
            $usuario->name= $request->nome;
            $usuario->password= $request->password;
            $usuario->email = $request->email;
            $usuario->save();
            $_SESSION['status'] = 'verificado';
            return view('home');
        }
    }
    public function verificar(Request $request, Response $response){
        // pegar o id para dar o findOrfail
        $email = $request->email ?? null;
        $senha = $request->password ?? null;
        $dadosUsuario = [
            'email'=>$email,
            'password'=>$senha
        ];
        if(Auth::attempt($dadosUsuario)){
            $id = Auth::id();
            $_SESSION['status'] = 'verificado';
            return view('home');
        }else{
            return redirect('/')->with('status', 'erro');
        }
    }
}