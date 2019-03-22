@extends('admin/layouts/main')

@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!-- DataTables -->
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>أضافة قسم جديد</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li class="active"><a href="{{Url('admin/categorys')}}"> التحكم فى الاقسام</a></li>
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
            'url'=>'admin/categorys',
            'class'=>'form-horizontal',
            'role'=>'form',
            'method' => 'POST',
            'files'=>true    
            
            ))!!}

           <div class="form-group @if($errors->has('category_name')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">أسم القسم</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="category_name" value="{{old('category_name')}}" placeholder="أسم القسم">
                <strong class="help-block">{{ $errors->first('category_name') }}</strong> 
              </div>
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



@stop