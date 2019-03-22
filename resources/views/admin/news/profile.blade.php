@extends('admin/layouts/main')

@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!-- DataTables -->
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> تفاصيل بيانات الخبر:
            {{ $news->name }}</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li class="active"><a href="{{Url('admin/categorys')}}">التحكم فى الاقسام</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
          <div class="box-header">
          </div>
          <!-- /.box-header -->
           <div class="box-body">
            <!-- form start -->

          {!!Form::open(array(
              'url'=>'admin/news/'.$news->id,
              'class'=>'form-horizontal',
              'role'=>'form',
              'method' => 'put',
              'files'=>true
          ))!!}

          <div class="form-group">
              <label  class="col-md-2 control-label">أختار نوع العقار</label>
              <div class="col-md-10">
                <select name="cat_id" disabled="true" class="form-control select2" style="width: 100%;">
                  @foreach($categorys as $category)
                  @if ($news->cat_id == $category->id)
                  <option value="{{$category->id}}" selected="selected">{{$category->category_name}}</option>
                  @endif
                  <option value="{{$category->id}}">{{$category->category_name}}</option>
                  @endforeach          
                </select>
              </div>
            </div>

          <div class="form-group @if($errors->has('name')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">أسم الخبر </label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name" value="{{$news->name}}" readonly placeholder="أسم القسم">
                <strong class="help-block">{{ $errors->first('name') }}</strong>
              </div>  
           </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-md-2 control-label"> صورة البرنامج</label>
            <div class="col-md-10">
              <input type="file" class="form-control" name="image"  value="{{$news->image}}">
              <img height="80px" width="80px" src="{{asset('public/'.$news->image)}}"/>
            </div>
          </div>

          <div class="form-group @if($errors->has('description')) has-error @endif">
            <label for="inputEmail3" class="col-md-2 control-label" >محتوى الخبر</label>
               <div class="box-body pad ">
                 <textarea id="editor" name="description"  style="margin: 0px; width: 809px;height: 184px;">{{$news->description}}</textarea>
                 <strong class="help-block">{{ $errors->first('description') }}</strong> 
              </div>
          </div>  

          
          </div><!-- /.box-body -->


            <!-- form start -->







          </div>
            
          </div>
          <!-- /.box-header -->         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
 
 </section><!-- /.content -->
</div><!-- /.content-wrapper -->



@stop