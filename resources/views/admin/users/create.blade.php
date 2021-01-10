@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('users') , 'files'=>true]) !!}
     <div class="form-group">
        {!! Form::label('name',trans('admin.nameSick')) !!}
        {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('age',trans('admin.age')) !!}
        {!! Form::text('age',old('age'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('adress',trans('admin.adress')) !!}
        {!! Form::text('adress',old('address'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('mob',trans('admin.mobile')) !!}
        {!! Form::text('mob',old('mob'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('status',trans('admin.status')) !!}
        {!! Form::select('status',['yes'=>trans('admin.Do'),'no'=>trans('admin.Dont')],old('status'),['class'=>'form-control','placeholder'=>'.............']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('logo',trans('admin.userimage')) !!}
        {!! Form::file('logo',['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('email',trans('admin.email')) !!}
        {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('password',trans('admin.password')) !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
     </div>
   
     {!! Form::submit(trans('admin.create_user'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection