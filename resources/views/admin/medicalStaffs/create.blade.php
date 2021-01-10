@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('medicalStaffs') , 'files'=>true]) !!}
     <div class="form-group">
        {!! Form::label('doctor_name_ar',trans('admin.doctor_name_ar')) !!}
        {!! Form::text('doctor_name_ar',old('doctor_name_ar'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('doctor_name_en',trans('admin.doctor_name_en')) !!}
        {!! Form::text('doctor_name_en',old('doctor_name_en'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('special_id',trans('admin.special_id')) !!}
        {!! Form::select('special_id',App\Model\Specialy::pluck('specialties_name_'.session('lang'),'id'),old('special_id'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('photo	',trans('admin.photoDoctor')) !!}
        {!! Form::file('photo	',['class'=>'form-control']) !!}
     </div>
     
     {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection