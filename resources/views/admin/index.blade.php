@extends('admin/layouts/main')

@section('content')
@inject('admin','App\Admin')
@inject('news','App\Model\News')
@inject('cat','App\Model\Category')

  
    
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 921px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الرئيسية
      </h1>
     
    </section>



    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">

       <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">عدد الاعضاء</span>
              <span class="info-box-number">{{$admin->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
         <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

             <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class=""></i></span>

            <div class="info-box-content">
              <span class="info-box-text">الاقسام</span>
              <span class="info-box-number">{{$cat->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
         <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

             <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class=""></i></span>

            <div class="info-box-content">
              <span class="info-box-text">عدد الاخبار</span>
              <span class="info-box-number">{{$news->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
         <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>


           <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">اخر الاعضاء المسجلين </h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach($lastadmins as $lastadmin)
                    <li>
                    
                      <a class="users-list-name" href="#">{{$lastadmin->username}}</a>
                      <span class="users-list-date">{{$lastadmin->created_at}}</span>
                    </li>
                      @endforeach
              
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{url('admin/users')}}" class="uppercase">كل الاعضاء</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->

     </div>
      <!-- /.row -->


  <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->

     
        </div>
        <!-- /.col -->

   
      </div>
      <!-- /.row -->




  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@stop