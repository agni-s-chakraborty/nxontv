<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Crypt;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Helpers\Helper;
use Yajra\DataTables\DataTables;
use Auth;
use URL;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getroles()
    {
        return $this->hasMany('App\Models\Role');
    }

    //create user
    public static function addUser($request){

        if(isset($request->edit_id)){
            $data = User::find($request->edit_id);
        }else{
            $data = new User();
        }
        
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->email_verified_at = Carbon::now();
        $data->role_id = $request->role_id;
        $data->status = config('const.statusActive');
        $profileName = $request->profile_image;

        if(isset($request->profile_image) && $request->profile_image !=''){
            
            /* Unlink Image */
            if(isset($request->profile_image) && $request->profile_image!=''){
                $imagePath = Helper::profileFileUploadPath().''.$request->profile_image;
                if(file_exists($imagePath)){
                    unlink($imagePath);    
                }
            }
            
            $profile   = $request->profile_image;
            $profileName = 'Profile-'.time().'.'.$request->profile_image->getClientOriginalExtension();
            $profile->move(Helper::profileFileUploadPath(), $profileName);    
        }
        $data->profile_image = $profileName;

        $data->save();
        return $data->id;
    }

    //listing User_master   

    public static function postUsersList($request){
        $query = User::select('users.*','roles.name as role_name')->leftJoin('roles', 'roles.id', '=', 'users.role_id')->get();

        return Datatables::of($query)
            ->addColumn('profile_image', function ($data) {
                return Helper::displayProfilePath().$data->profile_image;       
            }) 
            ->addColumn('status', function ($data) {
               return Helper::Status($data);
            }) 
            ->addColumn('action', function ($data) {
               if(Auth::user()->role_id == config('const.Admin')){
                $editLink = 'add-listing?id='.$data->id;
                   $deleteLink = $data->id;
                }else{
                    $editLink = '';
                }             
                $viewLink = '';
               return Helper::Action($viewLink,$editLink,$deleteLink);   
            }) 
            ->rawColumns(['status','action'])
            ->make(true);
    }
}
