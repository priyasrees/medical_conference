<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Dinner;
use session;

class DinnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');    
    }
    public function index(Request $request)
    {
        $dinner = Dinner::whereIn('status', [0,1,2]);
        $dinner = $dinner->orderBy('id', 'desc')->get();
        return view('admin.dinner.index')->with(['dinner'=>$dinner]);
    }
    public function edit($id)
    {
        $dinner = Dinner::where('id', $id)->first();
        return response()->json(['dinner'=>$dinner]);
    }
    public function store(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'name'=>'required|min:2|max:250|unique:dinner,name,'.$request->id
        ],[
            'name.required'=>'Dinner Name is required',
        ]);
        try {
            if(isset($request->id) && !empty($request->id)){
                $msg = 'Dinner has been Updated Successfully';
            } else {
                $msg = 'Dinner has been Stored Successfully';
            }
            $document = '';
            if (request()->hasFile('document')) {
                $document = $this->imageUpload(request()->file('profile'), '/upload/document/');
            } else {
                $document = $request->document1;
            }
            Dinner::updateOrCreate([
                'id'=>$request->id,
            ],[
                'name'=> $request->name,
                'text'=> $request->text,
                'price'=> $request->price,
                'usd_price'=> $request->usd_price,
                'start_date'=> $request->start_date,
                'no_of_days'=> $request->no_of_days,
                'document'=> $document,
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
            Dinner::where('id', $id)->delete();
            return back()->with(['status'=>true, 'msg'=>'Dinner has been deleted successfully']);    
        } else {
            return back()->with(['status'=>false, 'msg'=>'Failed to delete']);
        }
    }
    public function status($id, $status)
    {
        if($status == 2){
            Dinner::where('id', $id)->update(['status'=>$status]);
            return ['status'=>true, 'msg'=>'Dinner has been In-Active successfully'];        
        } else if($status == 1){
            Dinner::where('id', $id)->update(['status'=>$status]);
            return ['status'=>true, 'msg'=>'Dinner has been Active successfully'];        
        }
    }
}
