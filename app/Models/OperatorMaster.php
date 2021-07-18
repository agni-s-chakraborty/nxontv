<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Helpers\Helper;
use Yajra\DataTables\DataTables;
use Auth;

class OperatorMaster extends Model
{
    use HasFactory;
    protected $table = 'operator_master';

    protected $fillable = [
        'si_no',
        'operator_name',
    ];

    //Operator Master Add
    public static function addOperatorMaster($request){
        if(isset($request->edit_id)){
            $data = OperatorMaster::find($request->edit_id);
        }else{
            $data = new OperatorMaster();
        }
        $data->si_no = IdGenerator::generate(['table' => 'operator_master', 'length' =>4, 'prefix' =>config('const.requestCodePrefix'),'field'=>'si_no']);
        $data->operator_name = $request->operator_name;

        $data->save();
        return $data;
    }

    //listing Operator Master

    public static function postOperatorList($request){
        $query = OperatorMaster::all();
        return Datatables::of($query)
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
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }
}
