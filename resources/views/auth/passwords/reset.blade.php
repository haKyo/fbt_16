@extends('light-bootstrap-dashboard::layouts.auth')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="auth-card card">
            <div class="header">
                <h4 class="title">{{ trans('messages.reset_password') }}</h4>
            </div>
            <div class="content">
                {{ Form::open(['route' => 'password.request', 'method' => 'POST']) }}
                    {{ csrf_field() }}
                    {{ Form::token() }}
                    <fieldset>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            {{ Form::label('email', trans('messages.email')) }}
                            {{ Form::email('email', $email or old('email'), ['class' => 'form-control', 'required', 'autofocus']) }}
                            @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            {{ Form::label('password', trans('messages.password')) }}
                            {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                            @if ($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            {{ Form::label('password', trans('messages.comfirm_password')) }}
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'required']) }}
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        {{ Form::submit(trans('messages.reset_password'), ['class' => 'btn btn-lg btn-success btn-block']) }}
                    </fieldset>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
