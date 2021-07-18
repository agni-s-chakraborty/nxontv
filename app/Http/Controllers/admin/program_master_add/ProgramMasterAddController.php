<?php

namespace App\Http\Controllers\admin\program_master_add;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChannelMaster;
use App\Models\ProgramMasterAdd;
use Illuminate\Support\Facades\Response;
use Validator;

class ProgramMasterAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $edit_data = 0;
        if($request->get('id'))
            $edit_data =   ProgramMasterAdd::find($request->get('id'));
            $select_chennalName = ChannelMaster::pluck('channel_name','id');
        return view('admin.program_master_add.index',compact('select_chennalName','edit_data'));
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
                'program_name' => 'required',
                'search_chennal_name' => 'required',
                'upload_module' => 'required',
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            $data = ProgramMasterAdd::addProgramMaster($request);

            if(isset($request->edit_id)){
                session()->flash('success', trans('messages.ProgramMasterUpdate'));
            }else{
                session()->flash('success', trans('messages.ProgramMasterCreations'));
            }
            return redirect()->route('admin.program_master_add.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.program_master_add.index');
        }
    }

    // Listing Start
    public static function postProgramList(Request $request){
        try{
           return ProgramMasterAdd::postProgramList($request);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.program_master_add.index');
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
            $data = ProgramMasterAdd::where('id',$id)->delete();

            session()->flash('success', trans('messages.userDeleted'));
            return Response::json($data);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return Response::json($e);
        }
    }
}
