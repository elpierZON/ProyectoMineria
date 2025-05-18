<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'name' => 'required|string|max:255',
          'dni' => 'required|string|min:8|unique:users',
          'email' => 'required|string|email|unique:users', // Agregamos la validación del email
          'password' => 'required|string|min:8|confirmed',
          'lastname' => 'required|string|max:255', // Agregamos la validación del apellido
      ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'dni' => $request->dni, // Guarda el DNI
            'email' => $request->email, // Guarda el email
            'password' => Hash::make($request->password),
            'lastname' => $request->lastname, // Guarda el apellido
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201); // Código 201 para "Created"
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dni' => 'required|string|min:8',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('dni', $request->dni)->first(); // Busca por DNI

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales inválidas'], 401); // Código 401 para "Unauthorized"
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Sesión cerrada']);
    }
}




