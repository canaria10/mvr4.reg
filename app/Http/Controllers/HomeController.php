<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

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
        $connection = \DB::table('master_table')->get();
        $remarks = \DB::table('master_table')->where('REMARKS', 'N/A')->count();
        $bronze = \DB::table('master_table')->where('REGISTRATION_CATEGORY_500_350', '500')->count();
        $RC_FC = \DB::table('master_table')->where('REGISTRATION_CATEGORY_500_350', 'FOR COMPLETION')->count();

        $conCount = count($connection);
        $rem = $conCount - $remarks;
        $Tf = $conCount - $bronze - $RC_FC;

        $loc = array();
        foreach($connection as $conn){
            if(!(in_array($conn->REG_LOCATION, $loc))) {
                $loc[] = $conn->REG_LOCATION;
            }
        }

        return view('home')->with(array('loc' => $loc, 'run' => $conCount, 'rem' => $rem, 'bronze' => $bronze, 'Tf' => $Tf, 'RC_FC' => $RC_FC, 'connection' => $connection));
    }
}
