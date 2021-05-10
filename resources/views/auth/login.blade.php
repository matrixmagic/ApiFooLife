

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
                  <h4 class="text-center mb-4 text-white">Sign in with your Restaurant account  </h4>
                  @if($errors->any())
                 
          <h5 class=" text-center mb-4 text-white">{{$errors->first()}}</h5>
             @endif
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                      <div class="form-group">
                          <label class="mb-1 text-white"><strong>Email</strong></label>
                          <input type="email" class="form-control"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="hello@insperry.com">
                         
                      </div>

                       @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <div class="form-group">
                          <label class="mb-1 text-white"><strong>Password</strong></label>
                          <input type="password" class="form-control"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                      <div class="form-row d-flex justify-content-between mt-4 mb-2">
                          <div class="form-group">
                              <div class="custom-control custom-checkbox ml-1 text-white">
                                <input type="checkbox" class="custom-control-input" id="basic_checkbox_1"  name="remember"  {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                              </div>
                          </div>
                          <div class="form-group">
                              <a class="text-white"  href="{{ route('password.request') }}">Forgot Password?</a>
                          </div>
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


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
