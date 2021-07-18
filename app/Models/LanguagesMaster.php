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

class LanguagesMaster extends Model
{
    use HasFactory;    
    use SoftDeletes;

    protected $table = 'languages_master';

    protected $fillable = [
        'languages_name',
        'languages_short_name',
    ];

    //Languages Master Add
    public static function addLanguagesMaster($request){

        if(isset($request->edit_id)){
            $data = LanguagesMaster::find($request->edit_id);
        }else{
            $data = new LanguagesMaster();
        }
        $data->languages_name = $request->languages_name;
        $data->languages_short_name = $request->languages_short_name;
        
        $data->save();
        return $data->id;
    }

    //listing Languages_master   

    public static function postLanguagesList($request){
        $query = LanguagesMaster::all();
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
