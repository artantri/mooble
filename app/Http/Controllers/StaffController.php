<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Staff::all();
    }
    
    /**
    * Show the form for creating a new resource.
    * @return Response
    */
    public function create()
    {
    }
    
    /**
    * Store a newly created resource in storage.
    * @return Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:staffs',
            'username' => 'required|max:255|unique:staffs',
            'password' => 'required|min:6',
            'name' => 'required',
            'contact' => 'required',
            
        ]);
        
        $staff = new Staff;
        $staff->email = $request->input('email');
        $staff->username = $request->input('username');
        $staff->password = bcrypt($request->input('password'));
        $staff->name = $request->input('name');
        $staff->contact = $request->input('contact');
        $staff->save();
        
        return response($staff, 201);
    }

    /**
    * Display the specified resource.
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
        return Staff::findOrFail($id);
    }

    /**
    * Show the form for editing the specified resource.
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:staffs',
            'username' => 'required|max:255|unique:staffs',
            'password' => 'required|min:6',
            'name' => 'required',
            'contact' => 'required',
            
        ]);
        
        $staff = Staff::findOrFail($id);
        $staff->email = $request->input('email');
        $staff->username = $request->input('username');
        $staff->password = bcrypt($request->input('password'));
        $staff->name = $request->input('name');
        $staff->contact = $request->input('contact');
        $staff->save();
        
        return response($staff, 200);
    }

    /**
    * Remove the specified resource from storage.
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();

        return response('Deleted.', 200);
    }
    
    //filter pake param get di url
    public function filter(Request $request)
    {
        // $found = Diagnosis::where('diagnose_result','like',
            // '%'.$request->get('diagnose_result').'%')
            // ->get();
        
        $found = Staff::where([
            ['name','like',
            '%'.$request->get('name').'%'],
            // ['address','like',
            // '%'.$request->get('address').'%']
            ])->get();
        
        
        return $found;
    }
}
