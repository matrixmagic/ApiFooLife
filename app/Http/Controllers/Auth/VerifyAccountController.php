<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;

class VerifyAccountController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        //$this->middleware('auth');
        //$this->middleware('signed')->only('verify');
        //$this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function  showVerifyForm()
    {
        $page_title = 'Page Login';
    $page_description = 'Description for the page';
    
    $action = __FUNCTION__;
    return view('auth.verify',compact('page_title', 'page_description','action'));
    }


    public function  verifyAccount(Request $request)
    {
        $page_title = 'Page Login';
    $page_description = 'Description for the page';
    
    $action = __FUNCTION__;


           $user= Auth()->user();
           if($user==null){
            return redirect('/login');

           }
           if($user->role_id==1){
            return Redirect::back()->withErrors([ 'you aren\'t  Resturant account ']);
           }
            
           if( $user->isVerfied==1){
            return  redirect('/');
           }
           $validator = Validator::make($request->all(), [
            'code'=>['required'],
            'password' => ['required', 'min:8', 'confirmed'],
           
        ]);
         
        
        if ($validator->fails()) {

            return Redirect::back()->withErrors([$validator->messages()->first()]);
        }

           $user->role_id=(int)$user->role_id;
           if($user->verifyCode==$request->code){
            $user->isVerfied=1;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('/');

           }
           return Redirect::back()->withErrors([ 'your code is invalid']);
    }

    
   
}
