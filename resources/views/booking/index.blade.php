@extends('layouts.master') 
@include('common.errors')
<div class="container">
    <div class="detail_tour">
        <h3><strong>{{ $tour->title }}</strong></h3>
        <p>@lang('messages.dateOfDepart') {{ $tour->start_date }}</p>
        <p>@lang('messages.placeOfDepart') @lang('messages.danang')</p>
        <p>@lang('messages.seat') <span class="text-warning">{{ $tour->number_user }}</span></p>
        <p>@lang('messages.price_detail') <span class="text-danger">{{ $tour->price }} @lang('messages.usd')</span></p>
        <hr>
    </div>
    <h3 class="my-4">@lang('messages.custormer')</h3>
    <table class="table table-bordered">
        <tr>
            <td>@lang('messages.first_name')</td>
            <td>{{ $user->firstname }}</td>
        </tr>
        <tr>
            <td>@lang('messages.last_name')</td>
            <td>{{ $user->lastname }}</td>
        </tr>
        <tr>
            <td>@lang('messages.gender')</td>
            <td>{{ $user->male }}</td>
        </tr>
        <tr>
            <td>@lang('messages.cmnd')</td>
            <td>{{ $user->id_number }}</td> 
        </tr>
        <tr>
            <td>@lang('messages.birthday')</td>
            <td>{{ $user->date_of_birth }}</td>
        </tr>
        <tr>
            <td>@lang('messages.phone')</td>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <td>@lang('messages.address')</td>
            <td>{{ $user->address }}</td>
        </tr>
    </table>
    <a class="btn btn-success" href="{{ route('profile.edit', $user->id) }}">{{ trans('messages.edit') }}</a>
    <hr>
    <div class="form-group">
        <div class="col-md-12 padding">
            {{ Form::open(['route' => 'booking.store', 'method' => 'POST']) }}  
                {{ Form::hidden('user_id', Auth::user()->id ) }} 
                {{ Form::hidden('tour_id', $tour->id ) }} 
                {{ Form::hidden('depart_day', $tour->start_date) }}
                {{ Form::submit(trans('messages.booktour'), ['class' => 'btn btn-danger btn-lg col-md-12']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
<!-- /.container -->
