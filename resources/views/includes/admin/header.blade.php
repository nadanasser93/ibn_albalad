
<nav class="navbar navbar-expand-sm">
    <div class="container">
    <!-- Brand -->
    <a class="navbar-brand" style="margin-top: -1.5em;" href="{{route('home')}}">Ibn ALbalad</a>

    <!-- Links -->
    <ul class="navbar-nav">
                <!-- Dropdown -->
        @if(\Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a  class="nav-link" href="{{ route('periods.index') }}">{{ trans('admin.periods.name') }}</a>
            </li>
        <li class="nav-item">
            <a  class="nav-link" href="{{ route('subscriptions.index') }}">{{ trans('admin.subscriptions.name') }}</a>
        </li>
            @else
            <li class="nav-item">
                <a  class="nav-link" href="{{ route('profile') }}">{{ trans('global.profile') }}</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link" href="{{route('companies.index')}}">{{ trans('global.companies') }}</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link" href="{{route('homes.index')}}">{{ trans('global.house_excange') }}</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link" href="{{route('employees.index')}}">{{ trans('global.employee_state') }}</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link" href="#">{{ trans('global.order_employee') }}</a>
            </li>
        @endif

    </ul>


    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="javascript:void(0)"
                       onclick="document.getElementById('logoutForm').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
    </div>
</nav>
