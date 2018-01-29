@extends('admin.master')
@section('content')
	<table class="table thead-dark">
		<thead class="thead-dark">
			<tr>
				<th>{{ trans('messages.stt') }}</th>
				<th>{{ trans('messages.select') }}</th>
				<th>{{ trans('messages.username') }}</th>
				<th>{{ trans('messages.email') }}</th>
				<th colspan="2"></th>
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
	                    <input type="checkbox" class="icheck checkbox-input user-check" name="checkbox1" userId="{{ $user->id }}"/>
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
                            {{ Form::open(['route' => ['user.destroy', $user->id], 'class' => 'button-form']) }}
                                {{ method_field('DELETE') }}
                                {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit','class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
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
@endsection
