<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //show the current user
    public function show(Request $request)
    {
        return $request->user();
    }

    //show edit profile form
    public function edit(Request $request)
    {
        //
    }

    //updates current user profile
    public function update(Request $request)
    {
    	$this->validate($request, [
            'email' => 'required|email|max:255|unique:staffs',
            'username' => 'required|max:255|unique:staffs',
            'password' => 'required|min:6',
            'name' => 'required',
            'contact' => 'required',
            
        ]);

        $user = $request->user();
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->name = $request->input('name');
        $user->contact = $request->input('contact');
        $user->save();
	    
	    return response($user, 200);
    }
}
