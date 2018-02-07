@extends('layouts.master') 
<div class="container">
    @include('common.session')    
    <h2 class="my-4">@lang('messages.title_tour')</h2>
    <table class="table table-bordered">
        <tr>
            <td>@lang('messages.destination')</td>
            <td>{{ $booking->tour->title }}</td>
        </tr>
        <tr>
            <td>@lang('messages.dateOfDepart')</td>
            <td>{{ $booking->tour->start_date }}</td>
        </tr>
        <tr>
            <td>@lang('messages.placeOfDepart')</td>
            <td>@lang('messages.danang')</td>
        </tr>
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
        <tr>
            <td>@lang('messages.price_detail')</td>
            <td><p class="text-danger"><strong>{{ $booking->tour->price }} @lang('messages.usd')</p></strong></td>
        </tr>
    </table>
    <div class="padding">
        <div class="col-md-6 float-left">
            <a class="btn btn-success" href="#">@lang('messages.pay')</a>
        </div>
        <div class="col-md-6 float-right text-right">
            {{ Form::open(['route' => ['booking.update', $booking->id], 'class' => 'button-form']) }}
                {{ method_field('PUT') }}
                {{ Form::hidden('status', config('setting.status')) }}
            {{ Form::button(trans('messages.access'), ['type' => 'submit','class' => 'btn btn-primary']) }}
        {{ Form::close() }}
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#delete">@lang('messages.cancel')</button>
        </div>
    </div>
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @lang('messages.cancel_tour')
            </div>
            <div class="modal-footer">
                {{ Form::open(['route' => ['booking.destroy', $booking->id], 'class' => 'button-form']) }}
                    {{ method_field('DELETE') }}
                    {{ Form::button(trans('messages.cancel'), ['type' => 'submit','class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
