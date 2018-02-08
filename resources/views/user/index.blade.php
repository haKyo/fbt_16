@extends('layouts.master')
<div class="container">
    <h2 class="my-4">@lang('messages.profile')</h2>
    {{ Form::open(['route' => ['profile.update', $user->id]]) }}
        {{ method_field('PUT') }}
        <div class="input-group col-md-10 padding">
            <div class="input-group-prepend">
                <span class="input-group-text input-line"><i class="fa fa-user"></i></span>
            </div>
            {{ Form::text('firstname', $user->firstname, ['class' => 'form-control', 'placeholder' => trans('messages.first_name')]) }}
            @if ($errors->has('firstname'))
                <span class="help-block">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group col-md-10 padding">
            <div class="input-group-prepend">
                <span class="input-group-text input-line"><i class="fa fa-user"></i></span>
            </div>
            {{ Form::text('lastname', $user->lastname, ['class' => 'form-control', 'placeholder' => trans('messages.last_name')]) }}
            @if ($errors->has('lastname'))
                <span class="help-block">
                    <strong>{{ $errors->first('lastname') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group col-md-10 padding">
            <div class="input-group-prepend">
                <span class="input-group-text input-line"><i class="fa fa-envelope"></i></span>
            </div>
            {{ Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => trans('messages.email')]) }}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group col-md-10 padding">
            <div class="input-group-prepend">
                <span class="input-group-text input-line"><i class="fa fa-male"></i></span>
            </div>
            {{ Form::select('male', ['0' => trans('messages.choose'), '1' => trans('messages.male'), '0' => trans('messages.famale') ], $user->male, ['class' => 'custom-select', 'placeholder' => trans('messages.choose')]) }}
            @if ($errors->has('male'))
                <span class="help-block">
                    <strong>{{ $errors->first('male') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group col-md-10 padding">
            <div class="input-group-prepend">
                <span class="input-group-text input-line"><i class="fa fa-user-secret"></i></span>
            </div>
            {{ Form::text('id_number', $user->id_number , ['class' => 'form-control', 'placeholder' => trans('messages.cmnd')]) }}
            @if ($errors->has('id_number'))
                <span class="help-block">
                    <strong>{{ $errors->first('id_number') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group col-md-10 padding">
            <div class="input-group-prepend">
                <span class="input-group-text input-line"><i class="fa fa-birthday-cake"></i></span>
            </div>
            {{ Form::text('date_of_birth', $user->date_of_birth , ['class' => 'form-control', 'placeholder' => trans('messages.birthday')]) }}
            @if ($errors->has('date_of_birth'))
                <span class="help-block">
                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group col-md-10 padding">
            <div class="input-group-prepend">
                <span class="input-group-text input-line"><i class="fa fa-mobile"></i></span>
            </div>
            {{ Form::text('phone', $user->phone , ['class' => 'form-control', 'placeholder' => trans('messages.phone_munber')]) }}
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group col-md-10 padding">
            <div class="input-group-prepend">
                <span class="input-group-text input-line"><i class="fa fa-map-marker"></i></span>
            </div>
            {{ Form::text('address', $user->address , ['class' => 'form-control', 'placeholder' => trans('messages.address')]) }}
            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
        {{ Form::submit(trans('messages.updateprofile'), ['class' => 'btn btn-danger btn-lg col-md-10']) }}
    {{ Form::close() }}
</div>
