<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home');
        //$result = Patient::all();
        return view('pasien_search')->with('results', Patient::all());
        
    }

    public function filter()
    {
        //return view('home');
        $found = Patient::where([
                ['name','like',
                '%'.$request->get('name').'%'],
                ['contact','like',
                '%'.$request->get('contact').'%']
                ['NIK','like',
                '%'.$request->get('NIK').'%']
                ['gender','like',
                '%'.$request->get('gender').'%']
                ['blood_type','like',
                '%'.$request->get('blood_type').'%']
                ])->get();
            
            
        return $found;
    }
}
