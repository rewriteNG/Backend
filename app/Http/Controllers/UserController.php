<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Moduls\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['name', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request)
    {
        $valid = $this->registerValidate($request->all());
        if ($valid !== null) {
            return response()->json($valid, 400);
        }
        // Log::debug('input', [$check]);
    }

    /**
     * validates input for registration, when error it returns an array, else null
     * @param array $request
     * @return null|array
     */
    protected function registerValidate(array $request)
    {
        $validator = Validator::make($request, [
            'name' => 'required|min:4',
            'email' => 'required|email:rfc',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return ['message' => $validator->getMessageBag()];
        }
        if (DB::table('users')->where('name', $request['name'])->first() !== null) {
            return ['message' => ['name' => ['name already exists']]];
        }
        if ($check['email'] = DB::table('users')->where('email', $request['email'])->first() !== null) {
            return ['message' => ['email' => ['email already exists']]];
        }
        return null;
    }
}
