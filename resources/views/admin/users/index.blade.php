@extends('admin.master')
@section('content')
@include('common.session')
    <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> {{ trans('messages.add') }}</a>
    <table class="table thead-dark table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>{{ trans('messages.stt') }}</th>
                <th>{{ trans('messages.select') }}</th>
                <th>{{ trans('messages.username') }}</th>
                <th>{{ trans('messages.email') }}</th>
                <th colspan="2">{{ trans('messages.action') }}</th>
            </tr>
        </thead>
         @if(count($users))
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if (Auth::user()->id == $user->id)
                            <span>Admin</span>
                        @endif
                        @if (Auth::user()->id != $user->id && $user->id != config('setting.idBossAdmin'))
                            <span>User</span>
                        @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if ($user->id != config('setting.idBossAdmin') || Auth::user()->id == config('setting.idBossAdmin'))
                        <td>
                            {{ Form::open(['route' => ['user.edit', $user->id], 'method' => 'GET', 'class' => 'button-form']) }}
                                {{ Form::button('<i class="fa fa-pencil"></i> ', ['type' => 'submit', 'class' => 'btn btn-info']) }}
                            {{ Form::close() }}
                        </td>
                        <td>
                            @if (Auth::user()->id != $user->id)
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
                            @endif
                        </td>
                    @endif
                </tr>
            @endforeach
        @endif
    </table>
    <div class="col-md-12">
        {{ $users->links() }}
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('messages.del')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('messages.modal_delete')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('messages.close')</button>
                    {{ Form::open(['route' => ['user.destroy', $user->id], 'class' => 'button-form']) }}
                        {{ method_field('DELETE') }}
                        {{ Form::button(trans('messages.delete'), ['type' => 'submit','class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
