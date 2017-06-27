<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use Excel;

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

    public function ImportExcel(Request $request){
        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
            $file_loaded[] = ['file_name' => $request->file('import_file')->getClientOriginalName(), 'description' => $request->get('description'), 'date_stored' => date('Y-m-d H:i:s')];

            \DB::table('history_table')->insert($file_loaded);
            $data = Excel::load($path, function($reader) {
            })->get();
                foreach($data as $key => $item){
                    $mvrExcel[] = ['NO' => $item->no, 'DATE_OF_ENCODED' => $item->date_of_encoded, 'REGISTRATION_DATE' => $item->registration_date, 'BRONZE_NO' => $item->bronze_no, 'FIRST_NAME_LAST_NAME' => $item->first_name_last_name, 'LAST_NAME' => $item->last_name, 'FIRST_NAME' => $item->first_name, 'MIDDLE_NAME' => $item->middle_name, 'BIRTHDAY_YYYY_MM_DD' => $item->birthday, 'AGE' => $item->age, 'GENDER' => $item->gender, 'BLOOD_TYPE' => $item->blood_type, 'EMAIL' => $item->email, 'ADDRESS' => $item->address, 'CITY' => $item->city, 'PROVINCE' => $item->province, 'MOBILE_NO' => $item->mobile_no, 'SCHOOL_OFFICE_ORGANIZATION' => $item->school_office_organization, 'SCHOOL_OFFICE_ADDRESS' => $item->school_office_address, 'PROFESSION' => $item->profession, 'REGISTRATION_CATEGORY_500_350' => $item->registtration_category_500_350, 'RACE_CATEGORY_3K_5K' => $item->race_category_3k_5k, 'SINGLET_SIZE' => $item->singlet_size, 'MODE_OF_PAYMENT' => $item->mode_of_payment, 'SM_TICKET' => $item->sm_ticket, 'REG_TYPE' => $item->reg_type, 'PAID' => $item->paid, 'CLAIMED' => $item->claimed, 'RACEBIB_NO' => $item->racebib_no, 'REG_LOCATION' => $item->reg_location, 'REMARKS' => $item->remarks];

                }
                if(!empty($mvrExcel)){
                    \DB::table('master_table')->truncate();
                    \DB::table('master_table')->insert($mvrExcel);
                    return back();
                }
                
        }
    }
}
