<?php

namespace App\Http\Controllers\admin\programmes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChannelGuide;
use Illuminate\Support\Facades\Response;
use Validator;
use App\Models\OperatorMaster;
use App\Imports\ChennalImport;
use Maatwebsite\Excel\Facades\Excel;

class ChannelGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $select_operator = OperatorMaster::pluck('operator_name','id');
        $edit_data = 0;
        if($request->get('id'))
          $edit_data =   ChannelGuide::find($request->get('id'));
        return view('admin.programmes.channel_guide_index',compact('edit_data','select_operator'));
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
            $validator = Validator::make($request->all(), [
                'operator_name' => 'required',
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            if(!empty($request->chennal_file)){
                if($request->hasFile('chennal_file')){
                    $file = $request->file('chennal_file');
                    $operator_name = $request->operator_name;
                    $chennal_file = $request->chennal_file;
                    Excel::import(new ChennalImport($operator_name,$chennal_file),$file);
                    session()->flash('success', trans('messages.ChannelGuideImport'));
                }
            }else{
                $data = ChannelGuide::addChannelGuide($request);
            }

            if(isset($request->edit_id)){
                session()->flash('success', trans('messages.ChannelGuideUpdate'));
            }else{
                session()->flash('success', trans('messages.ChannelGuideCreations'));
            }
            return redirect()->route('admin.channel_guide.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.channel_guide.index');
        }
    }

    //Channel Guide Listing Start
    public static function postChannelGuideList(Request $request){
        try{
           return ChannelGuide::postChannelGuideList($request);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.operator_master.index');
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
        try{
            $data = ChannelGuide::where('id',$id)->delete();
            session()->flash('success', trans('messages.userDeleted'));
            return Response::json($data);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return Response::json($e);
        }
    }
}
