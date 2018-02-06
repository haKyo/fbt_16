<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ trans('messages.title')}}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    @guest
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> @lang('messages.login')
                        </a>
                        @else
                        <a class="nav-link active" href="{{ route('profile.index') }}">
                            <i class="fa fa-user-circle" aria-hidden="true"></i> {{ Auth::user()->name }}
                        </a>
                    @endguest
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i> @lang('messages.register')
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>@lang('messages.logout')
                        </a>
                    </li>
                    {{ Form::open(['route' => 'logout', 'method' => 'POST', 'id' => 'logout-form']) }}
                    {{ Form::close() }}
                @endguest
            </ul>
        </div>
    </div>
</nav>
