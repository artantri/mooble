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
    public function index(Request $request)
    {
        //return Staff::all();
        //return view('staff_search')->with('result', Staff::all());   
        $found = Staff::where([
                ['name','like',
                '%'.$request->get('nama').'%'],
                ['contact','like',
                '%'.$request->get('telepon').'%'],
                ['id','like',
                '%'.$request->get('idStaff').'%'],
                ['is_approved','like',
                '%'.$request->get('status').'%'],
                
                ])->get();
            
        return view('staff_search')->with('result', $found);  
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
        // $this->validate($request, [
        //     'email' => 'required|email|max:255|unique:staffs',
        //     'username' => 'required|max:255|unique:staffs',
        //     'password' => 'required|min:6',
        //     'name' => 'required',
        //     'contact' => 'required',
            
        // ]);
        
        // $staff = new Staff;
        // $staff->email = $request->input('email');
        // $staff->username = $request->input('username');
        // $staff->password = bcrypt($request->input('password'));
        // $staff->name = $request->input('name');
        // $staff->contact = $request->input('contact');
        // $staff->save();
        
        // return response($staff, 201);
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
    public function destroy(Request $request)
    {
        $staff = Staff::find($request->get('id'));
        $staff->delete();

        return response('Deleted.', 200);
    }
    
    //filter pake param get di url
    public function filter(Request $request)
    {
        //return view('home');
        $found = Staff::where([
                ['name','like',
                '%'.$request->get('nama').'%'],
                ['contact','like',
                '%'.$request->get('telepon').'%'],
                ['id','like',
                '%'.$request->get('idStaff').'%'],
                ['is_approved','like',
                '%'.$request->get('status').'%'],
                
                ])->get();
            
        return view('staff_search')->with('result', $found);    
        //return $found;
    }

    //change approval status
    public function changeStatus(Request $request)
    {
        $staff = Staff::findOrFail($request->get('id'));
        $staff->is_approved = !$staff->is_approved;
        $staff->save();
        
        return response($staff, 200);
    }

    // public function approve($id)
    // {
    //     $staff = Staff::findOrFail($id);
    //     $staff->is_approved = '1';
    //     $staff->save();
        
    //     return response($staff, 200);
    // }

    // public function disapprove($id)
    // {
    //     $staff = Staff::findOrFail($id);
    //     $staff->is_approved = '0';
    //     $staff->save();
        
    //     return response($staff, 200);
    // }
}
