@extends('light-bootstrap-dashboard::layouts.auth')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="auth-card card">
            <div class="header">
                <h4 class="title">{{ trans('messages.reset_password') }}</h4>
            </div>
            <div class="content">
                {{ Form::open(['route' => 'password.email', 'method' => 'POST']) }}
                  {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        {{ Form::label('email', trans('messages.email')) }}
                        {{ Form::email('email', old('email'), ['class' => 'form-control', 'required', 'autofocus']) }}
                        @if ($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    {{ Form::submit(trans('messages.submit_password'), ['class' => 'btn btn-lg btn-success btn-block']) }}
                  </fieldset>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
