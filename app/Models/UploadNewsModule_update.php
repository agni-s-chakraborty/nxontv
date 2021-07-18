<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadNewsModule_update extends Model
{
    use HasFactory;

    public $table = 'uploadnewsmodule_update';

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
}
