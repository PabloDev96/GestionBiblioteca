<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    $token = $user->createToken('authToken')->plainTextToken;

    return response()->json([
        'message' => 'Usuario registrado con éxito',
        'token' => $token
    ], 201);
}

    public function login(Request $request)
    {
        // Obtenemos las credenciales del usuario
        $credenciales = $request->only('email', 'password');

        // Intentamos autenticar al usuario
        if (Auth::attempt($credenciales)) {
            // Si las credenciales son correctas, obtenemos el usuario autenticado
            $user = Auth::user();

            // Generamos el token
            $token = $user->createToken('authToken')->plainTextToken;

            // Retornamos la respuesta
            return response()->json(['message' => 'Credenciales correctas', 'token' => $token], 200);
        } else {
            // Si las credenciales son incorrectas, retornamos un error
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }
    }

    public function user(Request $request)
    {

        $user = $request->user();

        if ($user) {
            return response()->json([
                'name' => $user->name,
                'email' => $user->email,
            ]);
        } else {
            return response()->json(['message' => 'Usuario no autenticado'], 401);
        }
    }

    public function logout(Request $request){
    $request->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'Sesión cerrada correctamente'], 200);
}
}
