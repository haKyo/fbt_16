@extends('layouts.master')
<div class="container">
    {{ Form::open(['class'=> 'well form-horizontal']) }}
    <div class="detail_tour">
        <h3><strong>{{ $tour->title }}</strong></h3>
        <p>@lang('messages.dateOfDepart') {{ $tour->booking->date }}</p>
        <p>@lang('messages.placeOfDepart') @lang('messages.danang')</p>
        <p>@lang('messages.seat') <span class="text-warning">{{ $tour->number_user }}</span></p>
        <p>@lang('messages.price_detail') <span class="text-danger">{{ $tour->price }} @lang('messages.usd')</span></p>
        <hr>
    </div>
    <div class="inner">
        <div class="left">
            <h2>@lang('messages.communications')</h2>
            <div class="input-group col-md-10 padding">
                <div class="input-group-prepend">
                    <span class="input-group-text input-line"><i class="fa fa-user"></i></span>
                </div>
                {{ Form::text('first_name', null , ['class' => 'form-control', 'placeholder' => trans('messages.first_name')]) }}
            </div>
            <div class="input-group col-md-10 padding">
                <div class="input-group-prepend">
                    <span class="input-group-text input-line"><i class="fa fa-user"></i></span>
                </div>
                {{ Form::text('last_name', null , ['class' => 'form-control', 'placeholder' => trans('messages.last_name')]) }}
            </div>
            <!-- Text input-->
            <div class="input-group col-md-10 padding">
                <div class="input-group-prepend">
                    <span class="input-group-text input-line"><i class="fa fa-male"></i></span>
                </div>
                {{ Form::select('male', [ '0' => 'Choose...', '1' => 'Male', '0' => 'Female'], null, ['class' => 'custom-select', 'placeholder' => trans('messages.choose')]) }}
            </div>
            <div class="input-group col-md-10 padding">
                <div class="input-group-prepend">
                    <span class="input-group-text input-line"><i class="fa fa-user-secret"></i></span>
                </div>
                {{ Form::text('id_number', null , ['class' => 'form-control', 'placeholder' => trans('messages.id')]) }}
            </div>
            <div class="input-group col-md-10 padding">
                <div class="input-group-prepend">
                    <span class="input-group-text input-line"><i class="fa fa-birthday-cake"></i></span>
                </div>
                {{ Form::text('date_of_birth', null , ['class' => 'form-control', 'placeholder' => trans('messages.birthday')]) }}
            </div>
            <div class="input-group col-md-10 padding">
                <div class="input-group-prepend">
                    <span class="input-group-text input-line"><i class="fa fa-envelope"></i></span>
                </div>
                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('messages.email')]) }}
            </div>
            <div class="input-group col-md-10 padding">
                <div class="input-group-prepend">
                    <span class="input-group-text input-line"><i class="fa fa-mobile"></i></span>
                </div>
                {{ Form::text('phone', null , ['class' => 'form-control', 'placeholder' => trans('messages.phone_munber')]) }}
            </div>
            <div class="input-group col-md-10 padding">
                <div class="input-group-prepend">
                    <span class="input-group-text input-line"><i class="fa fa-map-marker"></i></span>
                </div>
                {{ Form::text('address', null , ['class' => 'form-control', 'placeholder' => trans('messages.address')]) }}
            </div>
            <div class="input-group col-md-10 padding">
                <div class="input-group-prepend">
                    <span class="input-group-text input-line"><i class="fa fa-user-plus"></i></span>
                </div>
                {{ Form::text('number_human', null , ['class' => 'form-control', 'placeholder' => trans('messages.human')]) }}
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <div class="col-md-12 padding">
            {{ Form::submit(trans('messages.booktour'), ['class' => 'btn btn-danger btn-lg col-md-12']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>
<!-- /.container -->
