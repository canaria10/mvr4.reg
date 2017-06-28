<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use Excel;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DashsideNav = 'active';
        $DevsideNav = '';

        $connection = \DB::table('master_table')->get();
        $remarks = \DB::table('master_table')->where('REMARKS', 'N/A')->count();
        $bronze = \DB::table('master_table')->where('REGISTRATION_CATEGORY_500_350', '500')->count();
        $RC_FC = \DB::table('master_table')->where('REGISTRATION_CATEGORY_500_350', 'FOR COMPLETION')->count();
        $latestDB = \DB::table('history_table')->where('description', 'MVR Database')->orderBy('id', 'desc')->first();

        $now = new DateTime();
        $race = new DateTime('2017-07-23 04:00:00');



        $conCount = count($connection);
        $rem = $conCount - $remarks;
        $Tf = $conCount - $bronze - $RC_FC;

        $loc = array();
        foreach($connection as $conn){
            if(!(in_array($conn->REG_LOCATION, $loc))) {
                $loc[] = $conn->REG_LOCATION;
            }   
        }

        $intervalTime = $race->diff($now);
        
        return view('home')->with(array('DashsideNav' => $DashsideNav, 'DevsideNav' => $DevsideNav, 'loc' => $loc, 'run' => $conCount, 'rem' => $rem, 'bronze' => $bronze, 'Tf' => $Tf, 'RC_FC' => $RC_FC, 'connection' => $connection, 'intervalTime' => $intervalTime, 'latestDB' => $latestDB));
    }
    public function SuperUser(Request $request){
        $DashsideNav = '';
        $DevsideNav = 'active';
        $historyDB = \DB::table('history_table')->get();

        $passcode = $request->input('passdev');
        if($passcode == '12345'){
            return view('/developer')->with(array('DashsideNav' => $DashsideNav, 'DevsideNav' => $DevsideNav, 'historyDB' => $historyDB));
        }
        return back();

    }

    
}
