<?php

namespace App\Http\Controllers\admin\program_sub_genre_master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramSubGenreMaster;
use Validator;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;

class ProgramSubGenreMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pro_sub_edit = 0;
        if($request->get('id'))
          $pro_sub_edit =   ProgramSubGenreMaster::find($request->get('id'));

        return view('admin.program_sub_genre_master.index',compact('pro_sub_edit'));
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
                'genre_name' => 'required',
                'genre_icon' => 'required|mimes:jpeg,png,jpg',
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            $data = ProgramSubGenreMaster::addProgramSubGenreMaster($request);
            if(isset($request->edit_id)){
                session()->flash('success', trans('messages.programSubGenreMasterUpdate'));
            }else{
                session()->flash('success', trans('messages.programSubGenreMasterCreations'));
            }
            
            return redirect()->route('admin.program_sub_genre_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.program_sub_genre_master.index');
        }
    }

    

    //Program Sub Genre Master Listing Start
    public static function postProgramSubChannelGenreList(Request $request){ 
        try{
           return ProgramSubGenreMaster::postProgramSubChannelGenreList($request);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.program_sub_genre_master.index');
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
            // $userData = User::find($id);
            $data = ProgramSubGenreMaster::where('id',$id)->delete();
            
            session()->flash('success', trans('messages.userDeleted'));
            return Response::json($data);
            // return redirect()->route('admin.user_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return Response::json($e);
            // return redirect()->route('admin.user_master.index');
        }   
    }
}
