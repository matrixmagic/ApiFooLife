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
        auth()->setDefaultDriver('api');
        $this->middleware('ApiAuth:api', ['except' => ['login','loginByDeviceIdAsGuest','register','IsEmailExists','Unauthorized','IsEmailVerify','verifyRestaurant','changeRestaurantPassword']]);
    
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
            if($user->role_id==2){
                    if($user->isVerfied==0)
                         return   Utility::ToApi("your account is not verified ",false,"your account is not verified","badRequest",410);

            }

            return   Utility::ToApi("Sucessful login",true,$user,"OK",201);
        }
        return   Utility::ToApi("Unauthorized",false, ['error' => 'Unauthorized'],"Unauthorized",401);
        
    }

    public function loginByDeviceIdAsGuest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'deviceId' => ['required', 'string']
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("Unauthorized",false, ['error' => 'Unauthorized',"validator"=>$validator->messages()->first()],"Unauthorized",401);
           
        }

        $user = User::where('deviceId',$request->deviceId)->first();
        if($user == null)
        {
   $num = User::count() + 1;
            $user = User::create([
                
                'email' => 'guest'.$num.'@insperry.com',
                'password' => Hash::make('12345678'),
                'role_id'=>1,
                'deviceId'=>$request->deviceId
            ]);

            $user->Customer()->create(['firstName' => 'guest']);
     
        }

        $credentials = ['email'=>$user->email, 'password' => '12345678'];

        if ($token = $this->guard()->attempt($credentials)) {
           $user= Auth()->user();
           $user->role_id=(int)$user->role_id;
           $user->token=$token;

            return   Utility::ToApi("Sucessful login",true,$user,"OK",201);
        
    }
}

    

    public function register(Request $request)
    {
      
        try {


            $validator = Validator::make($request->all(), [
                'role_id' =>['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phoneNumber'=>['required','string', 'unique:users']
            ]);
             
            if ($validator->fails()) {

                return   Utility::ToApi("Unauthorized",false, ['error' => 'Unauthorized',"validator"=>$validator->messages()->first()],"Unauthorized",401);
               
            }

    

            $user = User::create([
                
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id'=>$request->role_id,
                'phoneNumber'=>$request->phoneNumber
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


    public function IsEmailVerify(Request $request)
    {
      
        try {


            $validator = Validator::make($request->all(), [
               
                'email' => ['required', 'string', 'email', 'max:255'],
              
            ]);
             
            if ($validator->fails()) {

                return  Utility::ToApi("Email  exists",false,['error' => 'erro',"validator"=>$validator->messages()->first()],"OK",200);
               
            }
            
           $user= User::where("email",$request->email)->first();
           if($user==null)
           return  Utility::ToApi("Email not exists",false,"Email not exists","BadRequest",400);

           if($user->role_id==1){
            return  Utility::ToApi("you are not restaurant to verfiy",false,"you are not restaurant to verfiy","BadRequest",411);

           }
           // restaurant

           if($user->isVerfied==0){

            $restaurant=$user->Restaurant()->first();
            if($restaurant==null)
            return   Utility::ToApi("server error",false, "no restaurant found","server error",500);
            
        return  Utility::ToApi("you are not verfied ",true, $restaurant,"OK",412);
       }

           
           else{

            return  Utility::ToApi("you are  verfied",true,"you are  verfied","OK",200);
           }
            
        
          
    
    
        } catch (Throwable $th) {
            return   Utility::ToApi("server error",false, ['error' => $th],"server error",500);
        }
        
    }


    public function verifyRestaurant(Request $request)
    {
      
        try {


            $validator = Validator::make($request->all(), [
               
                'email' => ['required', 'string', 'email', 'max:255'],
                'code' => ['required', 'string', ],
              
            ]);
             
            if ($validator->fails()) {

                return  Utility::ToApi("Email  exists",false,['error' => 'erro',"validator"=>$validator->messages()->first()],"OK",200);
               
            }
            
           $user= User::where("email",$request->email)->first();
           if($user==null)
           return  Utility::ToApi("Email not exists",false,"Email not exists","BadRequest",400);

           if($user->role_id==1){
            return  Utility::ToApi("you are not restaurant to verfiy",false,"you are not restaurant to verfiy","BadRequest",400);

           }
           // restaurant

           if($user->isVerfied==1){

            return  Utility::ToApi("you are already verfied it",false,"you are already verfied it","BadRequest",400);
           }
           else{
                if($user->verifyCode!=$request->code)
                return  Utility::ToApi("you enter bad  code",false,"you enter bad  code","BadRequest",400);
            

                
                
            return  Utility::ToApi("you verfied your restaurant account ",true,"you verfied your restaurant account ","OK",200);
           }
            
        
          
    
    
        } catch (Throwable $th) {
            return   Utility::ToApi("server error",false, ['error' => $th],"server error",500);
        }
        
    }

    public function changeRestaurantPassword(Request $request)
    {
      
        try {


            $validator = Validator::make($request->all(), [
               
                'email' => ['required', 'string', 'email', 'max:255'],
                'code' => ['required', 'string', ],
                'newpassword'=>['required', 'string', 'min:8', 'confirmed']
              
            ]);
             
            if ($validator->fails()) {

                return  Utility::ToApi("Email  exists",false,['error' => 'erro',"validator"=>$validator->messages()->first()],"OK",200);
               
            }
            
            
           $user= User::where("email",$request->email)->first();
           if($user==null)
           return  Utility::ToApi("Email not exists",false,"Email not exists","BadRequest",400);

           if($user->role_id==1){
            return  Utility::ToApi("you are not restaurant to verfiy",false,"you are not restaurant to verfiy","BadRequest",411);

           }

           if($user->verifyCode!=$request->code)
           return  Utility::ToApi("you enter bad  code",false,"you enter bad  code","BadRequest",400);
    
           
           
           // restaurant

           if($user->isVerfied==1){

            return  Utility::ToApi("you are already verfied it",false,"you are already verfied it","BadRequest",400);
           }
           else{
                if($user->verifyCode!=$request->code)
                return  Utility::ToApi("you enter bad  code",false,"you enter bad  code","BadRequest",400);
            
                $user->isVerfied=1;
                $user->password = Hash::make($request->newpassword);
                $user->save();
            return  Utility::ToApi("you verfied your restaurant account ",true,"you verfied your restaurant account ","OK",200);
           }
            
        
          
    
    
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
