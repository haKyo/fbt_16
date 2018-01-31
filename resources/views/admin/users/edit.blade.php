@extends('admin.master')

@section('content')

@include('common.errors')

	<h2><i class="fa fa-pencil"></i> {{ trans('messages.edituser') }}</h2>
	@if (count($user))
        {{ Form::open(['route' => ['user.update', $user->id]]) }}
            {{ method_field('PUT') }}
            {{ Form::label('name', trans('messages.username')) }}
            <div class="col-6">
                {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
            </div>
            <br>
            {{ Form::label('password', trans('messages.password')) }}
            <div class="col-6">
                {{ Form::password('password', ['class' => 'form-control', 'required']) }}
            </div>
            @if ($errors->has('password'))
                <span class="help-block text-warning">{{ $errors->first('password') }}</span>
            @endif
            <br>
            {{ Form::label('email', trans('messages.email')) }}
            <div class="col-6">
                {{ Form::email('email', $user->email, ['class' => 'form-control']) }}
            </div>
            <br></br>
            {{ Form::submit(trans('messages.edit'), ['class' => 'btn btn-raised btn-success']) }}
        {{ Form::close() }}
    @endif
@endsection
