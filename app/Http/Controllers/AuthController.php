<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(UserStoreRequest $request)
    {
        $attributes = $request->validated();

        $user = User::create($attributes);

        return (new UserResource($user))
            ->additional([
                'message' => 'User created successfully.',
                'status' => 'success'
            ])->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        $attributes = $request->validate([
            'email'     => 'email|required',
            'password'  => 'string|required',
        ]);

        if (!Auth::attempt($attributes)) {

            return response()->json([
                'message' => 'Email or Password is not valid.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();


        $token = $user->createToken('authToken')->plainTextToken;
        
        return response()->json([
            'message' => "Signed in successfully",
            'access_token' => $token,
            'user' => new UserResource($user),
        ]);
    }

    public function logout()
    {
        $user = Auth::user();

        $user->currentAccesstoken()->delete();

        return response([
            'message' => "Logout successfully",
            'success' => true
        ]);
    }
}
