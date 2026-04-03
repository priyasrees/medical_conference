<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin, App\Models\Member, App\Models\Dinner, App\Models\RoomTarrif, App\Models\AdditionalPackage, App\Models\Categorys, App\Models\Plan;
use session;
use Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');    
    }
    public function index(Request $request)
    {
        $plan = Plan::whereIn('status', [0,1,2]);
        $plan = $plan->orderBy('id', 'asc')->get();
        $category = Categorys::where('status',1)->get();
        return view('admin.plan.index')->with(['plan'=>$plan, 'category'=>$category]);
    }
    public function edit($id)
    {
        $plan = Plan::where('id', $id)->first();
        $category = Categorys::where('status',1)->get();
        return response()->json(['plan'=>$plan, 'category'=>$category]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'other'=>'required|min:2|max:250',
        ],[
            'other.required'=>'Plan name is required',
        ]);
        try {
            if(isset($request->id) && !empty($request->id)){
                $msg = 'Plan has been Updated Successfully';
            } else {
                $msg = 'Plan has been Stored Successfully';
            }
            //dd($request);
            Plan::updateOrCreate([
                'id'=>$request->id,
            ],[
                'category'=> $request->category,
                'start_date'=>$request->start_date,
                'no_of_days'=>$request->no_of_days,
                'plan_date'=>$request->plan_date,
                'other'=>$request->other,
                'amount'=>$request->amount,
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
            Plan::where('id', $id)->delete();
            return back()->with(['status'=>true, 'msg'=>'Plan has been deleted successfully']);    
        } else {
            return back()->with(['status'=>false, 'msg'=>'Failed to delete']);
        }
    }
    public function status($id, $status)
    {
        if($status == 2){
            Plan::where('id', $id)->update(['status'=>$status]);
            return ['status'=>true, 'msg'=>'Plan has been In-Active successfully'];        
        } else if($status == 1){
            Plan::where('id', $id)->update(['status'=>$status]);
            return ['status'=>true, 'msg'=>'Plan has been Active successfully'];        
        }
    }
}