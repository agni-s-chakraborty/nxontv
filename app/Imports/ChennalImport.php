<?php

namespace App\Imports;

use App\Models\ChannelGuide;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class ChennalImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function  __construct($operator_name,$chennal_file)
    {
        $this->operator_name =$operator_name;
        $this->chennal_file =$chennal_file;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new ChannelGuide([
            'operator_name' => $this->operator_name,
            'chennal_file' => $this->chennal_file,
            'chennal_name' => $row['channel_name'],
            'hd_sd' => $row['hdsd'],
            'lcn' => $row['lcn']
        ]);
    }
}
