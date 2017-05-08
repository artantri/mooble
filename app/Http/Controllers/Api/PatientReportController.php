<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

//models used
use App\Patient;
use App\HealthReport;


use Illuminate\Http\Request;

class PatientReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($patient_id)
    {
        //
        return Patient::findOrFail($patient_id)->reports->all();
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
        $report = new HealthReport;
        $report->patient_id = $patient_id;
        $report->body_id = $request->input('body_id');
        $report->pain_rate = $request->input('pain_rate');
        $report->pain_description = $request->input('pain_description');
        $report->save();
        
        return response($report, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($patient_id,$report_id)
    {
        //
        return Patient::findOrFail($patient_id)->reports()->findOrFail($report_id);
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
    public function update(Request $request, $patient_id,$report_id)
    {
        //
        // $report = Patient::findOrFail($patient_id)->reports()->findOrFail($report_id);
        // $report->patient_id = $patient_id;
        // $report->body_id = $request->input('body_id');
        // $report->pain_rate = $request->input('pain_rate');
        // $report->pain_description = $request->input('pain_description');
        // $report->save();

        $report = Patient::findOrFail($patient_id)->reports()->findOrFail($report_id);
        $report->fill($request->all());
        $report->save();

        
        return response($report, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($patient_id,$report_id)
    {
        //
        $report = Patient::findOrFail($patient_id)->reports()->findOrFail($report_id);
        $report->delete();

        return response('Deleted.', 200);
    }
}
