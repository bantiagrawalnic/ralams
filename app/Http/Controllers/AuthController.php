<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Applicant;
use App\Models\ApplicationTransaction;

class AuthController extends Controller
{
    public function showRegisterForm() {
        return view('auth.register');
    }

    public function land_selection() {
        return view('land_selection');
    }

    public function register(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:10|unique:users,phone',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[A-Z]/',      
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login.form')->with('success', 'Registration successful!');
    }

    public function showLoginForm() {
        return view('auth.logins');
    }

    public function showLoginForms() {
        return view('auth.logins');
    }

    public function submoitlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            //'captcha' => 'required|captcha'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(in_array(Auth::user()->user_type,array('SDO','DC','DM','SG','LRO','Patwari'))){
                return redirect()->route('home');
            }
            return redirect()->intended('/dashboard'); 
        }

        return back()->with('error', 'Invalid credentials or captcha.')->withInput();
    }

    public function home(){
        $userid = Auth::user()->id;
        $pendingCount = ApplicationTransaction::where('forward_to_id',$userid)->where('status','pending')->orderBy('id','DESC')->distinct('application_id')->count();        
        $completedCount = ApplicationTransaction::where('forward_to_id',$userid)->where('status','completed')->orderBy('id','DESC')->distinct('application_id')->count();        
        $processingCount = ApplicationTransaction::where('forward_to_id',$userid)->where('status','processing')->orderBy('id','DESC')->distinct('application_id')->count();                         
        $rejectCount = ApplicationTransaction::where('forward_to_id',$userid)->where('status','rejected')->orderBy('id','DESC')->distinct('application_id')->count();                                 

        return view('home',compact('pendingCount','completedCount','processingCount','rejectCount'));
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login.form');
    }

    public function getlocation(Request $request)
    {
        $type = $request->query('type');
        $value = $request->query('value');

        try {
            if ($type === 'districts') {
                $data = DB::table('tbl_district')
                    ->pluck('District_Name');
            } elseif ($type === 'district') {
                if (empty($value)) {
                    return response()->json(['error' => 'Missing district value'], 400);
                }

                $data = DB::table('tbl_tehsil as t')
                    ->join('tbl_district as d', 't.District_ID1', '=', 'd.District_ID1')
                    ->where('d.District_Name', $value)
                    ->pluck('Block_Name');
            } elseif ($type === 'tehsil') {
                if (empty($value)) {
                    return response()->json(['error' => 'Missing tehsil value'], 400);
                }

                $data = DB::table('tbl_village as v')
                ->join('tbl_tehsil as t', 'v.Block_ID1', '=', 't.Block_ID1')
                ->where('t.Block_Name', $value)
                ->select('v.Village_Name', 'v.Village_Id')
                ->get();

            } else {
                return response()->json(['error' => 'Invalid type parameter'], 400);
            }

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getlocationland(Request $request)
    {
        $type = $request->query('type');
        $value = $request->query('value');

        try {
            if ($type === 'land_districts') {
                $data = DB::table('tbl_district')
                    ->pluck('District_Name');
            } elseif ($type === 'land_district') {
                if (empty($value)) {
                    return response()->json(['error' => 'Missing district value'], 400);
                }

                $data = DB::table('tbl_tehsil as t')
                    ->join('tbl_district as d', 't.District_ID1', '=', 'd.District_ID1')
                    ->where('d.District_Name', $value)
                    ->pluck('Block_Name');
            }  else {
                return response()->json(['error' => 'Invalid type parameter'], 400);
            }

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getKhasra(Request $request)
    {
        $villageCode = $request->input('village_code');

        if (empty($villageCode)) {
            return response()->json(['error' => 'Missing village code'], 400);
        }

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post('http://localhost/sample/khasara/khasra_api.php', [
                'Village_lgcode' => $villageCode
            ]);            
            if ($response->failed()) {
                return response()->json(['error' => 'Failed to fetch Khasra data'], 500);
            }

            return response()->json($response->json());

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

public function getKhasraDetails(Request $request)
{
    $villageCode = $request->input('Village_lgcode');
    $khasra = $request->input('khasra');

    $postFields = json_encode([
        'Village_lgcode' => $villageCode,
        'khasra' => $khasra
    ]);

    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL => 'http://localhost/sample/khasara/land_owner_details.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $postFields,
        CURLOPT_HTTPHEADER => [
            'Content-Type: text/plain',
        ],
    ]);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        return response()->json(['status' => 'error', 'message' => $error]);
    }

    $result = json_decode($response, true);

    return response()->json([
        'status' => 'success',
        'data' => $result['api_response']['data'] ?? [],
        'full_response' => $result,
    ]);
}


}