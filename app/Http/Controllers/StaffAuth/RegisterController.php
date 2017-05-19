<?php

namespace App\Http\Controllers\StaffAuth;

use Auth;

use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

//use captchatrait
use App\Traits\CaptchaTrait;


// class RegisterController extends Controller
// {
//     /*
//     |--------------------------------------------------------------------------
//     | Register Controller
//     |--------------------------------------------------------------------------
//     |
//     | This controller handles the registration of new users as well as their
//     | validation and creation. By default this controller uses a trait to
//     | provide this functionality without requiring any additional code.
//     |
//     */

//     use RegistersUsers;

//     //use trait
//     use CaptchaTrait;

//     //override guard for staff
//     protected function guard()
//     {
//         return Auth::guard('staff');
//     }
    
//     /**
//      * Show the application registration form.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function showRegistrationForm()
//     {
//         // return view('register');
//         return view('staff.auth.register');
//     }

//     /**
//      * Where to redirect users after registration.
//      *
//      * @var string
//      */
//     protected $redirectTo = '/staff_login';

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('guest');
//     }

//     /**
//      * Get a validator for an incoming registration request.
//      *
//      * @param  array  $data
//      * @return \Illuminate\Contracts\Validation\Validator
//      */
//     protected function validator(array $data)
//     {
//         $data['captcha'] = $this->captchaCheck();
//         return Validator::make($data, [
//             'name' => 'required|max:255',
//             'email' => 'required|email|max:255|unique:staffs',
//             'username' => 'required|max:255|unique:staffs',
//             'password' => 'required|min:6|confirmed',

//             'g-recaptcha-response' => 'required',
//             'captcha'               => 'required|min:1'
//         ],
//         [
//             'email.unique' => 'Email ini telah digunakan.',
//             'email.email' => 'Email tidak valid.',
//             'username.unique' => 'Username ini telah digunakan.',
//             'password.min' => 'Password harus lebih dari 6 karakter.',
//             'password.confirmed' => 'Konfirmasi password tidak sesuai.',
//             'g-recaptcha-response.required' => 'Captcha belum diisi',
//             'captcha.min'           => 'Wrong captcha, please try again.'

//         ]);
//     }

//     /**
//      * Create a new user instance after a valid registration.
//      *
//      * @param  array  $data
//      * @return User
//      */
//     protected function create(array $data)
//     {
//         return User::create([
//             'name' => $data['name'],
//             'email' => $data['email'],
//             'contact' => $data['contact'],
//             'username' => $data['username'],
//             'password' => bcrypt($data['password']),
//         ]);
//     }
// }

class RegisterController extends Controller
{

    protected $redirectPath = '/staff_login';

    //shows registration form to staff
    public function showRegistrationForm()
    {
        // return view('staff.auth.register');
        return view('register_staff');
    }

  //Handles registration request for staff
    public function register(Request $request)
    {

       //Validates data
        $this->validator($request->all())->validate();

       //Create staff
        $staff = $this->create($request->all());

        //Authenticates staff
        //$this->guard()->login($staff);

       //Redirects staffs
        return redirect($this->redirectPath)->with('success', 'success');
    }

    //Validates user's Input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:staffs',
            'username' => 'required|max:255|unique:staffs',
            //'password' => 'required|min:6|confirmed',
            'password' => 'required|min:6',

            // 'g-recaptcha-response' => 'required',
            // 'captcha'               => 'required|min:1'
        ],
        [
            'email.unique' => 'Email ini telah digunakan.',
            'email.email' => 'Email tidak valid.',
            'username.unique' => 'Username ini telah digunakan.',
            'password.min' => 'Password harus lebih dari 6 karakter.',
            //'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            // 'g-recaptcha-response.required' => 'Captcha belum diisi',
            // 'captcha.min'           => 'Wrong captcha, please try again.'

        ]); 
    }

    //Create a new staff instance after a validation.
    protected function create(array $data)
    {
        return Staff::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'contact' => $data['contact'],
            'username' => $data['username'],
            'is_approved' => '0',
            'password' => bcrypt($data['password']),
        ]);
    }

    //Get the guard to authenticate Staff
   protected function guard()
   {
       return Auth::guard('staff');
   }

}