@include('admin.layouts.header')
@include('admin.layouts.navbar')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      {{ trans('admin.dashboard') }}
        <small>{{ trans('admin.adminpanel') }}</small>
      </h1>
   
    </section>

    <!-- Main content -->
    <section class="content">
    @include('admin.layouts.message')
    	@yield('content')

     </section>
    <!-- /.content -->
  </div>

@include('admin.layouts.footer') 