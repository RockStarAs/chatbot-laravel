<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            {{ __('PedritoBot') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <i><img style="width:25px" src="{{ asset('images') }}/PedritoBot.svg"></i>
                    <p>{{ __('Utilidades') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="laravelExample">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('chatify') }}">
                                <i><img style="width:25px" src="{{ asset('images') }}/PedritoBot.svg"></i>
                                <span class="sidebar-normal"> {{ __('Chatbot') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                            <a class="nav-link" href="{{-- route('profile.edit') --}}">
                                <span class="sidebar-mini"> GU </span>
                                <span class="sidebar-normal">{{ __('Guía UNPRG') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('chatify') }}">
                    <i><img style="width:25px" src="{{ asset('images') }}/PedritoBot.svg"></i>
                    <span class="sidebar-normal"> {{ __('PedritoBot') }} </span>
                </a>
            </li>
            @if(Auth::user()->tipo_usuario == 'ADMIN')
            <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="true">
                    <i><span class="material-icons">
                            supervisor_account
                        </span></i>
                    <p>{{ __('ADMINISTRADOR') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="admin">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'gestionar' ? ' active' : '' }}">
                            <a class="nav-link" href="{{route('comando.index')}}">
                                <i><span class="material-icons">
                                        rule
                                    </span></i>
                                <span class="sidebar-normal"> {{ __('Gestionar comandos') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
            {{--<li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('table') }}">
                <i class="material-icons">content_paste</i>
                <p>{{ __('Table List') }}</p>
            </a>
            </li>
            <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('typography') }}">
                    <i class="material-icons">library_books</i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('icons') }}">
                    <i class="material-icons">bubble_chart</i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('map') }}">
                    <i class="material-icons">location_ons</i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('notifications') }}">
                    <i class="material-icons">notifications</i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('language') }}">
                    <i class="material-icons">language</i>
                    <p>{{ __('RTL Support') }}</p>
                </a>
            </li>
            <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
                <a class="nav-link text-white bg-danger" href="{{ route('upgrade') }}">
                    <i class="material-icons text-white">unarchive</i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li>--}}
        </ul>
    </div>
</div>
