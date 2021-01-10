@extends('admin.index')
@section('content')


<div class="container">
<div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
        
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>{{$apper->title}}</b>
               <hr>
                <p>{{$apper->content}}
              </div>
             
         
            </div>

  

          @if(!empty($apper->photo))
             <img src="{{ Storage::url($apper->photo) }}" style="width:600px;height: 400px; padding-bottom:20px ; padding-right:10px" />
         @endif
    
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
                 
        </div>
          




 @endsection