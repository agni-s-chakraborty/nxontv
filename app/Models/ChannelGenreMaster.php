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

class ChannelGenreMaster extends Model
{
    use HasFactory;    
    use SoftDeletes;

    protected $table = 'channel_genre_masters';

    protected $fillable = [
        'genre_name',
        'genre_short_name',
        'genre_icon',
    ];


    //create Channel Genre Master
    public static function addChannelGenreMaster($request){

        if(isset($request->edit_id)){
            $data = ChannelGenreMaster::find($request->edit_id);
        }else{
            $data = new ChannelGenreMaster();
        }
        
        $data->genre_name = $request->genre_name;
        $data->genre_short_name = $request->genre_short_name;
        $genreIconName = $request->genre_icon;

        if(isset($request->genre_icon) && $request->genre_icon !=''){
            
            /* Unlink Image */
            if(isset($request->genre_icon) && $request->genre_icon!=''){
                $imagePath = Helper::getIconFileUploadPath().''.$request->genre_icon;
                if(file_exists($imagePath)){
                    unlink($imagePath);    
                }
            }
            
            $profile   = $request->genre_icon;
            $genreIconName = 'Icon-'.time().'.'.$request->genre_icon->getClientOriginalExtension();
            $profile->move(Helper::getIconFileUploadPath(), $genreIconName);    
        }
        $data->genre_icon = $genreIconName;
        
        $data->save();
        return $data->id;
    }

    //listing Channel Genre Master  

    public static function postChannelGenreList($request){
        $query = ChannelGenreMaster::all();

        return Datatables::of($query)
            ->addColumn('genre_icon', function ($data) {
                return Helper::displaygetIconPath().$data->genre_icon;       
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
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
