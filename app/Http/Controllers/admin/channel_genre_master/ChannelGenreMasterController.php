<?php

namespace App\Http\Controllers\admin\channel_genre_master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use App\Models\ChannelGenreMaster;
use App\Models\ChannelMaster;
use Illuminate\Support\Facades\Response;

class ChannelGenreMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $channel_genre_master_list=ChannelGenreMaster::get();
        $chennel_genre = 0;
        if($request->get('id'))
          $chennel_genre =   ChannelGenreMaster::find($request->get('id'));

        if ($request->ajax()) {
            return DataTables::of($channel_genre_master_list)
                ->addColumn('genre_name', function ($channel_genre_master_list) {
                    return "$channel_genre_master_list->genre_name";
                })
                ->addColumn('genre_short_name', function ($channel_genre_master_list) {
                    return "$channel_genre_master_list->genre_short_name";
                })

                ->addColumn('genre_icon', function ($channel_genre_master_list) {
                    return "$channel_genre_master_list->genre_icon";
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('admin.channel_genre_master.index',compact('chennel_genre'));
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
                'genre_short_name' => 'required|min:2',
                'genre_icon' => 'required|mimes:jpeg,png,jpg',
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            $data = ChannelGenreMaster::addChannelGenreMaster($request);

            if(isset($request->edit_id)){
                session()->flash('success', trans('messages.channelGenreMasterUpdate'));
            }else{
                session()->flash('success', trans('messages.channelGenreMasterCreations'));
            }
            return redirect()->route('admin.channel_genre_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.channel_genre_master.index');
        }
    }

    //User Master Listing Start
    public static function postChannelGenreList(Request $request){
        try{
           return ChannelGenreMaster::postChannelGenreList($request);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.channel_genre_master.index');
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
            $channelGenreData = ChannelGenreMaster::find($id);
            $data = ChannelGenreMaster::where('id',$id)->delete();
            if($channelGenreData){
                ChannelMaster::where('channel_genre_id',$channelGenreData->id)->delete();
            }

            session()->flash('success', trans('messages.userDeleted'));
            return Response::json($data);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return Response::json($e);
        }
    }
}
