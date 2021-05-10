<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use lluminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
{
    $page_title = 'Page Login';
    $page_description = 'Description for the page';
    
    $action = __FUNCTION__;
    return view('auth.login',compact('page_title', 'page_description','action'));
}



public function login(Request $request)
{

   
    $this->validateLogin($request);

    if ($this->hasTooManyLoginAttempts($request)) {
        $this->fireLockoutEvent($request);

        return $this->sendLockoutResponse($request);
    }


    $credentials = $request->only('email', 'password');

        if (Auth::guard()->attempt($credentials)) {
           $user= Auth()->user();
           $user->role_id=(int)$user->role_id;
           
            if($user->role_id==1){
                return Redirect::back()->withErrors([ 'you aren\'t  Resturant account ']);
            }
            elseif(($user->role_id==2 ||$user->role_id==3 )&& $user->isVerfied==1){
                return redirect()->route('index');
               
            }else{

               // return redirect('/verify')->withErrors([ 'verify account please']);
                return redirect()->route('verify');

            }

            }else{

                $this->incrementLoginAttempts($request);
                return $this->sendFailedLoginResponse($request);

       
       
                 }
   
   }
}
