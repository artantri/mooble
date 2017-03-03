<?php

namespace App\Http\Controllers;

use App\Diagnosis;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    /**
        * Display a listing of the resource.
        * @return Response
        */
        public function index()
        {
            return Diagnosis::all();
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
            $diagnosis = new Diagnosis;
            //$diagnosis->doctor_id = Auth::user()->id;
            $diagnosis->doctor_id = $request->input('doctor_id');
            $diagnosis->patient_id = $request->input('patient_id');
            $diagnosis->diagnose_result = $request->input('diagnose_result');
            $diagnosis->treatment = $request->input('treatment');
            $diagnosis->save();
            
            return response($diagnosis, 201);
        }
    
        /**
        * Display the specified resource.
        * @param  int  $id
        * @return Response
        */
        public function show($id)
        {
            return Diagnosis::findOrFail($id);
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
            $diagnosis = Diagnosis::findOrFail($id);
            $diagnosis->doctor_id = $request->input('doctor_id');
            $diagnosis->patient_id = $request->input('patient_id');
            $diagnosis->diagnose_result = $request->input('diagnose_result');
            $diagnosis->treatment = $request->input('treatment');
            $diagnosis->save();
            
            return response($diagnosis, 200);
        }
    
        /**
        * Remove the specified resource from storage.
        * @param  int  $id
        * @return Response
        */
        public function destroy($id)
        {
            $diagnosis = Diagnosis::find($id);
            $diagnosis->delete();

            return response('Deleted.', 200);
        }
        
        //filter pake param get di url
        public function filter(Request $request)
        {
            // $found = Diagnosis::where('diagnose_result','like',
                // '%'.$request->get('diagnose_result').'%')
                // ->get();
            
            $found = Diagnosis::where([
                ['diagnose_result','like',
                '%'.$request->get('diagnose_result').'%'],
                ['treatment','like',
                '%'.$request->get('treatment').'%']
                ])->get();
            
            
            return $found;
        }
}
