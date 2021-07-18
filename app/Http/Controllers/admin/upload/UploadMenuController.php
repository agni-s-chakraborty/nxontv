<?php

namespace App\Http\Controllers\admin\upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChannelMaster;
use App\Models\UploadMenu;
use App\Models\UploadNewsModule;
use App\Models\UploadNewsModule_update;
use App\Models\ProgramMasterAdd;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportNewsUpload;
use Validator;
use Yajra\DataTables\DataTables;
use SebastianBergmann\Environment\Console;
use Response;
use DB;

class UploadMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $select_chennalName = ChannelMaster::pluck('channel_name','id');
        $show_match_Data =  UploadNewsModule::get();
        $show_update_match_Data =  UploadNewsModule_update::paginate(10);
        return view('admin.upload.upload_index',compact('select_chennalName','show_match_Data','show_update_match_Data'));
    }

    // public function autocomplete(Request $request)
    // {
    //     $data = ChannelMaster::select("channel_name")->where("channel_name","LIKE","%{$request->channel_name}%")->get();
    //     return response()->json($data);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                'upload_file' => 'required|mimes:xls,xlsx',
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            $search_chennal_name = $request->search_chennal_name;
            if($request->hasFile('upload_file')){
                $file = $request->file('upload_file');
                $channel_name = $request->search_name;
                Excel::import(new ImportNewsUpload($channel_name),$file);
            }

            $data = UploadMenu::addUploadMenu($request);

            session()->flash('success', trans('messages.UploadMenuCreations'));
            return redirect()->route('admin.upload_menu.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.upload_menu.index');
        }
    }

    public static function addExcelProgram(Request $request,$id)
    {
        $add_bluck_data = UploadNewsModule_update::find($id);
        if(!empty($add_bluck_data)){
            $slug = str_slug($add_bluck_data['channel_name']);
            UploadNewsModule::create([
                'channel_name' => $add_bluck_data->channel_name,
                'slug' => $slug,
                'program_name' => $add_bluck_data->program_name,
                'genre' =>$add_bluck_data->genre,
                'date' => $add_bluck_data->date,
                'time' => $add_bluck_data->time,
                'duration' => $add_bluck_data->duration,
                'description' => $add_bluck_data->description,
                'episodeno' => $add_bluck_data->episodeno,
                'show_wise_description' =>$add_bluck_data->show_wise_description
            ]);

            // Delete Recode
            UploadNewsModule_update::where('id',$add_bluck_data->id)->delete();
        }
        return redirect()->back()->with('success','add successfully');
    }

    public static function updateExcelProgram(Request $request,$id)
    {
        $add_bluck_data = UploadNewsModule_update::find($id);
        if(!empty($add_bluck_data)){
            UploadNewsModule::updateOrCreate([
                'slug'   => $add_bluck_data->slug,
                'program_name' => $add_bluck_data->program_name,
            ],[
                'channel_name' => $add_bluck_data->channel_name,
                'slug' => $add_bluck_data->slug,
                'program_name' => $add_bluck_data->program_name,
                'genre' =>$add_bluck_data->genre,
                'date' => $add_bluck_data->date,
                'time' => $add_bluck_data->time,
                'duration' => $add_bluck_data->duration,
                'description' => $add_bluck_data->description,
                'episodeno' => $add_bluck_data->episodeno,
                'show_wise_description' =>$add_bluck_data->show_wise_description
            ]);

            // Delete Recode
            UploadNewsModule_update::where('id',$add_bluck_data->id)->delete();
        }
        return redirect()->back()->with('success','update successfully');
    }

    public static function postUploadMenuList(Request $request)
    {
        try{
            return UploadNewsModule::postUploadNewsModule($request);
         }catch(\Exception $e){
             session()->flash('error',$e->getMessage());
             return redirect()->route('admin.upload_menu.index');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
