@extends('layouts.master')
<div class="container">
    <h2 class="my-4">@lang('messages.profile')</h2>
    <div class="container">
        @include('common.session')
        <h3 class="my-4">{{ $user->name }}</h3>
        <table class="table table-bordered table-striped">
            <tr>
                <td>@lang('messages.first_name')</td>
                <td>{{ $user->firstname }}</td>
            </tr>
            <tr>
                <td>@lang('messages.last_name')</td>
                <td>{{ $user->lastname }}</td>
            </tr>
            <tr>
                <td>@lang('messages.email')</td>
                <td>{{ $user->email }}</td>
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
        <a class="btn btn-success" href="{{ route('profile.edit', $user->id) }}">{{ trans('messages.upProfile') }}</a>
        <div class="padding"></div>
    </div>
</div>
