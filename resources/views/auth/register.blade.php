@extends('light-bootstrap-dashboard::layouts.auth')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="auth-card card">
            <div class="header">
                <h4 class="title">{{ trans('messages.register') }}</h4>
            </div>
            <div class="content">
                {{ Form::open(['route' => 'register', 'method' => 'POST']) }}
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {{ Form::label('name', trans('messages.name')) }}
                            {{ Form::text('name', old('name'), ['class' => 'form-control', 'required', 'autofocus']) }}
                            @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            {{ Form::label('email', trans('messages.email')) }}
                            {{ Form::email('email', old('email'), ['class' => 'form-control', 'required', 'autofocus']) }}
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
                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            {{ Form::label('password', trans('messages.comfirm_password')) }}
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'required']) }}
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        {{ Form::submit(trans('messages.register'), ['class' => 'btn btn-lg btn-success btn-block']) }}
                        <a href="{{ route('login') }}" class="btn btn-lg btn-default btn-block">{{ trans('messages.login') }}</a>
                    </fieldset>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
