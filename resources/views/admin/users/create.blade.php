@extends('admin.master')

@section('content')

@include('common.errors')

    <h2><i class="fa fa-pencil"></i> {{ trans('messages.create') }}</h2>
    {{ Form::open(['class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'role' => 'form', 'method' => 'POST', 'route' => 'user.store']) }}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {{ Form::label('name', trans('messages.username'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::text('name', old('name'), ['class' => 'form-control', 'required']) }}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {{ Form::label('email', trans('messages.email'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::email('email', old('email'), ['class' => 'form-control' , 'required']) }}

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        {{ Form::label('password', trans('messages.password'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::password('password', ['class' => 'form-control', 'required']) }}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('password_confirmation', trans('messages.comfirm_password'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::password('password_confirmation', ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        {{ Form::label('phone', trans('messages.phone'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::text('phone', old('phone'), ['class' => 'form-control']) }}
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        {{ Form::label('address', trans('messages.address'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::textarea('address', old('address'), ['class' => 'form-control']) }}
            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('is_admin') ? ' has-error' : '' }}">
        {{ Form::label('is_admin', trans('messages.type_user'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
                {{ Form::select('is_admin', ['0' => trans('messages.user_member'), '1' => trans('messages.admin')], old('is_admin', '0'), ['class' => 'form-control']) }}
            @if ($errors->has('is_admin'))
                <span class="help-block">
                    <strong>{{ $errors->first('is_admin') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {{ Form::submit(trans('messages.create'), ['class' => 'btn btn-primary btn-sm active']) }}
            <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm active">{{ trans('messages.back') }}</a>
        </div>
    </div>
    {{ Form::close() }}
@endsection
