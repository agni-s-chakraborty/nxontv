<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Crypt;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Helpers\Helper;
use Yajra\DataTables\DataTables;
use Auth;
use URL;
use Illuminate\Support\Str;

class CompnyMaster extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'company_masters';

    protected $fillable = [
        'company_name',
        'contact',
        'address',
        'pan_number',
        'representative_name',
    ];



    //create user
    public static function addCompnyMaster($request){

        if(isset($request->edit_id)){
            $data = CompnyMaster::find($request->edit_id);
        }else{
            $data = new CompnyMaster();
        }
        $data->company_name = $request->company_name;
        $data->contact = $request->contact;
        $data->address = $request->address;
        $data->pan_number = $request->pan_number;
        $data->representative_name = $request->representative_name;

        $data->save();
        return $data->id;
    }

    //listing User_master
    public static function postCompnayList($request){
        $query = CompnyMaster::all();

        return Datatables::of($query)
            ->editColumn('company_name', function ($data) {
                $lower_data = Str::lower($data->company_name);
                return Str::ucfirst(str_replace(' ', ' ', $lower_data));
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
            ->rawColumns(['company_name','action'])
            ->make(true);
    }
}
