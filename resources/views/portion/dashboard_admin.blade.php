@extends('layouts.dashboard')

@section('title','Dashboard')

@section('content')
    @inject('formM','App\Models\Form')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Dashboard
                        <small>General Reports of the system</small>
                    </h3>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                        <li class="breadcrumb-item">Dashboard  </li>
                        <li class="breadcrumb-item active">Analysis</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="card border-widgets">
            <div class="row m-0">
                <div class="col-xl-3 col-6 xs-width-100">
                    <div class="crm-top-widget card-body">
                        <div class="media">
                            <i class="icon-comment font-primary align-self-center mr-3"></i>
                            <div class="media-body">
                                <span class="mt-0">Total Form</span>
                                <h4 class="counter">{{$forms->count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6 xs-width-100">
                    <div class="crm-top-widget card-body">
                        <div class="media">
                            <i class="icon-email font-secondary align-self-center mr-3"></i>
                            <div class="media-body">
                                <span class="mt-0">Subscribers</span>
                                <h4 class="counter">NaN</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6 xs-width-100">
                    <div class="crm-top-widget card-body">
                        <div class="media">
                            <i class="icon-package font-success align-self-center mr-3"></i>
                            <div class="media-body">
                                <span class="mt-0">Total Pages</span>
                                <h4 class="counter">{{$menus->count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6 xs-width-100">
                    <div class="crm-top-widget card-body">
                        <div class="media">
                            <i class="icon-direction-alt font-info align-self-center mr-3"></i>
                            <div class="media-body">
                                <span class="mt-0"> Page Contents</span>
                                <h4 class="counter">{{$total_post}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 xl-100">
                <div class="card" >
                    <div class="card-header">
                        <h5 data-toggle="collapse" data-target="#collapseZero" aria-expanded="true" aria-controls="collapseZero">Page Contact Reports <i class="fa fa-angle-down"></i></h5>
            
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left "></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li> <li><a href=""><i class="icofont icofont-refresh reload-card"></i></a></li><li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>

                    <div id="collapseZero" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="user-status table-responsive  text-center">
                                <table class="table table-bordernone">
                                    <thead>
                                    <tr>
                                        <th class="text-left"> Page Name</th> <th scope="col">Today Contacts</th><th scope="col">Total Contacts</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($forms as $form)
                                    <tr>                                    
                                        <td class="text-left">{{$form->table_title}}</td>
                                        <td>
                                            <b>{{$formM->today_contacts($form->table_name)->count()}}</b> Contacts
                                        </td>
                                        <td>
                                            <b>{{$formM->total_contacts($form->table_name)->count()}}</b> Contacts
                                        </td>                               
                                    </tr> @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 xl-100">
                <div class="card" >
                    <div class="card-header">
                        <h5 data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Page Contents Reports <i class="fa fa-angle-down"></i></h5>
            
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left "></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li> <li><a href=""><i class="icofont icofont-refresh reload-card"></i></a></li><li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="user-status table-responsive">
                                <table class="table table-bordernone text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-left">Page Name</th> <th scope="col">Page Content</th><th scope="col">Sub-pages</th><th scope="col">Forms</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menus as $menu)
                                    <tr>                                    
                                        <td class="text-left">{{$menu->title}}</td>
                                        <td><b>{{$menu->posts->count()}}</b> Post/contents</td>
                                        <td>{{$menu->sub_menus->count()}} pages</td>
                                        <td>{{$menu->forms->count()}} forms</td>
                                    </tr>@endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    
    </div>
@endsection