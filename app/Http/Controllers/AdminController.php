<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;
use Session;
use Redirect;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::all();
        $title  = ('حسابات المشرفين');
        return view('admin.admin.index',compact('admins','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title  = ('أضافة مشرف جديد');
        return view('admin.admin.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate($request, 
            [
                'username'     => 'required|max:255|unique:admins',
                'email'        => 'required|email|max:255|unique:admins',
                'password'     => 'required|min:6|confirmed',
            ],
            [
                'username.required'           => 'مطلوب ادخال اسم المستخدم  ',
                'username.unique'             => ' اسم المستخدم موجود من قبل ',
                'email.required'              => ' مطلوب ادخال البريد الإلكتروني ',
                'email.unique'                => ' البريد الالكترونى موجود لدينا ',
                'password.required'           => ' مطلوب ادخال كلمة المرور ', 
                'password.confirmed'          => 'كلمة المرور غير مطابقة',
                'password.min'                => 'كلمة المرور لا تقل عن 6 أرقام',
            ]);
        $data['password'] = bcrypt(request('password'));
        Admin::create($data);
        Session::flash('save','تم أضافة المستخدم بنجاح');
        return Redirect('admin/admin');
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
        $admin  = Admin::find($id);
        $title  = (' تحديث بيانات المشرف ');
        return view('admin.admin.edit',compact('admin','title'));
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
        $data = $this->validate($request, 
            [
                'username'     => 'required',
                'email'        => 'required|email|unique:admins,email,'.$id,
                'password'     => 'sometimes|nullable|min:6|confirmed',
            ],
            [
                'username.unique'             => ' اسم المستخدم موجود من قبل ',
                'email.required'              => ' مطلوب ادخال البريد الإلكتروني ',
                'email.unique'                => ' البريد الالكترونى موجود لدينا ',
                'password.confirmed'          => 'كلمة المرور غير مطابقة',
                'password.min'                => 'كلمة المرور لا تقل عن 6 أرقام',
            ]);
        if (request()->has('password')) {
            $data['password'] = bcrypt(request('password'));
        }
        Admin::where('id', $id)->update($data);
        Session::flash('save',' تم تحديث بيانات المشرف بنجاح ');
        return Redirect('admin/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if($id == 1){
          Session::flash('error','لا يمكنك حذف المسئول الرئيسى');
          return Redirect('admin/admin');
        }
        
        $delete = Admin::find($id); 
        $delete->delete();
        Session::flash('save','تم حذف المشرف بنجاح');
        return Redirect('admin/admin');
    }
}
