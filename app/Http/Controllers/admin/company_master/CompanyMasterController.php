<?php

namespace App\Http\Controllers\admin\company_master;

use App\DataTables\CompnyMasterDataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompnyMaster;
use App\Models\ChannelMaster;
use App\Models\ContactMaster;
use Validator;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;

class CompanyMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $compnyMaster_listing = CompnyMaster::get();

        $company_edit = 0;
        if($request->get('id'))
        $company_edit =   CompnyMaster::find($request->get('id'));

        if ($request->ajax()) {
            return DataTables::of($compnyMaster_listing)
                ->addColumn('company_name', function ($compnyMaster_listing) {
                    return "$compnyMaster_listing->company_name";
                })
                ->addColumn('pan_number', function ($compnyMaster_listing) {
                    return "$compnyMaster_listing->pan_number";
                })
                ->addColumn('representative_name', function ($compnyMaster_listing) {
                    return "$compnyMaster_listing->representative_name";
                })
                ->addColumn('contact', function ($compnyMaster_listing) {
                    return "$compnyMaster_listing->contact";
                })
                ->addColumn('address', function ($compnyMaster_listing) {
                    return "$compnyMaster_listing->address";
                })
                ->rawColumns(['action'])
                ->make(true);
        }



        return view('admin.company_master.index',compact('compnyMaster_listing','company_edit'));

//        return $dataTables->render('admin.company_master.index',compact('company_edit'));
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
        // echo "<pre>";
        // print_r($request->toarray());exit;
        try{
            if(isset($request->edit_id)){
                $validator = Validator::make($request->all(), [
                    'company_name' => 'required|unique:company_masters,company_name,'.$request->edit_id,
                    // 'pan_number' => 'required|unique:company_masters,pan_number|min:10|max:10,'.$request->edit_id,
                ],
                [
                    'company_name.unique' => 'The company name already exist',
                    'pan_number.unique' => 'The pan number already exist',
                    'contact.min' => 'Enter your number followed by country code'
                ]);
            }else{
                $validator = Validator::make($request->all(), [
                    'company_name' => 'required|unique:company_masters',
                    'contact' => 'required|min:13|max:13|size:13',
                    'address' => 'required',
                    // 'pan_number' => 'required|unique:company_masters|min:10|max:10|size:10',
                    'representative_name' => 'required',
                ],
                [
                    'company_name.unique' => 'The company name already exist',
                    // 'pan_number.unique' => 'The pan number already exist',
                    'contact.min' => 'Enter your number followed by country code'
                ]);
            }

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            $data = CompnyMaster::addCompnyMaster($request);

            if(isset($request->edit_id)){
                session()->flash('success', trans('messages.compnyMasterUpdate'));
            }else{
                session()->flash('success', trans('messages.compnyMasterCreations'));
            }

            return redirect()->route('admin.company_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.company_master.index');
        }
    }

    //Company Master Listing Start
    public static function postCompnayList(Request $request){
        try{
           return CompnyMaster::postCompnayList($request);
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('admin.company_master.index');
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
            $companyData = CompnyMaster::find($id);
            $data = CompnyMaster::where('id',$id)->delete();
            if($companyData){
                ChannelMaster::where('company_id',$companyData->id)->delete();
                ContactMaster::where('company_id',$companyData->id)->delete();
            }
            session()->flash('success', trans('messages.userDeleted'));
            return Response::json($data);
            // return redirect()->route('admin.company_master.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return Response::json($e);
            // return redirect()->route('admin.company_master.index');
        }
    }
}
