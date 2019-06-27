<?php

namespace App\Http\Controllers\Auth;
use DB;
use Mail;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   /* protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
        'name' => $data['name'],
        'phone'=>$data['phone'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'email_token' => str_random(10),
        'usertype'=>'vendor'
        ]);
    }


    public function register(Request $request)
{
    // Laravel validation
    $validator = Validator::make($request->all(),[
           'name' => 'required',
            'phone'=> 'required|max:11|min:10|unique:vendor_registration',
            'email' => 'required|email|unique:vendor_registration',
            'password' => 'required|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'password_confirmation'=>'same:password',
            'terms'=> 'required']); 

  if($validator->fails()){
        return  back()->withErrors($validator)->withInput($request->all());
    }
    else {


           /* if ($validator->fails()) 
            {
                $this->throwValidationException($request, $validator);
            }*/

            DB::beginTransaction();
            try
            {
                $user = $this->create($request->all());
            $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name]));
                Mail::to($user->email)->send($email);
                DB::commit();
                 return view('email.verify');
                //return back();

            }
             catch(Exception $e)
            {
                DB::rollback(); 
                return back();
            }
        }
}
public function verify($token)
{ 
     User::where('email_token',$token)->firstOrFail()->verified();
    return redirect('/login');

  //  $verifyUser = User::where('token', $token)->first();

    
       // return redirect('/login')
}

}
