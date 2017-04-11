<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

//models used
use App\Patient;
use App\Diagnosis;

class PatientDiagnosisController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($patient_id)
    {
        //
        return Patient::findOrFail($patient_id)->diagnoses->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $patient_id)
    {
        //
        $diagnosis = new Diagnosis;
        $diagnosis->patient_id = $patient_id;
        $diagnosis->doctor_id = $request->input('doctor_id');
        $diagnosis->diagnose_result = $request->input('diagnose_result');
        $diagnosis->treatment = $request->input('treatment');
        $diagnosis->save();
        
        return response($diagnosis, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($patient_id,$diagnosis_id)
    {
        //
        return Patient::findOrFail($patient_id)->diagnoses()->findOrFail($diagnosis_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $patient_id,$diagnosis_id)
    {
        //
        $diagnosis = Patient::findOrFail($patient_id)->diagnoses()->findOrFail($diagnosis_id);
        $diagnosis->patient_id = $patient_id;
        $diagnosis->doctor_id = $request->input('doctor_id');
        $diagnosis->diagnose_result = $request->input('diagnose_result');
        $diagnosis->treatment = $request->input('treatment');
        $diagnosis->save();
        
        return response($diagnosis, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($patient_id,$diagnosis_id)
    {
        //
        $diagnosis = Patient::findOrFail($patient_id)->diagnoses()->findOrFail($diagnosis_id);
        $diagnosis->delete();

        return response('Deleted.', 200);
    }
}
