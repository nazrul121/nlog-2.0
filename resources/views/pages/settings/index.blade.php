@extends('layouts.dashboard')

@section('title','Content settings')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Content Settings
                    <small>Manipulate system contents</small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Settings </li>
                    <li class="breadcrumb-item active">Content Settings</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <form method="post" class="row">@csrf
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group m-t-15">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox" name="show_greetings" value="yes" @if(request()->get('show-greetings') =='yes') checked @endif>
                                    <label for="checkbox1"> Show Welcome Greetings at Home</label>
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-12 mb-5">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Number of post at slier -></span>
                                </div>
                                <input type="number" name="slider_post_number" value="{{request()->get('slider-post-number')}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <h5>Show Organization information at <i class="fa fa-arrow-down"></i></h5>
                        </div>
                        <div class="col">
                            @foreach($menus as $key=>$menu)
                            <?php  $array = explode(',', request()->get('show-company-info'));?>
                            @if($menu->id != '1')
                            <div class="form-group" style="margin-bottom:0px;width:auto;float:left;">
                                <div class="checkbox checkbox-primary" style="margin-right:1em;">
                                    <input id="checkbox-primary-{{$key}}" type="checkbox" name="show_org_info[]" value="{{$menu->title}}" @if (in_array(strtolower($menu->title), $array))checked @endif />
                                    <label for="checkbox-primary-{{$key}}">{{$menu->title}}</label>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>

                        <div class="col-sm-12"><br>
                            <h5>Show employee info at <i class="fa fa-arrow-down"></i></h5>
                        </div>
                        <div class="col">
                            @foreach($menus as $key2=>$menu)
                                <?php  $array2 = explode(',', request()->get('show-employee-info'));?>
                                @if($menu->id != '1')
                                <div class="form-group" style="margin-bottom:0px;width:auto;float:left;">
                                    <div class="checkbox checkbox-info" style="margin-right:1em;">
                                        <input id="checkbox-info-{{$key2}}" type="checkbox" name="show_employee_info[]" value="{{$menu->title}}" @if (in_array(strtolower($menu->title), $array2)) checked @endif>
                                        <label for="checkbox-info-{{$key2}}">{{$menu->title}}</label>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                       
                        <div class="col-sm-12"><br>
                            <div class="card">
                                <div class="media p-20">
                                    <label>Photo Slider shows at &nbsp; &nbsp; &nbsp; &nbsp; </label>
                                    <div class="radio radio-primary">
                                        <input type="radio" name="photo_slider" id="clientPartner1" value="top" >
                                        <label for="clientPartner1" class="mb-0">Top of contents</label>
                                    </div> &nbsp; &nbsp;
                                    <div class="radio radio-primary">
                                        <input type="radio" name="photo_slider" id="clientPartner2" value="bottom">
                                        <label for="clientPartner2" class="mb-0">Bottom if contents</label>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="latest_post_atHome" type="checkbox" <?php if(request()->get('home-post-multiple-menu-number') !=null)echo 'checked';?> >
                                    <label for="latest_post_atHome"> Show post form <strong>Multiple menus</strong> at Home</label>

                                    <button type="button" class="btn btn-info example-popover btn-xs pull-right mt-2" data-toggle="popover" data-content="Set <b>Number of post appears</b> field null (remove the number)" data-html='true' data-original-title="if you like to disappear this">?</button>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Number of post appears -></span>
                                        </div>
                                        <input type="number" name="home_post_multiple_menu_number" value="{{request()->get('home-post-multiple-menu-number')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <small class="pull-right pointer" data-toggle="collapse" data-target="#menus" aria-expanded="true" aria-controls="collapse11">
                                    Select Pages/Menus  </small>
                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                    <div id="menus" class="collapse" aria-labelledby="menus" data-parent="#accordionoc" style="">
                                        <div class="card-body">
                                            <?php foreach($menus as $key=>$menu):?>
                                            <div class="checkbox checkbox-dark">
                                                <input id="inline-{{$key}}" type="checkbox" name="menus[]" value="{{$menu->id}}" @if(in_array($menu->id, $latest_post_menu))checked @endif />
                                                <label for="inline-<?php echo $key;?>"><?php echo $menu->title; ?></label>
                                            </div>
                                            <?php endforeach;?>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <label>Post starting short-description</label>
                            <textarea class="form-control" rows="3" name="home_post_multiple_title">{{request()->get('home-post-multiple-title')}}</textarea>
                            


                            <div class="form-group m-t-15">
                                <div class="checkbox">
                                    <input id="home-page-post-number" type="checkbox" @if(request()->get('home-post-single-menu-number') !='') checked @endif>
                                    <label for="home-page-post-number"> Show content from a single page at <strong>Home</strong></label>

                                    <button type="button" class="btn btn-info example-popover btn-xs pull-right mt-2" data-toggle="popover" data-content="Set <b>Number of post appears</b> field null (remove the number)" data-html='true' data-original-title="if you like to disappear this">?</button>
                                
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Number of post appears -></span>
                                        </div>
                                        <input type="number" name="home_post_single_menu_number"value="{{request()->get('home-post-single-menu-number')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <small class="pull-right" data-toggle="collapse" data-target="#menu" aria-expanded="true" aria-controls="collapse11">
                                    Select a Page/Menu  </small>

                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                    <div id="menu" class="collapse" aria-labelledby="menu" data-parent="#accordionoc" style="">
                                        <div class="card-body">
                                            @foreach($menus as $key=>$menu)
                                            <div class="radio radio-info mb-2">
                                                <input type="radio" name="menu" id="menu{{$key}}" value="{{$menu->id}}" @if(request()->get('home-post-single-menu')==$menu->id)checked @endif />
                                                <label for="menu{{$key}}" class="mb-0">{{$menu->title}}</label>
                                            </div> @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <label>Post starting short-description</label>
                            <textarea class="form-control" rows="3" name="home_post_single_title">{{request()->get('home-post-single-title')}}</textarea>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card row">
                <div class="card-footer">
                    <button class="btn btn-primary pull-right"><i class="fa fa-check"></i> Save Changes</button>
                </div>
            </div><br><br>
        </div>
    </form>
</div>

<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script type="text/javascript">
    $(function(){

    })
</script>
@endsection