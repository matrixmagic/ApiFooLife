<?php

namespace App\Http\Controllers;

use App\Http\Utility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class AuthController extends Controller
{

    use RegistersUsers;

     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','IsEmailExists','Unauthorized']]);
    }



    

    public function Unauthorized()
    {
        return   Utility::ToApi("Unauthorized",false, ['error' => 'Unauthorized'],"Unauthorized",401);
        
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
           $user= Auth()->user();
           $user->role_id=(int)$user->role_id;
           $user->token=$token;
            return   Utility::ToApi("Sucessful login",true,$user,"OK",201);
        }
        return   Utility::ToApi("Unauthorized",false, ['error' => 'Unauthorized'],"Unauthorized",401);
        
    }

    public function register(Request $request)
    {
      
        try {


            $validator = Validator::make($request->all(), [
                'role_id' =>['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
             
            if ($validator->fails()) {

                return   Utility::ToApi("Unauthorized",false, ['error' => 'Unauthorized',"validator"=>$validator->messages()->first()],"Unauthorized",401);
               
            }

    

            $user = User::create([
                
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id'=>$request->role_id
            ]);
            $credentials = $request->only('email', 'password');
            $token = $this->guard()->attempt($credentials);
            $user= Auth()->user();
            $user->role_id=(int)$user->role_id;
            $user->token=$token;
            return   Utility::ToApi("Sucessful register",true,$user,"OK",201);
    
        } catch (Throwable $th) {
            return   Utility::ToApi("Unauthorized",false, ['error' => 'Unauthorized'],"Unauthorized",401);
        }
      

     
        
    }

    public function IsEmailExists(Request $request)
    {
      
        try {


            $validator = Validator::make($request->all(), [
               
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
              
            ]);
             
            if ($validator->fails()) {

                return  Utility::ToApi("Email  exists",false,['error' => 'erro',"validator"=>$validator->messages()->first()],"OK",200);
               
            }
            
      
              return  Utility::ToApi("Email not exists",true,"Email not exists","OK",200);
        
          
    
    
        } catch (Throwable $th) {
            return   Utility::ToApi("server error",false, ['error' => $th],"server error",500);
        }
        
    }

    

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
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
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ];
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

    public function CheckToken()
    {

        $user= Auth()->user();
        if(null){
        return   Utility::ToApi("Unauthorized",false, ['error' => 'Unauthorized'],"Unauthorized",401);
        }else{
         $token =  $this->guard()->refresh();
         $user->role_id=(int)$user->role_id;
         $user->token=$token;
          return   Utility::ToApi("Sucessful login",true,$user,"OK",201);
          
        }
    
    }

}
