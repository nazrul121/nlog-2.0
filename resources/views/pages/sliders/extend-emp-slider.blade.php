@extends('layouts.dashboard')

@section('title','Sliders')
@section('content')

@inject('empSlider','\App\Models\Employee_slider')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3> Employee Sliders</h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Menu </li>
                    <li class="breadcrumb-item active">Sliders</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">   
        <div class="col-sm-12 col-xl-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Employee list Section</h5>
                            <span>To add an<code> Employee </code> to <code>Employee slider </code>  Drag that employee to the <b>Employee slider section</b></span>
                        </div>
                        <div class="card-body">
                           <div id="container1" class="panel-body box-container">
                                <ul class="list-group">
                                    @foreach($employees as $key=>$emp)
                                    @if($empSlider->is_emp_in_slider($emp->id, $type, $id) == '0')
                                    <li style="cursor:all-scroll;" employee_id="{{$emp->id}}" class="list-group-item  box-item">{{$emp->name}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Employee slider section</h5>
                            <span>To Remove an<code> Employee </code> from <code>Employee slider </code>  Drag that employee to the <b>Employee list Section</b></span>
                        </div>
                        <div class="card-body">
                           <div id="container2" class="panel-body box-container">
                               <ul class="list-group">
                                    @foreach($emp_sliders as $key=>$slier)
                                    <li style="cursor:all-scroll;" employee_id="{{$slier->employee_id}}" class="list-group-item  box-item">{{$slier->employee->name}}</li>
                                    @endforeach
                                </ul>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
                
</div>


<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css" />
<link rel="stylesheet" href="{{asset('assets/bootstrap3.3.6.css')}}" />
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<style type="text/css">
    .box-container { height: 200px;}
    .box-item {width: 100%; z-index: 1000}
</style>
<script>
$(document).ready(function() {
  $('.box-item').draggable({ cursor: 'move', helper: "clone"});

  $("#container1").droppable({
    drop: function(event, ui) {
      var employee_id = $(event.originalEvent.toElement).attr("employee_id");
      $('.box-item').each(function() {
        if ($(this).attr("employee_id") === employee_id) {
            $(this).appendTo("#container1");
            $.ajax({
                url: "/access/set-employee-slider/remove/{{$type}}/{{$id}}/"+employee_id, method:"get",
                success:function(data){ 
                    //   $('.sort_resutl').html(data);
                }
            });
        }
      });
    }
  });

  $("#container2").droppable({
    drop: function(event, ui) {
      var employee_id = $(event.originalEvent.toElement).attr("employee_id");
      $('.box-item').each(function() {
        if ($(this).attr("employee_id") === employee_id) {
            $(this).appendTo("#container2");
            $.get("/access/set-employee-slider/add/{{$type}}/{{$id}}/"+employee_id, function(data, status){
                // $('.sort_resutl').html(data);

            });
        }
      });
    }
  });

});
</script>
@endsection