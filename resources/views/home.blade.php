@extends('layouts.master')

@section('content-title', 'Home')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('../../storage/images/city.jpg')">
            <div class="carousel-caption d-none d-md-block">
                <h3>@lang('messages.slider')</h3>
                <p>@lang('messages.title_slider')</p>
            </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('../../storage/images/city.jpg')">
            <div class="carousel-caption d-none d-md-block">
                <h3>@lang('messages.slider')</h3>
                <p>@lang('messages.title_slider')</p>
            </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
                <h3>@lang('messages.slider')</h3>
                <p>@lang('messages.title_slider')</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">@lang('.messages.previous')</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">@lang('.messages.next')</span>
    </a>
</div>
<div class="container">
    <h1 class="my-4">@lang('messages.wel')</h1>
    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <h4 class="card-header">@lang('messages.card_title')</h4>
                <div class="card-body">
                    <p class="card-text">@lang('messages.card_text')</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">@lang('messages.learn_more')</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <h4 class="card-header">@lang('messages.card_title')</h4>
                <div class="card-body">
                    <p class="card-text">@lang('messages.card_text')</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">@lang('messages.learn_more')</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <h4 class="card-header">@lang('messages.card_title')</h4>
                <div class="card-body">
                    <p class="card-text">@lang('messages.card_text')</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">@lang('messages.learn_more')</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- Portfolio Section -->
    <h2>@lang('messages.heading')</h2>
    <div class="row">
        @if(count($tours))
            @foreach($tours as $tour)
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <p class="card_img"><img class="card-img-top" src="{{ $tour->images }}" alt=""></a></p>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ action('TourController@show', $tour->id) }}"> {{ $tour->title }}</a>
                            </h4>
                            <p class="card-text">@lang('messages.depart') {{ $tour->start_date }}</p>
                            <p class="text-danger">{{ $tour->price }} @lang('messages.usd')</p>
                            <a href="{{ action('TourController@show', $tour->id) }}" class="btn btn-raised btn-info">@lang('messages.detail')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-6">
            <h2>@lang('messages.txt_features')</h2>
            <p>@lang('messages.info')</p>
            <p>@lang('messages.txt_content')</p>
        </div>
        <div class="col-lg-6">
            <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
        </div>
    </div>
    <!-- /.row -->
    <hr>
    <!-- Call to Action Section -->
    <div class="row mb-4">
        <div class="col-md-8">
            <p>@lang('messages.txt_content')</p>
        </div>
        <div class="col-md-4">
            <a class="btn btn-lg btn-secondary btn-block" href="#">@lang('messages.btn_action')</a>
        </div>
    </div>
</div>
<!-- /.container -->
@endsection
