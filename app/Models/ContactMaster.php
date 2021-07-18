<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Helpers\Helper;
use Yajra\DataTables\DataTables;
use Auth;
use URL;

class ContactMaster extends Model
{
    use HasFactory;    
    use SoftDeletes;

    protected $table = 'contact_master';  
    protected $primaryKey = 'id';
    public $fillable = ['company_id', 'channel_id', 'contact_person', 'email', 'contact', 'landline'];

    public function company()
    {
    	return $this->belongsTo('App\Models\CompnyMaster', 'company_id');
    }

    public function channel()
    {
    	return $this->belongsTo('App\Models\ChannelMaster', 'channel_id');
    }

    //listing Contact Master   

    public static function postContactList($request){
        $query = ContactMaster::with('company','channel')->get();
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
            ->rawColumns(['action'])
            ->make(true);
    }
}
