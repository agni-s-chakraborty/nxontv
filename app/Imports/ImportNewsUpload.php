<?php

namespace App\Imports;

use App\Models\UploadNewsModule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use App\Models\UploadNewsModule_update;

class ImportNewsUpload implements ToModel, WithHeadingRow
{
    use Importable;

    public function  __construct($channel_name)
    {
        $this->channel_name =$channel_name;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $data)
    {

        $match_array = UploadNewsModule::select('program_name')->get()->toarray();
        $program_name_array = array_column($match_array, 'program_name');
        if(in_array($data['program_name'],$program_name_array)){
            $slug = str_slug($data['program_name']);
            $datas = UploadNewsModule_update::where('slug',$slug)->first();
            if (empty($datas)) {
                return new UploadNewsModule_update([
                    'channel_name' => $this->channel_name,
                    'slug' => $slug,
                    'program_name' => $data['program_name'],
                    'genre' => $data['genre'],
                    'date' => $data['date'],
                    'time' => $data['time'],
                    'duration' => $data['duration'],
                    'description' => $data['description'],
                    'episodeno' => $data['episodeno'],
                    'show_wise_description' => $data['show_wise_description']
                ]);
            }
        }else{
            $slug = str_slug($data['program_name']);
            $datas = UploadNewsModule::where('slug',$slug)->first();
            if (empty($datas)) {
                return new UploadNewsModule([
                    'channel_name' => $this->channel_name,
                    'slug' => $slug,
                    'program_name' => $data['program_name'],
                    'genre' => $data['genre'],
                    'date' => $data['date'],
                    'time' => $data['time'],
                    'duration' => $data['duration'],
                    'description' => $data['description'],
                    'episodeno' => $data['episodeno'],
                    'show_wise_description' => $data['show_wise_description']
                ]);
            }
        }
    }
}
