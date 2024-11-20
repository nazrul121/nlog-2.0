@extends('layouts.dashboard')

@section('title','Fun Factors')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Fun Factors  <small>Manipulate Fun Factors  (Some statistics) for the pages</small></h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"> Dashboard</i></a></li> <li class="breadcrumb-item active">Fun factors</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@inject('funM','App\Models\Fun_factor')

<div class="container-fluid">
    <div class="row">
    	<div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <span>All Fun Factor records with field details
                    <a href="/access/website/fun-factor/create" class="btn btn-outline-warning rounted btn-xs pull-right">  <i class="icon-plus"></i> Create One  </a> </li>
                    </ul>
                   </span>
                </div>
                <div class="card-body">
                   <div class="row">
                        @foreach($factors as $key=>$factor)
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header"><img src="{{url('/'.$factor->model_photo)}}" class="img-fluid" alt="">
                                </div><div class="card-profile"> <img src="{{url('/'.$factor->background_photo)}}" class="rounded-circle">
                                </div>                                
                                    <div class="col-12 col-sm-12"> <hr>
                                       <form class="pull-right" onclick="return confirm('Are you sure to remove the content for every?? All related facts will be deleted with this action');" action="{{url('/access/website/fun-factor/delete/'.$factor->id)}}" method="POST">
                                           @csrf  {{ method_field('DELETE') }}
                                            <button class="btn btn-square btn-danger btn-xs pull-right"><i class="fa fa-trash"></i> Delete factor</button>
                                        </form> &nbsp; &nbsp; &nbsp;

                                        <a class="btn btn-square btn-info btn-xs pull-right" href="{{url('/access/website/fun-factor/edit/'.$factor->id)}}"><i class="fa fa-edit"></i> Edit factor</a>
                                    </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="card card-absolute">
                                <div class="card-header bg-primary">
                                    <h5 data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> Factors and values
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body p-0">
                                            @if($funM->fun_factors($factor->id)->count() <1)
                                             <h3>Display page: {{$factor->main_menu->title}}</h3>
                                            @else 
                                                <h6>Display page: {{$factor->main_menu->title}}
                                                    <a href="#" title="Create fields" data-toggle="modal" data-target="#factorField" class="createField pull-right" data-id="{{$factor->id}}"> <i class="fa fa-plus"></i> <small>Create</small></a>
                                                </h6> <br>
                                            @endif
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                    @if($funM->fun_factors($factor->id)->count() <1)
                                                    <tr>
                                                        <th colspan="3">No fields creted for this factor Please <a href="#" title="Create fields" data-toggle="modal" data-target="#factorField" class="createField" data-id="{{$factor->id}}"> <i class="fa fa-plus"></i> Create</a></th>
                                                    </tr>
                                                    @else
                                                        @foreach($funM->fun_factors($factor->id) as $field) <tr>
                                                            <th scope="row">{{$field->field_name}}</th>
                                                            <td>{{$field->field_value}}</td>
                                                            <td class="text-right">
                                                                <a href="{{url('/access/website/fun_factor/edit-field/'.$field->id)}}"><i class="fa fa-edit"></i></a> &nbsp;

                                                                <form class="pull-right" onclick="return confirm('Are you sure to remove the content for every??');" action="{{url('/access/website/fun_factor/delete-field/'.$field->id)}}" method="POST">
                                                                   @csrf  {{ method_field('DELETE') }}
                                                                    <button class=""><i class="text-danger fa fa-trash"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>  @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal to create !-->
<div class="modal fade" id="factorField" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close theme-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body">
                <div class="card">
                    <form class="theme-form" method="post" action="/access/website/fun-factor/create-factor-field"> @csrf
                    <div class="card-header"> <h5>Create new factor </h5> </div>
                    <div class="card-body">
                        @include('pages.fun_factor.fields.form')
                    </div>
                    <div class="card-footer mb-3">
                        <button type="submit" class="btn btn-success pull-right "><i class="fa fa-check"></i> Save Record</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">     
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script>
  $(function () {
    @if(Session::has('fator_field')) $('#factorField').modal('show'); @endif

    $(".createField").on('click',function(){
        $('[name=fun_factor_id]').val( $(this).data('id') );
    });
  })
</script>
@endsection