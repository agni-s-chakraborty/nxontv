<?php

namespace App\Helpers;
use Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use URL;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Str;

class Helper {

    public static function res($data, $msg, $code) {
        $response = [
            'status' => $code == 200 ? true : false,
            'code' => $code,
            'msg' => $msg,
            'version' => '1.0.0',
            'data' => $data
        ];
        return response()->json($response, $code);
    }

    public static function success($data = [], $msg = 'Success', $code = 200) {
        return Helper::res($data, $msg, $code);
    }

    public static function fail($data = [], $msg = "Some thing wen't wrong!", $code = 203) {
        return Helper::res($data, $msg, $code);
    }

    public static function error_parse($msg) {
        foreach ($msg->toArray() as $key => $value) {
            foreach ($value as $ekey => $evalue) {
                return $evalue;
            }
        }
    }

    public static function active($param = "") {
        return Request::path() == $param ? 'active open' : '';
    }


    public static function Action($viewLink = '', $editLink = '', $deleteLink = '') {
        if ($viewLink)
            $view = '<a onclick="viewValueSet(' . $viewLink . ')" class="btn btn-primary btn-action mr-1 viewrecord" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-eye"></i></a>';
        else
            $view = '';

        if ($editLink)
            $edit = '<a href="'.$editLink.'" class="btn btn-primary btn-action mr-1 editrecord"><i class="fas fa-pencil-alt"></i></a>';
        else
            $edit = '';

        if ($deleteLink)
            $delete = '<a onclick="deleteValueSet(' . $deleteLink . ')" class="btn btn-danger1 btn-action deleterecord" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash"></i></a>';
        else
            $delete = '';


        return $view . '' . $edit . '' . $delete . '';
    }


    /* For Store Path Start */
    public static function profileFileUploadPath(){
       return storage_path('app/public/profilepic/');
    }

    public static function getIconFileUploadPath(){
        return storage_path('app/public/getIconpic/');
    }

    public static function getUploadImageUploadPath(){
        return storage_path('app/public/upload/');
    }

    public static function getIconGenreFileUploadPath(){
        return storage_path('app/public/program_genre_master/getIconpic/');
    }

    public static function getIconSubGenreFileUploadPath(){
        return storage_path('app/public/program_sub_genre_master/getIconpic/');
    }

    public static function getChannelLogoone(){

        return storage_path('app/public/channel_master/channelLogo1/');
    }

    public static function getChannelLogotwo(){
        return storage_path('app/public/channel_master/channelLogo2/');
    }

    public static function getChannelLogothree(){
        return storage_path('app/public/channel_master/channelLogo3/');
    }
    /* For Store Path End */

    /* For Display Image */
    public static function displayProfilePath(){
        return URL::to('/').'/storage/profilepic/';
    }

    public static function displaygetIconPath(){
        return URL::to('/').'/storage/getIconpic/';
    }

    public static function displaygetIcongenrePath(){
        return URL::to('/').'/storage/program_genre_master/getIconpic/';
    }

    public static function displaygetIconSubgenrePath(){
        return URL::to('/').'/storage/program_sub_genre_master/getIconpic/';
    }

    public static function displayChannellogoone(){
        return URL::to('/').'/storage/channel_master/channelLogo1/';
    }

    public static function displayChannellogotwo(){
        return URL::to('/').'/storage/channel_master/channelLogo2/';
    }

    public static function displayChannellogothree(){
        return URL::to('/').'/storage/channel_master/channelLogo3/';
    }

    public static function displayCompanylogo(){
        $c_logo=  URL::to('/').'/admin/assets/img/avatar/avatar-1.png';
        return '<img src="'.$c_logo.'" alt="avatar" width="30" height="30" class="rounded-circle mr-1">';
    }

    public static function Status($data) {
        if ($data->status == config('const.statusActive')) {
            return '<label class="custom-switch mt-2">
                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                <span class="custom-switch-indicator"></span>
            </label>';
        }else if($data->status == config('const.statusInActive')){
            return '<label class="custom-switch mt-2">
                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                <span class="custom-switch-indicator" style="background: #e02c2c;border: 1px solid #e02c2c;"></span>
            </label>';
        }else {
            return '<span>-</span>';
        }
    }

    public static function getStatusArray(){
        return array(
            'Active'=>"Active",
            'InActive'=>"InActive",
        );
    }

    public static function getCatchupArray(){
        return array(
            '0'=>"0",
            '1'=>"1",
        );
    }
}
