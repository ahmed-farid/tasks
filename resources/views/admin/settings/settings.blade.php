@extends('admin/layouts/main')

@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!-- DataTables -->
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> إعدادات الموقع </h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
          <div class="box">
           <?php $save_chack = Session::get('save');?>
           @if(!empty($save_chack))
           <div class="container-fluid">
            <div class="alert alert-dismissable alert-success">
              <button class="close" aria-hidder="true" data-dismiss="alert">&times;</button>
              <h4>{{Session::get('save') }}</h4>

            </div>
          </div>
          @endif

          <?php $error_check = Session::get('error');?>
          @if(!empty($error_check))
          <div class="container-fluid">
            <div class="alert alert-dismissable alert-danger">
              <button class="close" aria-hidder="true" data-dismiss="alert">&times;</button>
              <h4>{{Session::get('error') }}</h4>

            </div>
          </div>
          @endif
          <div class="box-header">
          </div>
          <!-- /.box-header -->
           <div class="box-body">
            <!-- form start -->
          {!!Form::open(array(
            'url'=>'admin/settings',
            'class'=>'form-horizontal',
            'role'=>'form',
            'method' => 'POST',
            'files'=>true    
            
            ))!!}

           <div class="form-group @if($errors->has('site_name')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">أسم الموقع</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="site_name" value="{{setting()->site_name}}" placeholder="الاسم الاول">
                <strong class="help-block">{{ $errors->first('site_name') }}</strong> 
              </div>
           </div>

           <div class="form-group @if($errors->has('email')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">البريد الالكترونى</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="email" value="{{setting()->email}}"  placeholder="البريد الالكترونى">
                <strong class="help-block">{{ $errors->first('email') }}</strong> 
              </div>  
           </div>

          <div class="form-group @if($errors->has('keywords')) has-error @endif">
            <label for="inputEmail3" class="col-md-2 control-label">الكلمات الدالة</label>
               <div class="box-body pad ">
                 <textarea id="editor" name="keywords" style="margin: 0px; width: 809px;height: 184px;"> {{setting()->keywords}} </textarea>
                 <strong class="help-block">{{ $errors->first('keywords') }}</strong> 
              </div>
          </div>

          <div class="form-group @if($errors->has('description')) has-error @endif">
            <label for="inputEmail3" class="col-md-2 control-label">وصف الموقع</label>
               <div class="box-body pad ">
                 <textarea id="editor" name="description" style="margin: 0px; width: 809px;height: 184px;"> {{setting()->description}} </textarea>
                 <strong class="help-block">{{ $errors->first('description') }}</strong> 
              </div>
          </div>

          <div class="form-group @if($errors->has('site_state')) has-error @endif">
            <label  class="col-md-2 control-label">حالة الموقع</label>
            <div class="col-md-10">
              <select name="site_state" class="form-control select2" style="width: 100%;">
                <option selected disabled>حالة الموقع</option>
                <option value="0" {{setting()->site_state == 0 ?: "selected"}} >يعمل</option>
                <option value="1" {{setting()->site_state == 1 ?: "selected"}} >لايعمل</option>
              </select>
              <strong class="help-block">{{ $errors->first('site_state') }}</strong>  
            </div>
          </div>  

          <div class="form-group @if($errors->has('massage_state')) has-error @endif">
            <label for="inputEmail3" class="col-md-2 control-label">وصف الموقع</label>
               <div class="box-body pad ">
                 <textarea id="editor" name="massage_state" style="margin: 0px; width: 809px;height: 184px;"> {{setting()->massage_state}} </textarea>
                 <strong class="help-block">{{ $errors->first('massage_state') }}</strong> 
              </div>
          </div>        

          <div class="text2">
            <div class="col-md-12">
              <button type="submit" class="fa fa-dashboard">
                <li style="color: #ffffff"></li>
                 تعديل بيانات الموقع
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
@stop