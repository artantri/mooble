<?php

namespace App\Http\Controllers\StaffAuth;
use Illuminate\Http\Request;

use Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//use captchatrait
use App\Traits\CaptchaTrait;
use App\Staff;

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
        //return view('staff.auth.login');
        return view('login_staff');
    }

    //override guard for staff
    protected function guard()
    {
        return Auth::guard('staff');
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

    //bikin method baru buat send response kalo blm diapprove
    protected function sendNotApprovedResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => "belum di approve",
            ]);
    }

    /*

    //override buat cek approval staff
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            //tambah buat ngecek approve disini kalo credential match
            if (!$this->guard()->user()->is_approved){
                return $this->sendNotApprovedResponse($request);
            }
            else {
                return $this->sendLoginResponse($request);
            }
            
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    */

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        //cek user sm pass bener gak
        //if($this->checkCredentials($request)){
            //cek approved gak
            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }else{
                return $this->sendNotApprovedResponse($request);
            }
        //}

        

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    //override nambah cek approved
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt([
            $this->credentials($request)/*,'is_approved'=>'1'*/], $request->has('remember')
        );
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
            // 'g-recaptcha-response' => 'required',
            // 'captcha'               => 'required|min:1'
        ],
        [
            // 'g-recaptcha-response.required' => 'Captcha belum diisi',
            // 'captcha.min'           => 'Wrong captcha, please try again.'

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
    protected $redirectTo = '/staff_home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    //tes
    protected function checkCredentials(Request $request)
    {
        // $found= Staff::where([
        //     ['username','=', $request->get('username')],
        //     ['password','=', $request->get('password')],
        //     ])->get();
        $found = Staff::where([
            ['username','=',
            $request->get('username')],
            ['password','=',
            $request->get('password')],
            // ['address','like',
            // '%'.$request->get('address').'%']
            ])->get();


        if($found){
            return 1;
        }else{
            return 0;
        }
    }
}
