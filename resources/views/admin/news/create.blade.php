@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('news') , 'files'=>true]) !!} 
     <div class="form-group">
        {!! Form::label('title',trans('admin.titleNews')) !!}
        {!! Form::text('title',old('title'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('content',trans('admin.contentNews')) !!}
        {!! Form::text('content',old('content'),['class'=>'form-control']) !!}
     </div>
     	

     <div class="form-group">
        {!! Form::label('photo',trans('admin.photoNews')) !!}
        {!! Form::file('photo',['class'=>'form-control']) !!}
     </div>
   
     {!! Form::submit(trans('admin.create_news'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection