<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use App\Models\Admin;
use Hash;
use DB;

class LoginController extends Controller
{
    protected $redirectTo = 'admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('login');   
    }
    public function login()
    {
        return view('admin.login');
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|min:6|max:50',
            'password' => 'required|min:6|max:18',
        ],[
            'email.required'=>'Email is required',
            'email.email'=>'Email is Invalid',
            'email.min'=>'Your email must be at least 3 characters long',
            'email.max'=>'Your email must be at least 50 characters long',
            'password.required'=>'Password is required',
            'password.min'=>'Your password must be at least 6 characters long',
            'password.max'=>'Your email must be at least 18 characters long',
        ]);
        
        $check_user_available = Admin::where('email', $request->email)->first();
        if(empty($check_user_available)){
            return back()->withError(['email'=>'Email Address is not available. please enter correct email address']);
        } else {
            if($check_user_available->status ==0){
                return back()->withError(['email'=>'Please Contact Admin Team. User login is blocked.']);
            }
        }
        $credentials = $request->only('email', 'password');
        
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');
        \Artisan::call('view:clear');
        \Artisan::call('route:clear');
                
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('admin/dashboard')->with(['status'=>true, 'msg'=>'Login Successfully']);
        } else {
            return back()->with(['status'=>false, 'msg'=>'Invalid Credentials']);
        }
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function catergory()
    {
        return view('admin.catergory.index');
    }
    public function subCatergory()
    {
        return view('admin.sub_catergory.index');
    }
    public function productCreate()
    {
        return view('admin.product.add-edit');
    }
    public function product()
    {
        return view('admin.product.index');
    }
    public function favorite()
    {
        return view('admin.product.favorite');
    }
    public function review()
    {
        return view('admin.product.review');
    }
    public function coupon()
    {
        return view('admin.coupon.index');
    }
    public function order()
    {
        return view('admin.order.index');
    }
    public function customer()
    {
        return view('admin.customer.index');
    }
    public function setting()
    {
        return view('admin.setting.index');
    }
    public function lead()
    {
        return view('admin.setting.lead');
    }
    
}
