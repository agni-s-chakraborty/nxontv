<?php

namespace App\Http\Controllers\admin\contact_master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use URL;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Response;
use Validator;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use App\Models\ChannelMaster;
use App\Models\CompnyMaster;
use App\Models\ContactMaster;

class ContactMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $select_compny_name = CompnyMaster::pluck('company_name','id');
        $select_channel_name = ChannelMaster::pluck('channel_name','id');

        $contact_edit = 0;
        if($request->get('id'))
          $contact_edit =  ContactMaster::find($request->get('id'));
        //   echo "<pre>";
        //   print_r($contact_edit);exit;
        return view('admin.contact_master.index',compact('select_compny_name','select_channel_name','contact_edit'));
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
                'addmore.0.company_id' => 'required',         
                'addmore.0.channel_id' => 'required',
                'addmore.*.contact_person' => 'required',         
                'addmore.*.email' => 'required|email',
                'addmore.*.contact' => 'required|numeric',         
                'addmore.*.landline' => 'required|numeric',
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            if(isset($request->edit_id)){
                foreach ($request->addmore as $key => $value) {
                    ContactMaster::where('id',$request->edit_id)->update([
                        'channel_id' => $request->addmore[0]['channel_id'],
                        'company_id' => $request->addmore[0]['company_id'],
                        'contact_person' =>$request->addmore[$key]['contact_person'],
                        'email' =>$request->addmore[$key]['email'],
                        'contact' =>$request->addmore[$key]['contact'],
                        'landline' =>$request->addmore[$key]['landline']
                    ]);    
                }
            }else{ 
                foreach ($request->addmore as $key => $value) {
                    ContactMaster::create([
                        'channel_id' => $request->addmore[0]['channel_id'],
                        'company_id' => $request->addmore[0]['company_id'],
                        'contact_person' =>$request->addmore[$key]['contact_person'],
                        'email' =>$request->addmore[$key]['email'],
                        'contact' =>$request->addmore[$key]['contact'],
                        'landline' =>$request->addmore[$key]['landline']
                    ]);    
                }
            }
            

            if(isset($request->edit_id)){
                session()->flash('success', trans('messages.contactMasterUpdate'));
            }else{
                session()->flash('success', trans('messages.contactMasterCreations'));
            }
            
            return redirect()->route('admin.contact_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.contact_master.index');
        }
    }

    //Channel Master Listing Start
    public static function postContactList(Request $request){ 
        try{
           return ContactMaster::postContactList($request);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.contact_master.index');
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
            $data = ContactMaster::where('id',$id)->delete();
                        
            session()->flash('success', trans('messages.userDeleted'));
            return Response::json($data);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return Response::json($e);
        }   
    }
}
