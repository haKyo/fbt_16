@extends('layouts.master')

@if (isset($tour->id))
    <div class="container">
        <h1 class="mt-4 mb-3">{{ $tour->title }}</h1> 
        <!-- Page Content -->
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-8">
                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{ $tour->images }}" alt="">
                <hr>
                <!-- Date/Time -->
                <p>@lang('messages.depart') {{ $tour->start_date }} || @lang('messages.end') {{ $tour->end_date }}</p>
                <hr>
                <!-- Post Content -->
                <p class="lead">{{ $tour->description }}</p>
                <hr>
                <p>@lang('messages.price_detail') <span class="text-danger">{{ $tour->price }} {{ trans('messages.usd') }}</span> || @lang('messages.seatAvailability') <span class="text-warning">{{ $tour->number_user }}</span></p>
                <a href="#" class="btn btn-raised btn-lg btn-success">@lang('messages.booktour')</a>
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">@lang('messages.leave')</h5>
                    <div class="card-body">
                        {{ Form::open()}}
                            <div class="form-group">
                                {{ Form::textarea('comment', old('comment'), ['class' => 'form-control','rows' => 3]) }}
                            </div>
                            {{ Form::submit(trans('messages.btn_comment'), ['class' => 'btn btn-primary btn-sm active']) }}
                        {{ Form::close() }}
                    </div>
                </div>
                <!-- Single Comment -->
                <!-- Comment with nested comments -->
                @foreach($tour->reviewTours as $review)
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $review->user->name }}</h5>
                            <p>{{ $review->content }}</p>
                            @foreach($review->commentReviews as $comment)
                                <div class="media mt-4">
                                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{ $comment->user->name }}</h5>
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- comment -->
                @endforeach
            </div>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Search Widget -->
                <div class="card mb-4">
                    <h5 class="card-header">@lang('messages.search')</h5>
                    <div class="card-body">
                        <div class="input-group">
                            {{ Form::text('text', old('text'), ['class' => 'form-control', 'placeholder' => trans('messages.search')]) }}
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">@lang('messages.go')</button>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">@lang('messages.cat')</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="#">{{ $tour->category->name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endif
