@extends('admin.master')

@section('content-title', 'home')

@section('content')
<div class="row">
    <div class="col-md-12 col-md-offset-2">
        <div class="card_broad">
            <div class="header">
                <h4 class="title">{{ trans('messages.hello_admin') }} {{ Auth::user()->name }} !</h4>
            </div>
            <div class="content">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                @lang('messages.txt_login')
            </div>
        </div>
    </div>
</div>
@endsection
