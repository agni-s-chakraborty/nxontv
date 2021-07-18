<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper;
use Yajra\DataTables\DataTables;
use Auth;

class ChannelGuide extends Model
{
    use HasFactory;
    protected $table = 'chennal_gide';

    protected $fillable = [
        'operator_name',
        'chennal_file',
        'chennal_name',
        'hd_sd',
        'lcn',
    ];

    //Operator Master Add
    public static function addChannelGuide($request){
        if(isset($request->edit_id)){
            $data = ChannelGuide::find($request->edit_id);
        }else{
            $data = new ChannelGuide();
        }
        $data->operator_name = $request->operator_name;
        $data->chennal_file = $request->chennal_file;
        $data->chennal_name = $request->chennal_name;
        $data->hd_sd = $request->hd_sd;
        $data->lcn = $request->lcn;

        $data->save();
        return $data;
    }

    //listing Operator Master

    public static function postChannelGuideList($request){
        $query = ChannelGuide::all();
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
