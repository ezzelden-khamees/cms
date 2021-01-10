@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('users/'.$user->id),'method'=>'put' ,'files'=>true ]) !!}
     <div class="form-group">
        {!! Form::label('name',trans('admin.name')) !!}
        {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('age',trans('admin.age')) !!}
        {!! Form::text('age',$user->age,['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('adress',trans('admin.adress')) !!}
        {!! Form::text('adress',$user->adress,['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('mob',trans('admin.mob')) !!}
        {!! Form::text('mob',$user->mob,['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('status',trans('admin.status')) !!}
        {!! Form::select('status',['yes'=>trans('admin.Do'),'no'=>trans('admin.Dont')],$user->status,['class'=>'form-control','placeholder'=>'.............']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('logo',trans('admin.userimage')) !!}
        {!! Form::file('logo',['class'=>'form-control']) !!}

          @if(!empty($user->logo))
       <img src="{{ Storage::url($user->logo) }}" style="width:50px;height: 50px;" />
      @endif
     </div>

     <div class="form-group">
        {!! Form::label('email',trans('admin.email')) !!}
        {!! Form::email('email',$user->email,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('password',trans('admin.password')) !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
     </div>
   
   
     
     {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection