@extends('admin/layouts/main')

@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!-- DataTables -->
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>أضافة خبر جديد</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li class="active"><a href="{{Url('admin/news')}}">التحكم فى الاخبار</a></li>
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
            'url'=>'admin/news',
            'class'=>'form-horizontal',
            'role'=>'form',
            'method' => 'POST',
            'files'=>true    
            
            ))!!}

            <div class="form-group @if($errors->has('cat_id')) has-error @endif">
             <label  class="col-sm-2 control-label">أختار القسم</label>
              <div class="col-sm-4">

                <select name="cat_id" class="form-control select2" style="width: 100%;">
                  <option selected="selected">أختار القسم</option>
                  @foreach($cats as $cat)
                  <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                  @endforeach          
                </select>
                <strong class="help-block">{{ $errors->first('cat_id') }}</strong> 
             </div>
          </div> 

           <div class="form-group @if($errors->has('name')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">أسم الخبر</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="أسم الخبر">
                <strong class="help-block">{{ $errors->first('name') }}</strong> 
              </div>
           </div>

          <div class="form-group @if($errors->has('image')) has-error @endif" enctype="multipart/form-data">
              <label for="inputEmail3" class="col-md-2 control-label">الصورة الرئيسية للخبر</label>
              <div class="col-md-10">
                <input type="file" class="form-control" name="image" placeholder="صورة العقار">
                <strong class="help-block">{{ $errors->first('image') }}</strong>
              </div>
           </div>


          <div class="form-group @if($errors->has('description')) has-error @endif">
            <label for="inputEmail3" class="col-md-2 control-label">محتوى الخبر</label>
               <div class="box-body pad ">
                 <textarea id="editor" name="description" style="margin: 0px; width: 809px;height: 184px;"></textarea>
                 <strong class="help-block">{{ $errors->first('description') }}</strong> 
              </div>
          </div> 

         <div class="dropzone" id="dropzonefileupload">
           
         </div>








          <div class="text2">
            <div class="col-md-12">
              <button type="submit" class="btn btn-warning">
                <li class=" fa fa-btn fa-save " style="color: #ffffff"></li>
                    أضافة قسم جديد
              </button>
            </div>
          </div><!-- /.box-footer -->

          </div><!-- /.box-body -->

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


@section('footer')
<script>
$(document).ready(function(){
var mydropzone = new Dropzone('#dropzonefileupload'.{
  Url:"{{ url('upload/image/.$news_id') }}"
});
});

</script>
@endsection
@stop