<?php

namespace App\Http\Controllers\admin\channel_master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompnyMaster;
use App\Models\ChannelGenreMaster;
use App\Models\LanguagesMaster;
use App\Models\ChannelMaster;
use App\Models\ContactMaster;
use URL;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Response;
use Validator;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class ChannelMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $select_compny_name = CompnyMaster::pluck('company_name','id');
        $select_genre_name = ChannelGenreMaster::pluck('genre_name','id');
        $select_languages_name = LanguagesMaster::pluck('languages_name','id');
        $select_status = Helper::getStatusArray();
        $getChannelLogoone =  Helper::displayChannellogoone();
        $getChannelLogotwo =  Helper::displayChannellogotwo();
        $getChannelLogothree =  Helper::displayChannellogothree();
        $select_channel_catchup = Helper::getCatchupArray();

        $chennel = 0;
        if($request->get('id'))
          $chennel =   ChannelMaster::find($request->get('id'));

        return view('admin.channel_master.index',compact('select_compny_name','select_genre_name','select_languages_name','select_status','getChannelLogothree','getChannelLogotwo','getChannelLogoone','chennel','select_channel_catchup'));
    }

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
            if(isset($request->edit_chennal_id)){
                $validator = Validator::make($request->all(), [
                    'channel_name' => 'required|unique:channel_master,channel_name,'.$request->edit_chennal_id,
                ], 
                [
                    'channel_name.unique' => 'The channel name already exist'
                ]);
            }else{
                $validator = Validator::make($request->all(), [
                    'company_id' => 'required',         
                    'channel_name' => 'required|unique:channel_master'.$request->id,
                    'channel_genre_id' => 'required',
                    'languages_id' => 'required',         
                    'channel_description' => 'required',         
                    'region' => 'required',
                    'channel_catchup' => 'required',         
                    'channel_trp' => 'required',
                    'status' => 'required',         
                    'channel_logo_1' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:max_width=720,max_height=540',   
                    'channel_logo_2' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:max_width=720,max_height=720',   
                    'channel_logo_3' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:max_width=151,max_height=85',
                ], 
                [
                    'channel_name.unique' => 'The channel name already exist'
                ]);
            }

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            $data = ChannelMaster::addChannelMaster($request);

            if(isset($request->edit_chennal_id)){
                session()->flash('success', trans('messages.channelMasterUpdate'));
            }else{
                session()->flash('success', trans('messages.channelMasterCreations'));
            }
            return redirect()->route('admin.channel_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.channel_master.index');
        }
    }

    //Channel Master Listing Start
    public static function postChannelList(Request $request){ 
        try{
           return ChannelMaster::postChannelList($request);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.channel_master.index');
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
        $channelShowData = ChannelMaster::with('company','languages','chanelgenre')->find($id);
        return Response::json($channelShowData);
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
    public static function destroy(Request $request,$id)
    {
        try{
            
            $channelMasterData = ChannelMaster::find($id);
            $data = ChannelMaster::where('id',$id)->delete();
            if($channelMasterData){ 
                ContactMaster::where('channel_id',$channelMasterData->id)->delete(); 
            }   
            
            session()->flash('success', trans('messages.userDeleted'));
            return Response::json($data);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return Response::json($e);
        }   
    }
}
