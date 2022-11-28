<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * @bodyParam email string required The email of the user. Example: test@email.com
     * @bodyParam password string required The password of the user. Example: password
     * @bodyParam password_confirmation string required The password confirmation of the user. Example: password
     * @bodyParam name string required The name of the user. Example: John Doe
     */
    public function register()
    {
        $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = new User([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'message' => 'Successfully created user!',
        ], 201);
    }

    /**
     * @bodyParam email string required The email of the user. Example: test@email.com
     * @bodyParam password string required The password of the user. Example: password
     */
    public function login()
    {
        $this->validate(request(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $token = auth()->user()->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'message' => 'Successfully logged in!',
        ], 200);
    }
}
