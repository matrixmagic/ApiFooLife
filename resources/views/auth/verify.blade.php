{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layout.fullwidth')



{{-- Content --}}
@section('content')
<div class="col-md-6">
  <div class="authincation-content">
      <div class="row no-gutters">
          <div class="col-xl-12">
              <div class="auth-form">
                  <div class="text-center mb-3">
                    <a href="{!! url('/index'); !!}"><img src="{{ asset('images/logo-full.png') }}" alt=""></a>
                  </div>
                  <h4 class="text-center mb-4 text-white">Verify you Account plz </h4>
                  @if($errors->any())
                 
          <h5 class=" text-center mb-4 text-white">{{$errors->first()}}</h5>
             @endif
                  <form method="POST" action="{{ url('verifyAccount') }}">
                    @csrf
                      <div class="form-group">
                          <label class="mb-1 text-white"><strong>code Number</strong></label>
                          <input type="text" class="form-control"  class="form-control @error('email') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="email" autofocus >
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>

                      <div class="form-group">
                        <label class="mb-1 text-white"><strong>New Password</strong></label>
                        <input type="password" class="form-control" name="password" >
                       </div>
                     
                       <div class="form-group">
                        <label class="mb-1 text-white"><strong>Reenter Password</strong></label>
                        <input type="password" class="form-control" name="password_confirmation" >
                       </div>
                    
                     
                      <div class="text-center">
                          <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                      </div>
                  </form>
                  {{-- <div class="new-account mt-3">
                      <p class="text-white">Don't have an account? <a class="text-white"href="{{ route('register') }}">Sign up</a></p>
                  </div> --}}
              </div>
          </div>
      </div>
  </div>
</div>
@endsection