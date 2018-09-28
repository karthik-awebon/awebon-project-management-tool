@extends('layouts.loginstyle')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">  -->
                <div class="card">
                
                    <div class="card-header card-header-tabs card-header-primary logintitle">{{ __('ADMIN LOGIN') }}</div>

                    <div class="card-body logincardbody">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="borderinput form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>
                            </div>   
                            
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="borderinput form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <!-- </div>   -->  
        </div>
    </div>
</div>
@endsection
