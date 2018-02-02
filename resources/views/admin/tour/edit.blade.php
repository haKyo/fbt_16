@extends('admin.master')

@section('content')
@include('common.errors')
    <h2><i class="fa fa-pencil"></i> {{ trans('messages.create_tour') }}</h2>
    @if(count($tour))
    {{ Form::open(['route' => ['tour.update', $tour->id], 'enctype' => 'multipart/form-data', 'role' => 'form', 'method' => 'PUT']) }}
        <div class="form-group{{ $errors->has('title_tour') ? ' has-error' : '' }}">
            {{ Form::label('title', trans('messages.title_tour'), ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::text('title', old('title', $tour->title), ['class' => 'form-control', 'required']) }}
            </div>
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            {{ Form::label('description', trans('messages.des_tour'), ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::textarea('description', old('description', $tour->description), ['class' => 'form-control']) }}
            </div>
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('images') ? ' has-error' : '' }}">
            {{ Form::label('images', trans('messages.img_tour'), ['class' => 'col-md-3 control-label']) }}
            <div class="col-md-9">
                {{ Form::file('images', ['class' => 'btn btn-success']) }}
                @if ($errors->has('images'))
                    <span class="help-block">
                        <strong>{{ $errors->first('images') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('number_user') ? ' has-error' : '' }}">
            {{ Form::label('number_user', trans('messages.number_user'), ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::text('number_user', old('number_user', $tour->number_user), ['class' => 'form-control']) }}
            </div>
            @if ($errors->has('number_user'))
                <span class="help-block">
                    <strong>{{ $errors->first('number_user') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
            {{ Form::label('start_date', trans('messages.start'), ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::date('start_date', old('start_date', $tour->start_date), ['id' => 'datepicker', 'class' => 'form-control']) }}
            </div>
            @if ($errors->has('start_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('start_date') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
            {{ Form::label('end_date', trans('messages.end'), ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::date('end_date', old('end_date', $tour->end_date), ['id' => 'datepicker', 'class' => 'form-control']) }}
            </div>
            @if ($errors->has('end_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('end_date') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            {{ Form::label('price', trans('messages.price'), ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::text('price', old('price', $tour->price), ['class' => 'form-control']) }}
            </div>
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
            {{ Form::label('category_id', trans('messages.category'), ['class' => 'col-md-3 control-label']) }}
            <div class="col-md-6">
                {{ Form::select('category_id', $categories, old('category_id', $tour->category_id), ['class' => 'form-control']) }}
                @if ($errors->has('category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
            {{ Form::submit(trans('messages.update_tour'), ['class' => 'btn btn-primary btn-sm active']) }}
        </div>
        @endif
    {{ Form::close() }}
@endsection
