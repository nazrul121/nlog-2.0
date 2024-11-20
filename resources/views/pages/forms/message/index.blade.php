@extends('layouts.dashboard')

@section('title',$form->table_title)
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>{{$form->table_title }}
                    <small>Manipulate {{$form->table_title}} contact</small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item ">Forms</li>
                    <li class="breadcrumb-item active">{{$form->table_title}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
    	<div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <span>{{$form->table_title }} and it`s reaction informatoin</span>
                    <div class="card-header-right">
                        <a href="{{url('/access/website/create-forms')}}" class="btn btn-square btn-info btn-sm">Create Forms</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive user-status">
                        <table class="table table-bordernone">
                            <thead>
                            <tr>
                                @foreach($colums as $column)
                               
                                    <th scope='col'>
                                        @if($column=='created_at') Receive date @endif
                                        @if($column !='seen' && $column !='created_at')
                                            {{$column}}
                                        @endif
                                        
                                    </th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $row)
                                    <tr>
                                        @foreach($colums as $col)
                                            <td>@if($col=='created_at')
                                                    {{date('F d, Y',strtotime($row->$col))}}
                                                @endif
                                                @if($col !='seen' && $col !='created_at')
                                                    <?php $type = \DB::table('form_details')->where('form_id',$form->id)->where('field_name', str_replace('_',' ',$col))->pluck('field_type')->first();?>
                                                    @if($type=='file' && $row->$col !=null )
                                                        <a href="{{$row->$col}}" taraget="_" style="">View/Download</a>
                                                    @else {{$row->$col}} @endif
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach                                
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12"><br>{{$records->links()}}<br></div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection