@extends('layouts.master')
<div class="container">
    <h2 class="my-4">@lang('messages.search_tour')</h2>
    <h3 class="my-5">@lang('messages.keyword')</h3>
    <div class="row">
        @if (count($searchs))
            @foreach($searchs as $search)
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <p class="card_img"><img class="card-img-top" src="{{ $search->images }}" alt=""></a></p>
                        <div class="card-body">
                            <h4 class="card-title card-min">
                                <a href="{{ action('TourController@show', $search->id) }}"> {{ $search->title }}</a>
                            </h4>
                            <p class="card-text">@lang('messages.depart') {{ $search->start_date }}</p>
                            <p class="text-danger bg-dange">{{ $search->price }} @lang('messages.usd')</p>
                            <a href="{{ action('TourController@show', $search->id) }}" class="btn btn-raised btn-info">@lang('messages.detail')</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12">
                {{ $searchs->appends(\Request::except('_token'))->render() }}
            </div>
        @endif
    </div>
   
</div>
<!-- Portfolio Section -->
