<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Models\Password_Resets;
use Carbon\Carbon;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //   $this->middleware('guest:admin', ['except' => ['logout']]);
    // }

    public static function showLoginForm(){
        return view('admin.auth.adminlogin');
    }

    public static function login(Request $request){

        //--- Validation Section
        $rules = [
            'name'   => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }


        //--- Validation Section Ends
  
        // Attempt to log the user in

        $remember_me = $request->has('remember') ? true : false; 

        if (Auth::guard('web')->attempt(['name' => $request->name, 'password' => $request->password],$remember_me)) {
            $data = User::where('name',$request->name)->update(['last_logintime_at' => Carbon::now()->toDateTimeString()]);
            if(!empty($data)){
                return redirect()->route('admin.dashboard'); // if successful, then redirect to their intended location
            }else{
                session()->flash('error',trans('messages.errorname'));
            }
        }
  
        session()->flash('error',trans('User Name and credentials doesn\'t match !')); // if unsuccessful, then redirect back to the login with the form data
        return redirect()->route('admin.login');
    }

    public static function logout()
    {
        $data =  User::where('name',Auth::user()->name)->update(['last_logouttime_at' => Carbon::now()->toDateTimeString()]);
        if(!empty($data)){
            Auth::guard('web')->logout();
            return redirect()->route('admin.login');
        }else{
            session()->flash('error',trans('messages.error'));
        }
    }

    public static function forgotpassword(){
        return view('admin.auth.forgotpassword');
    }

    public static function resetpasswordemail(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }

        $user = User::where('email',$request->email)->whereIn('role_id',[1,2])->first();
        if(!$user){
            session()->flash('error', trans('Your requested email for forgot password not found'));
            return redirect()->route('admin.forgotpassword');
        }

        try{
            $token = Crypt::encryptString($request->email);
            Password_Resets::updateOrCreate(
            [
                'email' => $request->email
            ], [
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
            ])->forgotLink($token, $request->email,'',$user->name);

            session()->flash('success', trans('Please check the email and follow the instruction to reset your password.'));
            return redirect()->route('admin.login');
        }catch(\Exception $e){                  
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.forgotpassword');
        }        
    }

    /* Reset Password Form */
    public static function showPasswordResetForm($token){
        try{
            $tokenData = Password_Resets::where('token', $token)->first();
            if ( !$tokenData ){ 
                if($isMobile == 1){
                    session()->flash('error', trans('messages.InvalidResetPassword'));
                     return redirect()->route('admin.verification');
                }else{
                    session()->flash('error', trans('messages.InvalidResetPassword'));
                    return redirect()->to('/admin/login');
                }
            }
            return view('admin.auth.reset',array('token'=>$token));
        }catch(\Exception $e){                  
            session()->flash('error',$e->getMessage());
            return redirect()->route('resetpasswordform');
        }    
    }

    /* Reset Password  */
    public function resetPassword(Request $request,$token) {
        $rules = array(
           //'currentpassword' => 'required',
           'password' => [
               'required',
               'string',
               'min:8',             // must be at least 10 characters in length
               'regex:/[a-z]/',      // must contain at least one lowercase letter
               'regex:/[A-Z]/',      // must contain at least one uppercase letter
               'regex:/[0-9]/',      // must contain at least one digit
               'regex:/[@$!%*#?&]/', // must contain a special character
           ],
           'password_confirmation' => ['same:password'],
        );

        $messsages = array(
            'password.regex' => trans('messages.strongPassword'),
        );

        $validator = Validator::make($request->all(), $rules,$messsages);
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
       
        try{
            $password = $request->password;
            $tokenData = Password_Resets::where('token', $token)->first();
            $user = User::where('email', $tokenData->email)->first();
            if ( !$user ) {
                session()->flash('error', trans('messages.InvalidResetPassword'));
                return redirect()->to('admin/forgotpassword');
            }

           $user->password = Hash::make($password);
           $user->save();
            //    $user->update();
            // Auth::login($user);

           Password_Resets::where('email', $user->email)->delete();    

           session()->flash('success', trans('messages.passwordResetSuccess'));
           return redirect()->route('admin.login');
           
        }catch(\Exception $e){                  
           session()->flash('error',$e->getMessage());
           return redirect()->route('admin.login');
       }
  }
}