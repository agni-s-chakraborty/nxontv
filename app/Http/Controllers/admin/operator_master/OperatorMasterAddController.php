<?php

namespace App\Http\Controllers\admin\operator_master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OperatorMaster;
use Illuminate\Support\Facades\Response;
use Validator;

class OperatorMasterAddController extends Controller
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
          $edit_data =   OperatorMaster::find($request->get('id'));
        return view('admin.operator_master.index',compact('edit_data'));
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

            $data = OperatorMaster::addOperatorMaster($request);

            if(isset($request->edit_id)){
                session()->flash('success', trans('messages.OperatorMasterUpdate'));
            }else{
                session()->flash('success', trans('messages.OperatorMasterCreations'));
            }
            return redirect()->route('admin.operator_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.operator_master.index');
        }
    }

    //Operator Master Listing Start
    public static function postOperatorList(Request $request){
        try{
           return OperatorMaster::postOperatorList($request);
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
            $data = OperatorMaster::where('id',$id)->delete();
            session()->flash('success', trans('messages.userDeleted'));
            return Response::json($data);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return Response::json($e);
        }
    }
}
