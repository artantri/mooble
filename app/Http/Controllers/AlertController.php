<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Alert;

class AlertController extends Controller
{
    //
    public function index()
    {
        return Alert::all();
    }
}
