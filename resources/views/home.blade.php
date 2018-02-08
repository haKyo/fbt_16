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
        <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
                <h3>@lang('messages.slider')</h3>
                <p>@lang('messages.title_slider')</p>
            </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
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
    <h2 class="my-4">@lang('messages.search_tour')</h2>
    <!-- Marketing Icons Section -->
    <div class="inner">
        {{ Form::open(['route' => 'search', 'method' => 'GET', 'role' => 'search']) }}
            <div class="form-group">
                {{ Form::label('title', trans('messages.title_tour'), ['class' => 'control-label']) }}
                {{ Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => trans('messages.title_tour')]) }}
            </div>
            <div class="form-group">
                {{ Form::label('category', trans('messages.type_tour'), ['class' => 'control-label']) }}
                {{ Form::select('category_id', ['0' => 'Select...'] + $categories, old('category_id', null), ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('startDate', trans('messages.date_depart'), ['class' => 'control-label']) }}
                {{ Form::text('startDate', old('startDate'), ['class' => 'form-control', 'placeholder' => trans('messages.date_depart')]) }}
            </div>
            <div class="form-group">
                {{ Form::label('price', trans('messages.price_min'), ['class' => 'control-label']) }}
                {{ Form::select('price_min', [ '0' => '0', '1000' => '1000', '2000' => '2000', '5000' => '5000', '9000' => '9000'], null, ['class' => 'custom-select', 'placeholder' => trans('messages.price_home')]) }}
            </div>
            <div class="form-group">
                {{ Form::label('price', trans('messages.price_max'), ['class' => 'control-label']) }}
                {{ Form::select('price_max', [ '9000' => '9000', '10000' => '10000', '90000' => '90000', '100000' => '100000'], null, ['class' => 'custom-select', 'placeholder' => trans('messages.price_home')]) }}
            </div>
            {{ Form::submit(trans('messages.search'), ['class' => 'btn btn-outline-success my-2 my-sm-0']) }}
        {{ Form::close() }}

    </div>
    <h2 class="my-4">@lang('messages.heading')</h2>
    <div class="row">
        @if (count($tours))
            @foreach($tours as $tour)
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <p class="card_img"><img class="card-img-top" src="{{ $tour->images }}" alt=""></a></p>
                        <div class="card-body">
                            <h4 class="card-title card-min text-info"><strong>{{ $tour->title }}</strong></h4>
                            <p class="card-text">@lang('messages.depart') {{ $tour->start_date }}</p>
                            <p class="text-danger bg-dange">{{ $tour->price }} @lang('messages.usd')</p>
                            <a href="{{ action('TourController@show', $tour->id) }}" class="btn btn-raised btn-info">@lang('messages.detail')</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12">
                {{ $tours->links('pagination::bootstrap-4') }} 
            </div>
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
