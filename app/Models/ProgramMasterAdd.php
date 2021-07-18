<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;
use Auth;
use App\Helpers\Helper;

class ProgramMasterAdd extends Model
{
    use HasFactory;

    protected $table = 'program_master_add';

    protected $fillable = [
        'program_name',
        'search_chennal_name',
        'upload_module',
    ];

    //create
    public static function addProgramMaster($request){

        $data = new ProgramMasterAdd();
        $data->program_name = $request->program_name;
        $data->search_chennal_name = $request->search_chennal_name;
        $data->upload_module = $request->upload_module;

        $data->save();
        return $data;
    }

    //list
    public static function postProgramList($request){
        $query = ProgramMasterAdd::get();
        return Datatables::of($query)
        ->addColumn('action', function ($data) {
            if(Auth::user()->role_id == config('const.Admin')){
                $editLink = '';
                $deleteLink = $data->id;
                $viewLink = '';
            }else{
                $editLink = '';
            }
            return Helper::Action($viewLink,$editLink,$deleteLink);
        })
        ->rawColumns(['action'])
        ->make(true);
    }

}
