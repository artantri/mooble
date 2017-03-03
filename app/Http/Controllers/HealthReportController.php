<?php

namespace App\Http\Controllers;

use App\HealthReport;
use Illuminate\Http\Request;

class HealthReportController extends Controller
{
    /**
        * Display a listing of the resource.
        * @return Response
        */
        public function index()
        {
            return HealthReport::all();
            
            return view('doctor.report', compact('reports'));
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
            $report = new HealthReport;
            $report->patient_id = $request->input('patient_id');
            $report->body_id = $request->input('body_id');
            $report->pain_rate = $request->input('pain_rate');
            $report->pain_description = $request->input('pain_description');
            $report->save();
            
            return response($report, 201);
        }
    
        /**
        * Display the specified resource.
        * @param  int  $id
        * @return Response
        */
        public function show($id)
        {
            //return HealthReport::findOrFail($id);

            $report=HealthReport::find($id);
            if(is_null($report))
            {
                return response("not found",404);
            }
 
            return response($report,200);
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
            $report = HealthReport::findOrFail($id);
            $report->patient_id = $request->input('patient_id');
            $report->body_id = $request->input('body_id');
            $report->pain_rate = $request->input('pain_rate');
            $report->pain_description = $request->input('pain_description');
            $report->save();
            
            return response($report, 200);
            
        }
    
        /**
        * Remove the specified resource from storage.
        * @param  int  $id
        * @return Response
        */
        public function destroy($id)
        {
            $report = HealthReport::find($id);
            $report->delete();

            return response('Deleted.', 200);
        }
        
        //filter pake param get di url
        public function filter(Request $request)
        {
            $reports = HealthReport::with('patient','bodypart')->where('patient_id', $request->get('patient_id'))->get();
        
            // $found = HealthReport::where('patient_id','like',
                // '%'.$request->get(patient_id).'%')
                // ->get();
            
            return $reports;
    }
}
