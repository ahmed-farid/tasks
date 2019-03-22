@extends('admin/layouts/main')

@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!-- DataTables -->
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> تحديث بيانات المشرف :
            {{ $admin->username }}</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li class="active"><a href="{{Url('admin/admin')}}"> حسابات المشرفين</a></li>
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
              'url'=>'admin/admin/'.$admin->id,
              'class'=>'form-horizontal',
              'role'=>'form',
              'method' => 'put',
              'files'=>true
          ))!!}

          <div class="form-group @if($errors->has('username')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">أسم المستخدم</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="username" value="{{$admin->username}}" placeholder="الاسم الاول">
                <strong class="help-block">{{ $errors->first('username') }}</strong>
              </div>  
           </div>

           <div class="clearfix"></div>

          <div class="form-group @if($errors->has('email')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">البريد الالكترونى</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="email" value="{{$admin->email}}"  placeholder="البريد الالكترونى">
                 <strong class="help-block">{{ $errors->first('email') }}</strong>
              </div>
                 
           </div>

           <div class="clearfix"></div>

            <div class="form-group @if($errors->has('password')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label"> اعادة تعيين كلمة المرور </label>
              <div class="col-md-10">
                <input type="password" class="form-control" name="password"  placeholder="اكلمة المرور">
                <strong class="help-block">{{ $errors->first('password') }}</strong>
              </div>
           </div>

           <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label"> اعادة تعيين كلمة المرور </label>
              <div class="col-md-10">
                <input type="password" class="form-control" name="password_confirmation" placeholder= "اعادة تعيين كلمة المرور ">
                <strong class="help-block">{{ $errors->first('password_confirmation') }}</strong>
              </div>
           </div>
          

           <div class="text2">
            <div class="col-md-12">
              <button type="submit" class="btn btn-warning">
                <li class=" fa fa-btn fa-admin " style="color: #ffffff"></li>
                تحديث بيانات المشرف
              </button>
            </div>
          </div><!-- /.box-footer -->
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