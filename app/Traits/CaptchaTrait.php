<?php namespace App\Traits;

//use Input;
use Illuminate\Support\Facades\Request;
use ReCaptcha\ReCaptcha;

trait CaptchaTrait {

    public function captchaCheck()
    {

        $response = Request::get('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = '6Lcp4xEUAAAAAJeXgSE7-lGRxuJ6VNKp9Wld8cVE';
        //$secret   = env('RE_CAP_SECRET');

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return 1;
        } else {
            return 0;
        }


        // $url = 'https://www.google.com/recaptcha/api/siteverify';
        // $secret = '6Lcp4xEUAAAAAJeXgSE7-lGRxuJ6VNKp9Wld8cVE';
        // $response = file_get_contents($url. '?secret=' .$secret. '&response=' .$_POST['g-recaptcha-response']. '&remoteip=' .$_SERVER['REMOTE_ADDR']);
        // $data = json_decode($response);

        // if ($data->success == true) {
        //     return 1;
        // } else {
        //     return 0;
        // }


    }

}