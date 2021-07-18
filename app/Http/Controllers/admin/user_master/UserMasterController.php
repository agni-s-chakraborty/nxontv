<?php

namespace App\Http\Controllers\admin\user_master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Validator;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;

class UserMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index(Request $request)
    {
        $user_role = Role::orderBy('id', 'DESC')->pluck('name','id');
        // $user_listing = User::select('users.*','roles.name as role_name')->leftJoin('roles', 'roles.id', '=', 'users.role_id')->get();
        
        $users_edit = 0;
        if($request->get('id'))
          $users_edit =   User::find($request->get('id'));

        return view('admin.user_master.index',compact('user_role','users_edit'));
    }

    public static function changeStatus(Request $request){
        $user_status = User::find($request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        try{
            if(isset($request->edit_id)){
                $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:users,name,'.$request->edit_id,
                    'email' => 'required|unique:users,email,'.$request->edit_id,
                ], 
                [
                    'name.unique' => 'The username already exist',
                    'email.unique' => 'The email already exist'
                ]);
            }else{
                $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:users,name',         
                    'email' => 'required|unique:users,email',
                    'password' => 'required',
                    'role_id' => 'required',
                    'profile_image' => 'required|mimes:jpeg,png,jpg',
                ], 
                [
                    'name.unique' => 'The username already exist',
                    'email.unique' => 'The email already exist'
                ]);
            }

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            $data = User::addUser($request);

            if(isset($request->edit_id)){
                session()->flash('success', trans('messages.userUpdate'));
            }else{
                session()->flash('success', trans('messages.userCreations'));
            }
            
            return redirect()->route('admin.user_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.user_master.index');
        }
    }

    //User Master Listing Start
    public static function postUsersList(Request $request){ 
        try{
           return User::postUsersList($request);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.user_master.index');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function edit($id)
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
    public static function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy(Request $request,$id)
    {
        try{
            // $userData = User::find($id);
            $data = User::where('id',$id)->delete();
            
            session()->flash('success', trans('messages.userDeleted'));
            return Response::json($data);
            // return redirect()->route('admin.user_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return Response::json($e);
            // return redirect()->route('admin.user_master.index');
        }   
    }
}
