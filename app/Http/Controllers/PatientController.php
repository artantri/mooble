<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
        * Display a listing of the resource.
        * @return Response
        */
        public function index()
        {
            return Patient::all();
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
                'NIK' => 'required|unique:patients|max:255',
                'email' => 'required|email|max:255|unique:patients',
                'username' => 'required|max:255|unique:patients',
                'password' => 'required|min:6',
                'name' => 'required',
                'phone_number' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'blood_type' => 'required',
                'birth_date' => 'required',
                'weight' => 'required',
                'height' => 'required',
                'job' => 'required',
                'job_description' => 'required',
            ]);
            
            $patient = new Patient;
            $patient->NIK = $request->input('NIK');
            $patient->email = $request->input('email');
            $patient->username = $request->input('username');
            $patient->salt = $request->input('salt');
            $patient->password = bcrypt($request->input('password'));
            $patient->name = $request->input('name');
            $patient->phone_number = $request->input('phone_number');
            $patient->address = $request->input('address');
            $patient->gender = $request->input('gender');
            $patient->blood_type = $request->input('blood_type');
            $patient->birth_date = $request->input('birth_date');
            $patient->weight = $request->input('weight');
            $patient->height = $request->input('height');
            $patient->job = $request->input('job');
            $patient->job_description = $request->input('job_description');
            $patient->save();
            
            return response($patient, 201);
        }
    
        /**
        * Display the specified resource.
        * @param  int  $id
        * @return Response
        */
        public function show($id)
        {
            return Patient::findOrFail($id);
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
                'NIK' => 'required|unique:patients|max:255',
                'email' => 'required|email|max:255|unique:patients',
                'username' => 'required|max:255|unique:patients',
                'password' => 'required|min:6',
                'name' => 'required',
                'phone_number' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'blood_type' => 'required',
                'birth_date' => 'required',
                'weight' => 'required',
                'height' => 'required',
                'job' => 'required',
                'job_description' => 'required',
            ]);
            
            $patient = Patient::findOrFail($id);
            $patient->NIK = $request->input('NIK');
            $patient->email = $request->input('email');
            $patient->username = $request->input('username');
            $patient->password = bcrypt($request->input('password'));
            $patient->name = $request->input('name');
            $patient->phone_number = $request->input('phone_number');
            $patient->address = $request->input('address');
            $patient->gender = $request->input('gender');
            $patient->blood_type = $request->input('blood_type');
            $patient->birth_date = $request->input('birth_date');
            $patient->weight = $request->input('weight');
            $patient->height = $request->input('height');
            $patient->job = $request->input('job');
            $patient->job_description = $request->input('job_description');
            $patient->save();
            
            return response($patient, 200);
        }
    
        /**
        * Remove the specified resource from storage.
        * @param  int  $id
        * @return Response
        */
        public function destroy($id)
        {
            $patient = Patient::find($id);
            $patient->delete();

            return response('Deleted.', 200);
        }
        
        //filter pake param get di url
        public function filter(Request $request)
        {
            // $found = Diagnosis::where('diagnose_result','like',
                // '%'.$request->get('diagnose_result').'%')
                // ->get();
            
            $found = Patient::where([
                ['name','like',
                '%'.$request->get('name').'%'],
                ['address','like',
                '%'.$request->get('address').'%']
                ])->get();
            
            
            return $found;
    }
}
