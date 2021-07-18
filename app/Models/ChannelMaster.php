<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\Helper;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Str;


class ChannelMaster extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'channel_master';
    protected $primaryKey = 'id';


    public function company()
    {
    	return $this->belongsTo('App\Models\CompnyMaster', 'company_id');
    }

    public function languages()
    {
    	return $this->belongsTo('App\Models\LanguagesMaster', 'languages_id');
    }

    public function chanelgenre()
    {
    	return $this->belongsTo('App\Models\ChannelGenreMaster', 'channel_genre_id');
    }

    //create user
    public static function addChannelMaster($request){

        if(isset($request->edit_chennal_id)){
            $data = ChannelMaster::find($request->edit_chennal_id);
        }else{
            $data = new ChannelMaster();
        }

        $data->company_id = $request->company_id;
        $data->channel_genre_id = $request->channel_genre_id;
        $data->languages_id = $request->languages_id;
        $data->channel_name = $request->channel_name;
        $data->channel_description = $request->channel_description;
        $data->region = $request->region;
        $data->channel_catchup = $request->channel_catchup;
        $data->channel_trp = $request->channel_trp;
        $data->status = $request->status;

        //channel_logo_1
        $channel_logo_one = $request->channel_logo_1;

        if(isset($request->channel_logo_1) && $request->channel_logo_1 !=''){

            /* Unlink Image */
            if(isset($request->channel_logo_1) && $request->channel_logo_1!=''){
                $imagePath = Helper::getChannelLogoone().''.$request->channel_logo_1;
                if(file_exists($imagePath)){
                    unlink($imagePath);
                }
            }

            $profile   = $request->channel_logo_1;
            $channel_logo_one = 'logo_1-'.time().'.'.$request->channel_logo_1->getClientOriginalExtension();
            $profile->move(Helper::getChannelLogoone(), $channel_logo_one);
        }
        $data->channel_logo_1 = $channel_logo_one;

        //channel_logo_2
        $channel_logo_two = $request->channel_logo_2;

        if(isset($request->channel_logo_2) && $request->channel_logo_2 !=''){

            /* Unlink Image */
            if(isset($request->channel_logo_2) && $request->channel_logo_2!=''){
                $imagePath = Helper::getChannelLogotwo().''.$request->channel_logo_2;
                if(file_exists($imagePath)){
                    unlink($imagePath);
                }
            }

            $profile   = $request->channel_logo_2;
            $channel_logo_two = 'logo_2-'.time().'.'.$request->channel_logo_2->getClientOriginalExtension();
            $profile->move(Helper::getChannelLogotwo(), $channel_logo_two);
        }
        $data->channel_logo_2 = $channel_logo_two;

        //channel_logo_3
        $channel_logo_three = $request->channel_logo_3;

        if(isset($request->channel_logo_3) && $request->channel_logo_3 !=''){

            /* Unlink Image */
            if(isset($request->channel_logo_3) && $request->channel_logo_3!=''){
                $imagePath = Helper::getChannelLogothree().''.$request->channel_logo_3;
                if(file_exists($imagePath)){
                    unlink($imagePath);
                }
            }

            $profile   = $request->channel_logo_3;
            $channel_logo_three = 'logo_3-'.time().'.'.$request->channel_logo_3->getClientOriginalExtension();
            $profile->move(Helper::getChannelLogothree(), $channel_logo_three);
        }
        $data->channel_logo_3 = $channel_logo_three;

        $data->save();
        return $data->id;
    }


    //listing Channel Master

    public static function postChannelList($request){
        $query = ChannelMaster::with('company','languages','chanelgenre')->get();
        return Datatables::of($query)
            ->addColumn('status', function ($data) {
               return Helper::Status($data);
            })
            ->addColumn('action', function ($data) {
               if(Auth::user()->role_id == config('const.Admin')){
                   $viewLink = $data->id;
                   $editLink = 'add-listing?id='.$data->id;
                   $deleteLink = $data->id;
                }else{
                    $editLink = '';
                }
               return Helper::Action($viewLink,$editLink,$deleteLink);
            })
            ->rawColumns(['status','action'])
            ->make(true);
    }
}
