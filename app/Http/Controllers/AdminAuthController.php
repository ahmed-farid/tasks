<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Mail\AdminResetPassword;
use Carbon\Carbon;
use DB;
use Mail;

class AdminAuthController extends Controller
{
    //
    public function Login() {
    	return view('admin.login');
    }

    public function postLogin() {
    	$rememberme = request('rememberme') == 1 ? true : false;
    	if (auth()->guard('admin')->attempt(['username' => request('username'), 'password' => request('password')]))
    	{
    	 	return redirect('admin');
    	}else{
    		session()->flash('error', 'بيانات المستخدم غير صحيحة');
    	 	return redirect('admin/login');
    	} 
    }

    public function Logout() {
    	auth()->guard('admin')->logout();
    	return redirect('admin/login');
    }

    public function forget_password() {
    	return view('admin.forget_password');
    }

    public function post_forget_password() {
    	$admin = Admin::where('email',request('email'))->first();
    	if (!empty($admin)) {
    		$token = app('auth.password.broker')->createToken($admin);
    		$data = DB::table('password_resets')->insert([
    			'email'     => $admin->email,
    			'token'     => $token,
    			'created_at' => Carbon::now(),
    		]);
    		Mail::to($admin->email)->send(new AdminResetPassword(['data' => $admin,'token' => $token]));
    		session()->flash('success', ' تم ارسال رابط تغير كلمة المرور');
    	}
    	return back();
    }

    public function post_reset_password($token) {
        $this->validate(request(), [
               'password'                 => 'required|confirmed',
               'password_confirmation'    => 'required',
            ],
            [
                'password'                => 'متعين كلمة سر جديدة',
                'password_confirmation'   => 'اعادة تعين كلمة السر مرة اخرى'
        ]);
    	$check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->
    		subHours(2))->first();
    	if (!empty($check_token)) {
    		$admin = Admin::where('email', $check_token->email)->update(['email' => $check_token->email,
    		'password' => bcrypt(request('password'))]);
            DB::table('password_resets')->where('email', request('email'))->delete();
            Auth()->guard('admin')->attempt(['username' => request('username'), 'password' => request('password')]);
            return view('admin.login');
    	}
    }

    public function reset_password($token) {
    	$check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->
    		subHours(2))->first();
    	if (!empty($check_token)) {
    		return view('admin.reset_password', ['data' => $check_token]);
    	}else{
    		return view('admin.forget_password');
    	}
    }
}
