@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('medicalStaffs/'.$medical->id),'method'=>'put' , 'files'=>true ]) !!}
    <div class="form-group">
      {!! Form::label('doctor_name_ar',trans('admin.doctor_name_ar')) !!}
      {!! Form::text('doctor_name_ar',$medical->doctor_name_ar,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('doctor_name_en',trans('admin.doctor_name_en')) !!}
      {!! Form::text('doctor_name_en',$medical->doctor_name_en,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('special_id',trans('admin.special_id')) !!}
      {!! Form::select('special_id',App\Model\Specialy::pluck('specialties_name_'.session('lang'),'id'),$medical->special_id,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo',trans('admin.photoDoctor')) !!}
        {!! Form::file('photo',['class'=>'form-control']) !!}

          @if(!empty($medical->photo))
            <img src="{{ Storage::url($medical->photo) }}" style="width:100px;height: 100px;" />
          @endif
     </div>

    {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection