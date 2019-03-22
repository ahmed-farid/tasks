<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\News;
use App\Model\Category;
use Session;
use Redirect;
use Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $news = News::orderBy('id', 'asc')->paginate(6);
        if ($request->has('name')) {
            $news = News::where(function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->input('name') . '%');
            })->paginate(20);
        }
      
        $title  = ('التحكم فى الاخبار');
        return view('admin.news.index',compact('news', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cats = Category::all();
        $title  = ('أضافة خبر جديد');
        return view('admin.news.create',compact('cats','title'));
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
            'cat_id'                   => 'required',
            'name'                     => 'required',
            'image'                    => 'required',
            'description'              => 'required',
        ],
        [
            'cat_id.required'          => 'مطلوب اختيار القسم',
            'name.required'            => 'مطلوب ادخال اسم الخبر',
            'image.required'           => 'مطلوب ادخال صورة الخبر',
            'description.required'     => 'مطلوب ادخال محتوى الخبر',
            
        ]);
        $news = News::create($request->except('image'));

        if($request->hasFile('image')){
            $path = public_path();
            $destinationPath = '';
            $filename        = '';
            $destinationPath = $path.'/uploads/Staff'; // upload path
            $image= $request->file('image');
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
            $image->move($destinationPath, $name); // uploading file to given path
            $news->image  = 'uploads/Staff/'.$name ;
        }
        $news->save();
      Session::flash('save','تم أضافة الاعلان بنجاح');
      return Redirect('admin/news');

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
        $news = News::find($id);
        $categorys = Category::all();
        $title  = ('تفاصيل الخبر');
        return view('admin.news.profile', compact('news','title', 'categorys'));
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
        $news = News::find($id);
        $categorys = Category::all();
        $title  = (' تتحديث بيانات الخبر');
        return view('admin.news.edit', compact('news','title', 'categorys'));
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
        
        $this->validate($request, 
        [
            'cat_id'                   => 'required',
            'name'                     => 'required',
            'description'              => 'required',
        ],
        [
            'cat_id.required'          => 'مطلوب اختيار القسم',
            'name.required'            => 'مطلوب ادخال اسم الخبر',
            'description.required'     => 'مطلوب ادخال محتوى الخبر',
            
        ]);

        $news = News::find($id);
        $news->update(array_except($request->all(),'image'));
        if($request->hasFile('image')){
            $path = public_path();
            $destinationPath = '';
            $filename        = '';
            $destinationPath = $path.'/uploads/News'; // upload path
            $image= $request->file('image');
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
            $image->move($destinationPath, $name); // uploading file to given path
            $news->image  = 'uploads/News/'.$name ;
            $news->update(['image' => 'uploads/News/'.$name]);
        }
        Session::flash('save','تم تحديث بيانات الخبر بنجاح');
        return Redirect('admin/news');
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
        $delete = News::find($id);
        $delete->delete();
        Session::flash('save','تم حذف الخبر');
        return Redirect('admin/news');
    }
}
