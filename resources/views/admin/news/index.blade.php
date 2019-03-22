@extends('admin/layouts/main')

@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>التحكم فى الاخبار</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin')}}"> الرئيسية </a></li>
        <li><a href="{{Url('admin/news/create')}}">أضافة خبر جديد</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
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
         
            <!-- /.box-header -->
          <div class="box-body">
          <form action="{{url('admin/news')}}" method="get">
            <div>
             <label>
             
             <input type="search" name="name" class="form-control input-sm" placeholder="Search">
             </label>
            </div>
          </form> 

        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center"> أسم الخبر</th>
              <th class="text-center"> تابع لقسم</th>
              <th class="text-center">عرض</th>
              <th class="text-center"> أنشئ فى</th>
              <th class="text-center">محدث فى</th>
              <th class="text-center">تعديل</th>
              <th class="text-center">حذف</th>
            </tr>
          </thead>
          </tbody>
          <tbody>
          @php $count = 1; @endphp
          @foreach($news as $new)
            <tr>
            <td class="text-center">{{$count}}</td>
              <td class="text-center">{{$new->name}}</td>
              <td class="text-center">{{$new->category->category_name}}</td>
              <td class="text-center">
                <a href="{{url('admin/news/'.$new->id)}}" class="btn btn-primary fa fa-eye"></a>
              </td>
              <td class="text-center">{{$new->created_at}}</td>
              <td class="text-center">{{$new->updated_at}}</td>

              <td class="text-center">
                 <a href="{{url('admin/news/'.$new->id.'/edit')}}" class="btn btn-primary fa fa-pencil-square-o" ></a>
              </td>
          
            <td class="text-center" id="mycheck">
                <a type="submit" class="btn btn-danger fa fa-trash-o delData" href="{{url('admin/news/'.$new->id.'/delete')}}"></a>
                {{Form::close()}}
            </td>
            </tr>
               @php $count ++; @endphp
              @endforeach
          </tbody>
          



          </table>
         

      </div><!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

 
 </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@stop


@section('footer')
<script type="text/javascript">
  $(document).on('click','.delData',function(e){
    e.preventDefault();
    var a = $(this); 
    bootbox.confirm({
      message: "هل انت موافق على حذف  : {{$new->name}}؟",
      buttons: {
        confirm: {
          label: 'موافق',
          className: 'btn-success pull-right'
        },
        cancel: {
          label: 'إلغاء',
          className: 'btn-danger'
        }
      },
      callback: function (result) {
        if(result == true){
          url = a.attr('href');
          window.location = url;
        }
      }
    });
  });
</script>
@endsection