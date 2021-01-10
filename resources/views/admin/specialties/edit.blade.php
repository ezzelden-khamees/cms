@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('specialties/'.$specialy->id),'method'=>'put']) !!}
   <div class="form-group">
        {!! Form::label('specialties_name_ar',trans('admin.specialties_name_ar')) !!}
        {!! Form::text('specialties_name_ar',$specialy->specialties_name_ar,['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('specialties_name_en',trans('admin.specialties_name_en')) !!}
        {!! Form::text('specialties_name_en',$specialy->specialties_name_en,['class'=>'form-control']) !!}
     </div>

     

     

     {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection
