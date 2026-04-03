<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Training;
use session;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');    
    }
    public function index(Request $request)
    {
        $training = Training::whereIn('status', [0,1,2]);
        $training = $training->orderBy('id', 'desc')->get();
        return view('admin.training.index')->with(['training'=>$training]);
    }
    public function edit($id)
    {
        $training = Training::where('id', $id)->first();
        return response()->json(['training'=>$training]);
    }
    public function store(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'text'=>'required|min:2|max:250|unique:training,text,'.$request->id,
            'price'=>'required',
            'usd_price'=>'required',
            'user'=>'required',
            'join_user'=>'required',
            
        ],[
            'text.required'=>'Training Name is required',
            'price.required'=>'required',
            'usd_price.required'=>'required',
            'user.required'=>'required',
            'join_user.required'=>'required',
        ]);
        try {
            if(isset($request->id) && !empty($request->id)){
                $msg = 'Training has been Updated Successfully';
            } else {
                $msg = 'Training has been Stored Successfully';
            }
            
            Training::updateOrCreate([
                'id'=>$request->id,
            ],[
                'text'=> $request->text,
                'price'=> $request->price,
                'usd_price'=> $request->usd_price,
                'user'=> $request->user,
                'join_user'=> $request->join_user,
                'status'=> 1,
            ]);
            return back()->with(['status'=>true, 'msg'=>$msg]);
        } catch (\Throwable $th) {
            return back()->with(['status'=>false, 'msg'=>'Failed to Stored']);
        }
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        if(isset($id) && !empty($id)){
            Training::where('id', $id)->delete();
            return back()->with(['status'=>true, 'msg'=>'Training has been deleted successfully']);    
        } else {
            return back()->with(['status'=>false, 'msg'=>'Failed to delete']);
        }
    }
    public function status($id, $status)
    {
        if($status == 2){
            Training::where('id', $id)->update(['status'=>$status]);
            return ['status'=>true, 'msg'=>'Training has been In-Active successfully'];        
        } else if($status == 1){
            Training::where('id', $id)->update(['status'=>$status]);
            return ['status'=>true, 'msg'=>'Training has been Active successfully'];        
        }
    }
}
