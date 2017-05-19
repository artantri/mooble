<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\User;
use App\Booking;

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
        //$result = 'wawawa';
        //return view('pasien_search')->with('result', Patient::all());
        return view('pasien_profile');
    //     return view('pasien_search', [
    //     'tasks' => $tasks
    // ]);
        
    }

    public function filter(Request $request)
    {
        //return view('home');
        $found = Patient::where([
                ['name','like',
                '%'.$request->get('username').'%'],
                ['phone_number','like',
                '%'.$request->get('telepon').'%'],
                ['NIK','like',
                '%'.$request->get('NIK').'%'],
                ['gender','like',
                '%'.$request->get('gender').'%'],
                ['blood_type','like',
                '%'.$request->get('golDarah').'%'],
                ])->get();
            
        return view('pasien_search')->with('result', $found);    
        //return $found;
    }

    public function staff(Request $request){
        $date =$request->get('filterDate');
            
        if ($date) {
            list($bulan, $tanggal, $tahun) = explode("/", $date);
            $dateString = $tahun. "-" .$bulan. "-" .$tanggal;
            
            $id = $request->get('filterDokter');
            $booking = Booking::where([
                    // [$booking->doctor->id,'like',
                    // '%'.$request->get('filterDokter').'%'],
                    ['request_date','like',
                    '%'.$dateString.'%'],
                    ['request_session','like',
                    '%'.$request->get('filterSession').'%'],
                    // ['is_approved','like',
                    // '%'.$request->get('status').'%'],
                    
                    ])->whereHas('doctor', function ($query) use ($id) {
                        $query->where('id','like', '%'.$id.'%');
                    })->get();
        }else{
            $booking=Booking::all();
        }

        //format date
        

//         $posts = Post::whereHas('comments', function ($query) {
//     $query->where('content', 'like', 'foo%');
// })->get();
            
        //return view('staff_search')->with('result', $found);    
        return view('booking_view')->with('doctor', User::all())->with('booking',$booking);   
    }
}
