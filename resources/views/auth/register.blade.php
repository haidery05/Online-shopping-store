@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">


                                @if(!empty($name))
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $name }}" required autofocus>
                                @else
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus> @endif                               



                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">

                                
                                @if(!empty($email))
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email }}" required>
                                @else
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @endif                                


                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div style="margin-left: 150px;" >
                        {{ Form::label('gender' , 'Gender') }}
                        </div>
                            <div class="col-md-6">
                        {{ Form::radio('gender' , 'Male') }}Male
                            </div>
                        <div class="col-md-6">
                        {{ Form::radio('gender' , 'Female') }}Female
                            </div>

                        </div>

                        <div class="form-group row">
                            <div style="margin-left: 150px;" >
                        {{ Form::label('role' , 'You are a ') }}
                        </div>
                            <div class="col-md-6">
                        {{ Form::radio('role' , 'Seller') }}Seller
                            </div>
                        <div class="col-md-6">
                        {{ Form::radio('role' , 'Buyer') }}Buyer
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}">

                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <label class="col-md-4 control-label">Or Register with</label>
                            <div class="row">
                                
                            </div>

                            <div class="col-md-8 col-md-offset-2">
                                
                                  <a href="{{url('login/twitter') }}" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i>Twitter</a>
                                  <a href="{{url('login/facebook') }}" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i>Facebook</a>
                                  <a href="{{url('login/google') }}" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i>Google</a>
                                  <a href="{{url('login/linkedin') }}" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i>LinkedIn</a>
                                  <a href="{{url('login/github') }}" class="btn btn-social-icon btn-github"><i class="fa fa-github"></i>Github</a>
                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
