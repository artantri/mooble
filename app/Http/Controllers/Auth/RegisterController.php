<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

//buat method regsiter
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

//use captchatrait
use App\Traits\CaptchaTrait;


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

    //use trait
    use CaptchaTrait;


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('register_dokter');
    }

    //override biar gak langsung login habis regis
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath())->with('success', 'success');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

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
    protected function validator(array $data)
    {
        $data['captcha'] = $this->captchaCheck();
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:doctors',
            'username' => 'required|max:255|unique:doctors',
            'password' => 'required|min:6',

            // 'g-recaptcha-response' => 'required',
            // 'captcha'               => 'required|min:1'
        ],
        [
            'email.unique' => 'Email ini telah digunakan.',
            'email.email' => 'Email tidak valid.',
            'username.unique' => 'Username ini telah digunakan.',
            'password.min' => 'Password harus lebih dari 6 karakter.',
            // 'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            // 'g-recaptcha-response.required' => 'Captcha belum diisi',
            // 'captcha.min'           => 'Wrong captcha, please try again.'

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
            'email' => $data['email'],
            'contact' => $data['contact'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
