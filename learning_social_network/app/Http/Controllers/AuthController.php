<?php

namespace App\Http\Controllers;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
//use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\JWT;


class AuthController extends Controller
{
    protected $users;

    /**
     * Create a new AuthController instance.
     *  auth:api
     * @return void
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        //lay biến eamil để check if password
        $email = $request->input('email');

        // ckeck email có tồn tại trong csdl ko
        if(User::where('email', '=', $email)->get()->first()){
            $credentials = request(['email', 'password']);
            if (! $token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return $this->respondWithToken($token);

        }else{
           
            $data = [
                'email' => $request->input('email'),
                'full_name' => $request->input('full_name'),
                'family_name' => $request->input('family_name'),
                'given_name' => $request->input('given_name'),
                'avatar' => $request->input('avatar'),
                'password' => Hash::make($request->input('password')),
            ];
            $this->users->createUser($data);
            //lay email moi dc them vao
            $dt_email = User::where('email',$data['email']) -> first();
            $token = auth()->login($dt_email);
            return response()->json(['access_token' => $token], 200);
        }
    }

    /**
     * Get the list User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listUser(){
        $paggin = 5;
       $data =  $this->users->listUser($paggin);
        return response()->json($data,200);
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
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    /**
     *
     */
    public function payload(){
        $payload = auth()->payload();
        return response()->json(['success' => $payload], 200);
    }
}
