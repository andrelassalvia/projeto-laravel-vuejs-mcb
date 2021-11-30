<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        // dd($request->all());
        // autenticacao por email e senha -> metodo auth(verificar no config o tipo de autenticacao)
        $credenciais = $request->all(['email', 'password']);
        // retornar um JWT (Json Web Token)
        $token = auth('api')->attempt($credenciais); // realiza uma tentativa de autenticacao e retorna token caso sucesso
        // dd($token);
        if($token){
            return response()->json(['token' => $token], 200);
        }else{
            return response()->json(['erro' => 'Usuário ou senha inválido!'], 403);

        }
        
        return 'login';
    }

    public function logout(){
        return 'logout';
    }

    public function refresh(){
        return 'refresh';
    }
    public function me(){
        return 'me';
    }
}
