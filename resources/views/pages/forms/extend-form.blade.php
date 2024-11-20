@extends('layouts.dashboard')

@section('title',$form->title)
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Form Creation</h3>
                <span>Create form. See <code>field types demo</code> before select</span>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Form </li>
                    <li class="breadcrumb-item active">Form Creation</li>
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
                        <div class="card-body">
                            <div class="theme-form mega-form">
                                <h6>Form Type - [Select one]</h6>
                                <div class="form-group">
                                    <select class="form-control type">
                                        <option value="">Select form type</option>
                                        <optgroup label="Text Field">
                                            <option value="text">Text input field</option>
                                            <option value="number">Numaric input field</option>
                                            <option value="email">Email input field</option>
                                            <option value="password">Password input field</option>
                                            <option value="textarea">Long Text input field</option>
                                            <option value="file">File Upload</option>
                                        </optgroup>
                                        <optgroup label="Radio / Checkbox">
                                            <option value="checkbox">Check Box</option>
                                            <option value="radio">Radio Box</option>
                                        </optgroup>
                                        <optgroup label="Select ">
                                            <option value="select">Select field</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="theme-demo"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"> <h5>Form Extension</h5> </div>
                        <div class="card-body">
                            <form id="form" class="theme-form" action="/access/extend-form-save"> 
                                <div class="theme-form mega-form formExtend">
                                    <div class="form-group">
                                        <p class="text-center">Select form type first</p>
                                        <div class="loader text-center"><div class="line bg-primary"></div><div class="line bg-primary"></div><div class="line bg-primary"></div><div class="line bg-primary"></div></div>
                                    </div>
                                </div>
                                <div class="form-group row submitBtn" style="display:none">
                                    <div class="col-md-12">
                                        <button id="submit" class="btn btn-primary pull-right"> <i class="fa fa-check"></i> Save form</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <br>           
</div>

                
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script>
  $(function () {
    $('.type').on('change',function(){
        $('.formExtend').html('<p class="text-center">Select form type first</p><div class="loader text-center"><div class="line bg-primary"></div><div class="line bg-primary"></div><div class="line bg-primary"></div><div class="line bg-primary"></div></div>');
        $('.theme-demo').html('<span class="text-warning">loading ....</span>');
        if ($(this).val().length>0) {
            var text = $(this).find(":selected").text();
            $.ajax({
               type: "get",url: "{{ url('/access/get-form-extension') }}/" + $(this).val() + '/' +text+ '/{{$form->id}}',
               success: function(data) { $('.formExtend').html(data);}
            });
            $.ajax({
               type: "get",url: "{{ url('/access/get-form-extension-demo') }}/"+ $(this).val(),
               success: function(data) { $('.theme-demo').html(data);}
            });
            $('.submitBtn').slideDown();
        }else $('.submitBtn').slideUp();
    });

    $('#form').on('submit',function(e){
       e.preventDefault();
       $('#submit').html('Working .....');
        var form = $(this); var url = form.attr('action');
        $.ajax({
            type: "get",url: url,data: form.serialize(),
            success: function(data){
                $('.form-details-result').html(data);
                $('#submit').html('<button id="submit" class="btn btn-primary pull-right"> <i class="fa fa-check"></i> Save form</button>');
            }
        });
       
    });
  })
</script>
@endsection