<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class UploadNewsModule extends Model
{
    use HasFactory;

    public $table = 'upload_news_module';

    protected $fillable = [
        "channel_name",
        "slug",
        'program_name',
        'genre',
        'date',
        'time',
        'duration',
        'description',
        'episodeno',
        'show_wise_description',
    ];

    //listing Upload News

    public static function postUploadNewsModule($request)
    {
        $query = UploadNewsModule::all();
        return Datatables::of($query)
        ->make(true);
    }
}
