@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('news/'.$info->id),'method'=>'put' ,'files'=>true ]) !!}
     <div class="form-group">
        {!! Form::label('title',trans('admin.titleNews')) !!}
        {!! Form::text('title',$info->title,['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('content',trans('admin.contentNews')) !!}
        {!! Form::text('content',$info->content,['class'=>'form-control']) !!}
     </div>




     <div class="form-group">
        {!! Form::label('photo',trans('admin.photoNews')) !!}
        {!! Form::file('photo',['class'=>'form-control']) !!}

          @if(!empty($info->photo))
             <img src="{{ Storage::url($info->photo) }}" style="width:100px;height: 100px;" />
          @endif
     </div>

   
   
     
     {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection