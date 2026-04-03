<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin, App\Models\Member, App\Models\Dinner, App\Models\RoomTarrif, App\Models\AdditionalPackage, App\Models\Payment;
use session;
use Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');    
    }
    public function index(Request $request)
    {
        $package = RoomTarrif::whereIn('status', [0,1,2]);
        $package = $package->orderBy('id', 'desc')->get();
        return view('admin.package.index')->with(['package'=>$package]);
    }
    public function edit($id)
    {
        $package = RoomTarrif::where('id', $id)->first();
        return response()->json(['package'=>$package]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required|min:2|max:250|unique:room_tarrif,title,'.$request->id
        ],[
            'title.required'=>'Package name is required',
        ]);
        try {
            if(isset($request->id) && !empty($request->id)){
                $msg = 'Package has been Updated Successfully';
            } else {
                $msg = 'Package has been Stored Successfully';
            }
            
            RoomTarrif::updateOrCreate([
                'id'=>$request->id,
            ],[
                'title'=> $request->title,
                'start_date'=>$request->start_date,
                'no_of_days'=>$request->no_of_days,
                'single_bed'=>$request->single_bed,
                'single_bed_price'=>$request->single_bed_price,
                'double_bed'=>$request->double_bed,
                'double_bed_price'=>$request->double_bed_price,
            ]);
            return back()->with(['status'=>true, 'msg'=>$msg]);
        } catch (\Throwable $th) {
            dd($th);
            return back()->with(['status'=>false, 'msg'=>'Failed to Stored']);
        }
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        if(isset($id) && !empty($id)){
            RoomTarrif::where('id', $id)->delete();
            return back()->with(['status'=>true, 'msg'=>'Package has been deleted successfully']);    
        } else {
            return back()->with(['status'=>false, 'msg'=>'Failed to delete']);
        }
    }
    public function status($id, $status)
    {
        if($status == 2){
            RoomTarrif::where('id', $id)->update(['status'=>$status]);
            return ['status'=>true, 'msg'=>'Package has been In-Active successfully'];        
        } else if($status == 1){
            RoomTarrif::where('id', $id)->update(['status'=>$status]);
            return ['status'=>true, 'msg'=>'Package has been Active successfully'];        
        }
    }
}