@extends('admin.master')
@section('content')
    @include('common.session')
    <a href="{{ route('tour.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> {{ trans('messages.add_tour') }}</a>
    <table class="table thead-dark table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>{{ trans('messages.stt') }}</th>
                <th>{{ trans('messages.title_tour') }}</th>
                <th>{{ trans('messages.des_tour') }}</th>
                <th>{{ trans('messages.img_tour') }}</th>
                <th>{{ trans('messages.number_user') }}</th>
                <th>{{ trans('messages.start') }}</th>
                <th>{{ trans('messages.end') }}</th>
                <th>{{ trans('messages.price') }}</th>
                <th colspan="2">{{ trans('messages.action') }}</th>
            </tr>
        </thead>
        @if(count($tours))
            @foreach ($tours as $tour)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tour->title }}</td>
                    <td width="25%">{{ $tour->description }}</td>
                    <td><img class="img-responsive img-thumbnail" src="{{ $tour->images }}" alt=""></td>
                    <td>{{ $tour->number_user }}</td>
                    <td>{{ $tour->start_date }}</td>
                    <td>{{ $tour->end_date }}</td>
                    <td>{{ $tour->price }}</td>
                    <td>
                        {{ Form::open(['route' => ['tour.edit', $tour->id], 'method' => 'GET', 'class' => 'button-form']) }}
                            {{ Form::button('<i class="fa fa-pencil"></i> ', ['type' => 'submit', 'class' => 'btn btn-info']) }}
                        {{ Form::close() }}
                    </td>
                    <td>     
                        {{ Form::open(['route' => ['tour.destroy', $tour->id], 'class' => 'button-form']) }}
                            {{ method_field('DELETE') }}
                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
    <div class="col-md-12">
        {{ $tours->links() }}
    </div>
@endsection

