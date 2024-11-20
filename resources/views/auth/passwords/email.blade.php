@extends('layouts.app')

@section('title','Forgot password?')

@section('content')

    <div class="card shadow p-3">
        <div class="auth-innerright">
            <div class="authentication-box">
                <h4>{{ __('Reset Password') }}</h4>
                <p style="font-size: 15px">Enter your Username/email. We will sent you the password reset link</p>
                <div class="card mt-4 p-4 mb-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}"> @csrf
                        <div class="form-group">
                            <label class="col-form-label pt-0">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group form-row mt-3 mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-secondary">{{ __('Send Password Reset Link') }}</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <h6 class="mt-3 text-center">Do you already have an account? Please <a href="/login"> Login</a></h6>
            </div>
        </div>
    </div>


@endsection
