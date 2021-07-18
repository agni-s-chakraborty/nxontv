<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';	
    protected $primaryKey = 'id';
    
    // public static function getRoles(){
    //     if(Auth::user()->role_id==config('const.roleUserMaster')){
    //         return Role::where('id','!=',1)->get();
    //     }else{
    //         return Role::all();
    //     }
    // }
}
