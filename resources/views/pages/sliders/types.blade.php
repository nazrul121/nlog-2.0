@extends('layouts.dashboard')

@section('title','Slider Types')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Slider types
                    <small>Have a look on slider types.</small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Slier </li>
                    <li class="breadcrumb-item active">Slider types</li>
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
                    <span>slider types in pages and it`s content manipulation</span>
                    <div class="card-header-right">
                        <a href="/access/website/slider/create-slider" class="btn btn-square btn-info btn-sm">Add slider</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive user-status">
                        <table class="table table-bordernone">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type Name</th>
                                <th scope="col">Description</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($types as $key=>$type)
                                <tr>
                                    <th scope="row">{{$key+1}} </th>
                                    <td>{{ $type->title }}</td>
                                    <td>{{ $type->description }}</td>
                                </tr> @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection