<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OIMNew;


class OIMNewController extends Controller
{
    public function index(){
        return view('admin.other_info_master.index');
      }

   
      public function other_info(Request $request){
        
        if ($request->ajax()) {
            $model = new Ajax();
            $model->name = $request->post('name');
           if($request != ''){
             return ["msg"=>$abc];
            }else{
             return ["msg"=>"Done"];
            }
        }
       

        
      //  $users = DB::table('chennal_gide')->get();

      
      }
   
}
