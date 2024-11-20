@extends('layouts.app')

@section('title','Login to continue')

@section('content')
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Login</h3>
        <form method="POST" action="{{ route('login') }}" class="theme-form"> @csrf
            <div class="form-group">
                <label class="col-form-label pt-0">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label">Password</label>
                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="checkbox p-0">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">  {{ __('Remember Me') }}
                </label>
            </div>
            <div class="d-grid">
                <div class="col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-secondary"><i class="fa fa-sign-in"></i> LOGIN</button>
                </div>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    
    </div>
        
@endsection
