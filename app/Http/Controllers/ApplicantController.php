<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\ApplicationTransaction;
use App\Models\Tehsil;
use App\Models\District;
use App\Models\Village;
use App\Models\Block;
use App\Models\User;
use Auth;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Server side validation
        $request->validate([
            'purpose_type'          => 'required|string|max:255',
            'land_allotment_rule'   => 'required|string',
            'applicant_name'        => 'required|string|max:255',
            'father_name'           => 'required|string|max:255',
            'applicantt_address'    => 'required|string|max:500',
            'mobile'                => 'required|digits:10',
            'email'                 => 'required|email|max:255',
            'org_type'              => 'required|string',
            'org_name'              => 'required|string|max:255',
            'area'                  => 'required|string|max:255',
            'remarks'               => 'required|string',
            'registered'            => 'required',
            'reg_number'            => 'nullable|required_if:registered,Yes|string|max:255',
            'reg_date'              => 'nullable|required_if:registered,Yes|date',
            'budget_announcement'   => 'required',
            'budget_file'           => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Budget file upload (if provided)
        $budgetFilePath = null;
        if($request->hasFile('budget_file')){
            $budgetFilePath = $request->file('budget_file')->store('budget_files', 'public');
        }

        // Save data
        $applicant = new Applicant();
        $applicant->purpose_type         = $request->purpose_type;
        $applicant->land_allotment_rule  = $request->land_allotment_rule;
        $applicant->applicant_name       = $request->applicant_name;
        $applicant->father_name          = $request->father_name;
        $applicant->applicantt_address   = $request->applicantt_address;
        $applicant->mobile               = $request->mobile;
        $applicant->email                = $request->email;
        $applicant->org_type             = $request->org_type;
        $applicant->org_name             = $request->org_name;
        $applicant->area                 = $request->area;
        $applicant->remarks              = $request->remarks;
        $applicant->registered           = $request->registered;
        $applicant->reg_number           = $request->reg_number;
        $applicant->reg_date             = $request->reg_date;
        $applicant->budget_announcement  = $request->budget_announcement;
        $applicant->budget_file          = $budgetFilePath;
        $applicant->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'आवेदन सफलतापूर्वक सबमिट हो गया।');
    }

    public function getAllApplications($status){
        // $applications = Applicant::where('applicant_tehsil', Auth::user()->block)->with('purpose')
        //                         ->where('status_flag','P')
        //                         ->where('status','Submitted')
        //                         ->orderBy('id','DESC')
        //                         ->get();
        $userid = Auth::user()->id;
        $applications = ApplicationTransaction::where('forward_to_id',$userid)
                                    ->where('status',$status)
                                    ->distinct('application_id')
                                    ->orderBy('id','DESC')
                                    ->with('application')
                                    ->get();                                                  
        return view('application_list',compact('applications','status'));
    }

    public function updateApplicationStatus(Request $request){
        $data = $request->all();
        // dd($data);
        try{
            $application = Applicant::find($data['application_id']);
            if(Auth::user()->user_type == 'DC'){
                $nextforwardRole = 'DM';            
                $nextbackwardRole = '';
                $nextforwardedId = User::where(['district_id'=>$application->applicant_district,'user_type'=>$nextforwardRole])->value('id');                                       
            }elseif(Auth::user()->user_type == 'DM'){
                $nextforwardRole = 'SDO';
                $nextbackwardRole = 'DC';                
                $nextforwardedId = User::where(['block'=>$application->applicant_tehsil,'user_type'=>$nextforwardRole])->value('id');            
                $backwarduserId = User::where(['district_id'=>$application->applicant_district,'user_type'=>$nextbackwardRole])->value('id');                 
            }elseif(Auth::user()->user_type == 'SDO'){
                $nextforwardRole = 'LRO';
                $nextbackwardRole = 'DM';                
                $nextforwardedId = User::where(['block'=>$application->applicant_tehsil,'user_type'=>$nextforwardRole])->value('id');            
                $backwarduserId = User::where(['district_id'=>$application->applicant_district,'user_type'=>$nextbackwardRole])->value('id');                 
            }elseif(Auth::user()->user_type == 'LRO'){
                $nextforwardRole = 'Patwari'; 
                $nextbackwardRole = 'SDO';
                $nextforwardedId = User::where(['village_id'=>$application->landDeatil->village_code,'user_type'=>$nextforwardRole])->value('id');            
                $backwarduserId = User::where(['block'=>$application->applicant_tehsil,'user_type'=>$nextbackwardRole])->value('id'); 
            }else{
                $nextforwardRole = ''; 
                $nextbackwardRole = 'LRO';
                $nextforwardedId = '';            
                $backwarduserId = User::where(['block'=>$application->applicant_tehsil,'user_type'=>$nextbackwardRole])->value('id');
            }
            
            $lasttransaction = ApplicationTransaction::where('application_id',$data['application_id'])->orderBy('id','DESC')->first();
            $lasttransaction->status = 'processing';
            $lasttransaction->save();
            if($data['status'] == 'next') {     
                //update last forwarded id
                $application->last_forward_to_id = $nextforwardedId;   
                          
                ApplicationTransaction::create([
                    'application_id'  => $data['application_id'],
                    'forward_from_id' => Auth::user()->id,
                    'forward_to_id' => $nextforwardedId,
                    'comment' => $data['comment'],      
                    'status' => 'pending'     
                ]);
                
            }elseif($data['status'] == 'back'){
                ApplicationTransaction::create([
                    'application_id'  => $data['application_id'],
                    'forward_from_id' => Auth::user()->id,
                    'forward_to_id' => $backwarduserId,
                    'comment' => $data['comment'],      
                    'status' => 'pending'     
                ]);
            }   
            $application->status = 'Under Review';   
            $application->save(); 
            return response()->json(['status'=> true,'message'=> 'Application status updated successfully.']);
        }catch(\Exception $e){
            return response()->json(['status'=> false,'error'=> 'Something went wrong.']);
        }        
        
    }

    public function getApplicationDetails($application_id){        
        $user = Auth::user();        
        $details = ApplicationTransaction::where('id',$application_id)->with('application')->first();            
        $dropdown = array();
        if($user->user_type=='DC'){
            $dropdown = Block::where('id',$details->application->applicant_district)->get();
            $selected_value = $details->application->applicant_district;
        }else if($user->user_type=='DM'){                        
            $dropdown = Tehsil::select('Tehsil_Code as id','Block_Name as name')->where('District_ID',$details->application->applicant_district)->get();
            $selected_value = $details->application->applicant_tehsil;
        }else if($user->user_type == 'SDO' ){                        
            $dropdown = Tehsil::select('Tehsil_Code as id','Block_Name as name')->where('District_ID',$details->application->applicant_district)->get();            
            $selected_value = $details->application->applicant_tehsil;
        }else if($user->user_type=='LRO'){
            $selected_value = $details->application->landDeatil->village_code;
            $dropdown = Village::select('Village_Id as id','Village_Name as name')->where('Tehsil_Code',$details->application->applicant_tehsil)->get();
        }    
         
        if(!empty($details)){
            return view('application_details',compact('details','dropdown','selected_value'));
        }else{
            return redirect()->route('home');
        }
    }

}
