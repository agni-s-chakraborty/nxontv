<?php

namespace App\Http\Controllers\admin\program_genre_master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramGenreMaster;
use Validator;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;

class ProgramGenreMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pro_genre_edit = 0;
        if($request->get('id'))
          $pro_genre_edit =   ProgramGenreMaster::find($request->get('id'));

        return view('admin.program_genre_master.index',compact('pro_genre_edit'));
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

            $data = ProgramGenreMaster::addProgramGenreMaster($request);

            if(isset($request->edit_id)){
                session()->flash('success', trans('messages.programGenreMasterUpdate'));
            }else{
                session()->flash('success', trans('messages.programGenreMasterCreations'));
            }
            return redirect()->route('admin.program_genre_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.program_genre_master.index');
        }
    }

    //Program Genre Master Listing Start
    public static function postProgramChannelGenreList(Request $request){ 
        try{
           return ProgramGenreMaster::postProgramChannelGenreList($request);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.program_genre_master.index');
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
            $data = ProgramGenreMaster::where('id',$id)->delete();
            
            session()->flash('success', trans('messages.userDeleted'));
            return Response::json($data);
            // return redirect()->route('admin.program_genre_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return Response::json($e);
            // return redirect()->route('admin.program_genre_master.index');
        }   
    }
}
