<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportNewsUpload;
use Illuminate\Http\Request;
use App\Models\UploadNewsModule;
use App\Helpers\Helper;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use URL;
use Illuminate\Support\Str;

class UploadMenu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'upload_menu_master';

    protected $fillable = [
        'upload_module',
        'search_name',
        'upload_file',
    ];

    //create user
    public static function addUploadMenu($request){

        $data = new UploadMenu();
        $data->upload_module = 'News Module';
        $data->search_name = $request->search_chennal_name;
        $data->user_id = Auth::user()->id;
        $genreIconName = $request->upload_file;

        if(isset($request->upload_file) && $request->upload_file !=''){

            /* Unlink Image */
            $pathFolder = $request->upload_module;
            if(isset($request->upload_file) && $request->upload_file!=''){
                $imagePath = storage_path('app/public/upload/'.$pathFolder.'/').''.$request->upload_file;
                if(file_exists($imagePath)){
                    unlink($imagePath);
                }
            }

            $profile   = $request->upload_file;
            $genreIconName = 'Upload-'.time().'.'.$request->upload_file->getClientOriginalExtension();
            $profile->move(storage_path('app/public/upload/'.$pathFolder.'/'), $genreIconName);
        }
        $data->upload_file = $genreIconName;

        $data->save();
        return $data;
    }
}
