@extends('admin.index')
@section('content')



      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ \App\Admin::count() }}</h3>

              <p>{{ trans('admin.admin') }}</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ aurl('admin') }}" class="small-box-footer">{{ trans('admin.info') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ \App\Model\Whatsapp::count() }}<sup style="font-size: 20px"></sup></h3>

              <p>{{ trans('admin.news') }}</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ aurl('news') }}" class="small-box-footer">{{ trans('admin.info') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ \App\User::count() }}</h3>

              <p>{{ trans('admin.Patients') }}</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ aurl('users') }}" class="small-box-footer">{{ trans('admin.info') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ \App\Model\MedicaStaff::count() }}</h3>
              
              <p>{{ trans('admin.medicaStaffs') }}</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ aurl('medicalStaffs') }}" class="small-box-footer">{{ trans('admin.info') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
   

@endsection