<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use DB;

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
   // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

public function credentials(Request $request)
{
  $remember_me = $request->has('remember') ? true : false;


    if(is_numeric($request->get('email')) || auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me))
            {
                  
              return ['phone'=>$request->get('email'),'password'=>$request->get('password'),'verified' => 1];

    
            }
            return $request->only($this->username(), 'password','verified');


      //  $user = auth()->user();

//Auth::login($user,true);

    

         }


         

    /*return [
        'email' => $request->email,
        'password' => $request->password,
        'verified' => 1,
    ];*/


    
}
