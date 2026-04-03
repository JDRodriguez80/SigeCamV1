<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //registrar usuario y generar token

    public function register(Request $request)
    {
       $request->validate([
           'name'=>'required|string|max:255',
           'email'=>'required|string|email|max:255|unique:users',
           'password'=>'required|string|min:8|confirmed'
       ]);
       $user =User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>Hash::make($request->password)
       ]);

       //generando el token

        $token= $user->createToken('SIGE')->plainTextToken;
        return response()->json(['token'=>$token],201);
    }

    //iniciar sesion
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
            //generando el token de acceso
            $token=$user->createToken('SIGE')->plainTextToken;
            return response()->json(['token'=>$token]);
        }
        return response()->json(['message' => 'Unauthorized'], 401); // ✅ corregido 'menssage' y el array
    }

    //cerrando la session y revocando el token

    public function logout(Request $request)
    {
        $request->user()->tokens->each(function ($token)
        {
            $token->delete();
        });
        return response()->json(['message'=>'Logged out successfully']);
    }



}
