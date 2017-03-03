<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//use captchatrait
use App\Traits\CaptchaTrait;

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

    //use trait
    use CaptchaTrait;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('login');
    }

    //override error message
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => "Username atau Password salah",
            ]);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $request['captcha'] = $this->captchaCheck();
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required',
            'g-recaptcha-response' => 'required',
            'captcha'               => 'required|min:1'
        ],
        [
            'g-recaptcha-response.required' => 'Captcha belum diisi',
            'captcha.min'           => 'Wrong captcha, please try again.'

        ]);
    }


    //define field used for auth
    public function username()
    {
        return 'username';
    }

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest', ['except' => 'logout']);
    }
}
