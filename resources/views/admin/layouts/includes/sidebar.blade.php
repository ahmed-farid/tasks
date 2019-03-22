
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Url('') }}/public/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->username}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{Url('admin')}}">
            <i class="fa fa-dashboard"></i> <span>الرئيسية</span>
            </span>
          </a>
        </li>
 <li><a href="{{Url('admin/settings')}}"><i class="fa fa-cogs"></i> اعدادت الموقع </a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>المشرفين</span>
             <span class="pull-left-container">
               <i class="fa fa-angle-left pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{Url('admin/admin')}}"><i class="fa fa-eye"></i> عرض </a></li>
      <li><a href="{{Url('admin/admin/create')}}"><i class="fa fa-plus"></i> اضافة</a></li>
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-category"></i> <span>الاقسام</span>
             <span class="pull-left-container">
               <i class="fa fa-angle-left pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{Url('admin/categorys')}}"><i class="fa fa-eye"></i> عرض </a></li>
      <li><a href="{{Url('admin/categorys/create')}}"><i class="fa fa-plus"></i> اضافة</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-category"></i> <span>الاخبار</span>
             <span class="pull-left-container">
               <i class="fa fa-angle-left pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{Url('admin/news')}}"><i class="fa fa-eye"></i> عرض </a></li>
      <li><a href="{{Url('admin/news/create')}}"><i class="fa fa-plus"></i> اضافة</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
