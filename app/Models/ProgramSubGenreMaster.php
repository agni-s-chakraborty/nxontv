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

class ProgramSubGenreMaster extends Model
{
    use HasFactory;    
    use SoftDeletes;

    protected $table = 'program_sub_genre_master';

    protected $fillable = [
        'genre_name',
        'genre_icon',
    ];

    public static function addProgramSubGenreMaster($request){

        if(isset($request->edit_id)){
            $data = ProgramSubGenreMaster::find($request->edit_id);
        }else{
            $data = new ProgramSubGenreMaster();
        }
        
        $data->genre_name = $request->genre_name;
        $GenreName = $request->genre_icon;

        if(isset($request->genre_icon) && $request->genre_icon !=''){
            
            /* Unlink Image */
            if(isset($request->genre_icon) && $request->genre_icon!=''){
                $imagePath = Helper::getIconSubGenreFileUploadPath().''.$request->genre_icon;
                if(file_exists($imagePath)){
                    unlink($imagePath);    
                }
            }
            
            $profile   = $request->genre_icon;
            $GenreName = 'SubGenre-'.time().'.'.$request->genre_icon->getClientOriginalExtension();
            $profile->move(Helper::getIconSubGenreFileUploadPath(), $GenreName);    
        }
        $data->genre_icon = $GenreName;

        $data->save();
        return $data->id;

    }

    //listing Program Sub Genre Master   

    public static function postProgramSubChannelGenreList($request){
        $query = ProgramSubGenreMaster::all();

        return Datatables::of($query)
            ->addColumn('genre_icon', function ($data) {
                return Helper::displaygetIconSubgenrePath().$data->genre_icon;       
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
            ->rawColumns(['action'])
            ->make(true);
    }
}
