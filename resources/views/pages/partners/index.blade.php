@extends('layouts.dashboard')

@section('title','Partners table')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Partners <small>Our honorable Partners</small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Partners </li>
                    <li class="breadcrumb-item active">Partners Record</li>
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
                    <h5>All partners dataTable</h5>
                    <span>Honorable partners records</span>
                </div>
                <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-primary">
                                <tr>
                                    <th scope="col">Partner info</th>
                                    <th scope="col">Contact info</th><th scope="col">Status</th><th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if($partners->count()>0)
                                    @foreach($partners as $key=>$row)
                                    <tr>
                                        <th class="bd-t-none" scope="row">
                                            <img src="/{{$row->logo}}" style="height:45px">
                                            <img src="/{{$row->photo}}" style="height:30px">
                                            {{$row->company}}
                                        </th>
                                        <td><b>Contact Name:</b> {{$row->name}}, <br>
                                            <b>Phone:</b> {{$row->phone}}, <b> Email:</b> {{$row->email}} <br>
                                            <address>{{$row->address}}</address>
                                        </td>
                                   
                                        <td>
                                            @if($row->status=='1')<b class="text-success">Active</b>  @else <b class="text-warning">Inactive</b> @endif
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group btn-group-pill" role="group" aria-label="Basic example">
                                                <a href="/access/partner/edit-partner/{{$row->id}}"><button type="button" class="btn btn-success">
                                                    <i class="fa fa-edit"></i></button></a>
                                                <button type="button" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr> @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

          
        </div>

    </div>
</div>
>

<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script type="text/javascript">
    $(function(){
        $('.dropify').dropify({height:160});
    })
</script>
@endsection