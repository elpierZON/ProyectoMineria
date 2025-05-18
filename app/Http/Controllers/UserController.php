<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //login
    public function login(Request $request)
    {
        // Validacion
        $request->validate([
            'dni' => 'required',
            'password' => 'required',
        ]);

        if (auth('web')->attempt([
            'dni' => $request->dni,
            'password' => $request->password,
        ])) {
            return response()->json(['message' => 'Login successful'], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);

    }

    //logout
    public function logout(Request $request)
    {
        auth('web')->logout();
        return response()->json(['message' => 'Logout successful'], 200);
    }
}
