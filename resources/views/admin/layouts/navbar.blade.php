<header class="main-header">
  <!-- Logo -->
  <a href="" class="logo">
   

    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>{{ trans('admin.adminpanel') }}</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only"></span>
    </a>
    @include('admin.layouts.menu')
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ url('design/adminlte') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ admin()->user()->name }}</p>
      
      </div>
    </div>
   
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header"></li>

     



  <li class="treeview {{ active_menu('admin')[0] }}">
    <a href="#">
      <i class="fa fa-lock"></i> <span>{{ trans('admin.admin') }}</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="{{ active_menu('admin')[1] }}">
      <li class=""><a href="{{ aurl('admin') }}"><i class="fa fa-address-book"></i> {{ trans('admin.admin') }}</a></li>
      <li class=""><a href="{{ aurl('admin/create') }}"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</a></li>
    </ul>
  </li>



  <li class="treeview {{ active_menu('users')[0] }}">
    <a href="#">
      <i class="fa fa-users"></i> <span>{{ trans('admin.Patient') }}</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="{{ active_menu('users')[1] }}">
      <li class=""><a href="{{ aurl('users') }}"><i class="fa fa-users"></i> {{ trans('admin.Patients') }}</a></li>
      <li class=""><a href="{{ aurl('users') }}?status=yes"><i class="fa fa-thumbs-up "></i> {{ trans('admin.Do') }}</a></li>
      <li class=""><a href="{{ aurl('users') }}?status=no"><i class="fa fa-thumbs-down "></i> {{ trans('admin.Dont') }}</a></li>
    
    </ul>
  </li>




<!-- news  -->
   <li class="treeview {{ active_menu('news')[0] }}">
    <a href="#">
      <i class="fa fa-newspaper-o"></i> <span>{{ trans('admin.news') }}</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="{{ active_menu('news')[1] }}">
      <li class=""><a href="{{ aurl('news') }}"><i class="fa fa-newspaper-o"></i> {{ trans('admin.news') }}</a></li>
      <li class=""><a href="{{ aurl('news/create') }}"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</a></li>
    </ul>
  </li>


<!-- specialties -->
<li class="treeview {{ active_menu('specialties')[0] }}">
    <a href="#">
      <i class="fa fa-flag"></i> <span>{{ trans('admin.specialties') }}</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="{{ active_menu('specialties')[1] }}">
      <li class=""><a href="{{ aurl('specialties') }}"><i class="fa fa-flag"></i> {{ trans('admin.specialties') }}</a></li>
      <li class=""><a href="{{ aurl('specialties/create') }}"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</a></li>
    </ul>
  </li>


<!-- medicalStaffs -->
  <li class="treeview {{ active_menu('medicalStaffs')[0] }}">
    <a href="#">
      <i class="fa fa-ambulance"></i> <span>{{ trans('admin.medicaStaffs') }}</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="{{ active_menu('medicalStaffs')[1] }}">
      <li class=""><a href="{{ aurl('medicalStaffs') }}"><i class="fa fa-ambulance"></i> {{ trans('admin.medicaStaffs') }}</a></li>
      <li class=""><a href="{{ aurl('medicalStaffs/create') }}"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</a></li>
    </ul>
  </li>








</ul>
</section>
<!-- /.sidebar -->
</aside>