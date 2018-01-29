@extends('light-bootstrap-dashboard::layouts.auth')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="auth-card card">
            <div class="header">
                <h4 class="title">{{ trans('messages.login') }}</h4>
            </div>
            <div class="content">
                {{ Form::open(['route' => 'login', 'method' => 'POST']) }}
                      {{ csrf_field() }}
                      <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        {{ Form::label('email', trans('messages.email')) }}
                        {{ Form::email('email', old('email'), ['class' => 'form-control', 'required']) }}
                        @if ($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        {{ Form::label('password', trans('messages.password')) }}
                        {{ Form::password('password', ['class' => 'form-control', 'requierd']) }}
                        @if ($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>  
                    <div class="form-group">
                        {{ Form::checkbox('remember', old('remember') ? 'checked' : '') }} {{ trans('messages.remember_me') }} 
                    </div>
                </div>
                <!-- Change this to a button or input when using this as a form -->
                {{ Form::submit(trans('messages.login'), ['class' => 'btn btn-lg btn-success btn-block']) }}
                    <a href="{{ route('register') }}" class="btn btn-lg btn-default btn-block">{{ trans('messages.register') }}</a>
                <div class="text-right">
                    <a href="{{ route('password.request') }}" class="text-muted">{{ trans('messages.forgot_password') }}</a>
                </div>
                    </fieldset>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
