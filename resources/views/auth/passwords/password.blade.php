@extends('layouts.app')
@section('title','Change Password')
@section('content')

<div class="authentication-main">
    <div class="row">
        <div class="col-md-4 p-0">
            <div class="auth-innerleft">
                <div class="text-center">
                    <img src="/{{request()->get('logo')}}" class="logo-login" alt="">
                    <hr>
                    <div class="social-media">
                        <ul class="list-inline">
                            @foreach(request()->get('social_media') as $media)
                            <li class="list-inline-item" title="{{$media->media_name}}">
                                <a target="_" href="{{$media->link}}"><i class="{{$media->media_icon}}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 p-0">
            <div class="auth-innerright">
                <div class="authentication-box">
                    <h4>Change Your Password</h4>
                    
                    <div class="card mt-4 p-4 mb-0">
                        <form method="POST" class="theme-form"> @csrf
                           
                            <div class="form-group">
                                <label class="col-form-label">Old Password</label>
                                <input type="password" class="form-control form-control-lg @error('old_password') is-invalid @enderror" name="old_password" autocomplete="current-password">

                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Set New Password</label>
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Set New Password</label>
                                <input type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="current-password">

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                            <div class="form-group form-row mt-3 mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-secondary pull-right">
                                        <i class="fa fa-lock"></i> Change Passowrd</button>
                                </div>
                            </div>
                        </form><br>
                    </div>
                    <div class="alert alert-warning dark alert-dismissible fade show" role="alert">
                        <i class="icon-bell"></i>After changing password, the system will logged out automatically!!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
