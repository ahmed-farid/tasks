<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Category;
use Session;
use Redirect;
use Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cats = Category::orderBy('id', 'asc')->paginate(6);
        if ($request->has('category_name')) {
            $cats = Category::where(function ($q) use ($request) {
                $q->where('category_name', 'LIKE', '%' . $request->input('category_name') . '%');
            })->paginate(20);
        }
        $title = ('التحكم فى الاقسام');
        return view('admin.categorys.index', compact('cats', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title  = (' أضافة قسم جديد ');
        return view('admin.categorys.create',compact('title'));
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
        $this->validate($request, 
        [
            'category_name'           => 'required|unique:categories',
        ],
        [
            'category_name.required'  => 'مطلوب ادخال اسم القسم',
            'category_name.unique'    => ' اسم القسم موجود لدينا من قبل',
        ]);

        $cats = Category::create($request->all());

        if($cats->save())
        {
            Session::flash('save',' تم أضافة قسم جديد بنجاح ');
            return Redirect('admin/categorys');
        }else{
         Session::flash('error','حدث خطا حاول مرة اخرى');
         return Redirect('admin/categorys');
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
        $cat = Category::find($id);
        $title  = (' تحديث بيانات القسم ');
        return view('admin.categorys.edit', compact('cat','title'));
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

        $this->validate($request, 
        [
            'category_name'           => 'required|unique:categories',
        ],
        [
            'category_name.required'  => 'مطلوب ادخال اسم القسم',
            'category_name.unique'    => ' اسم القسم موجود لدينا من قبل',
        ]);
        $cats = Category::find($id);
        $cats->fill($request->all())->save();

        if($cats->save())
        {
           Session::flash('save',' تم تعديل بيانات القسم بنجاح ');
           return Redirect('admin/categorys');
       }else{
        Session::flash('error','حدث خطا حاول التسجيل مرة اخرى');
        return Redirect('categorys/'.$id.'/edit');
    }
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
     $delete = Category::find($id);
     $delete->delete();
     Session::flash('save','تم حذف القسم');
     return Redirect('admin/categorys');
 }
}
