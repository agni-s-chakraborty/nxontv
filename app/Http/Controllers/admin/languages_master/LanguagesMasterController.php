<?php

namespace App\Http\Controllers\admin\languages_master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LanguagesMaster;
use App\Models\ChannelMaster;
use Validator;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;

class LanguagesMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $languages_edit = 0;
        if($request->get('id'))
          $languages_edit =   LanguagesMaster::find($request->get('id'));
        return view('admin.languages_master.index',compact('languages_edit'));
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

            if($request->edit_id){
                $validator = Validator::make($request->all(), [
                    'languages_name' => 'required|unique:languages_master,languages_name,'.$request->edit_id,
                    'languages_short_name' => 'required|unique:languages_master,languages_short_name,'.$request->edit_id,
                ], 
                [
                    'languages_name.unique' => 'The languages name already exist',
                    'languages_short_name.unique' => 'The languages short name already exist'
                ]);
            }else{
                $validator = Validator::make($request->all(), [
                    'languages_name' => 'required|unique:languages_master,languages_name',         
                    'languages_short_name' => 'required|unique:languages_master,languages_short_name|max:3',
                ], 
                [
                    'languages_name.unique' => 'The languages name already exist',
                    'languages_short_name.unique' => 'The languages short name already exist'
                ]);
            }


            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }            
            $data = LanguagesMaster::addLanguagesMaster($request);

            if(isset($request->edit_id)){
                session()->flash('success', trans('messages.languagesMasterUpdate'));
            }else{
                session()->flash('success', trans('messages.languagesMasterCreations'));
            }
            return redirect()->route('admin.languages_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.languages_master.index');
        }
    }

    //Language Master Listing Start
    public static function postLanguagesList(Request $request){ 
        try{
           return LanguagesMaster::postLanguagesList($request);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.languages_master.index');
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
    public static function destroy(Request $request,$id)
    {
        try{
            $languagesData = LanguagesMaster::find($id);
            $data = LanguagesMaster::where('id',$id)->delete();
            if($languagesData){
                ChannelMaster::where('languages_id',$languagesData->id)->delete();
            }  
            session()->flash('success', trans('messages.userDeleted'));
            return Response::json($data);
            // return redirect()->route('admin.languages_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return Response::json($e);
            // return redirect()->route('admin.languages_master.index');
        }   
    }
}
