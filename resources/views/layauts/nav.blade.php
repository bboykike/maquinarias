<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed">

    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i
            class="la la-close"></i></button>
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
        <div class="kt-header-logo">
            <a class="navbar-brand" href="{{ route('diponibilidad') }}" style="color: white;">
                <img src="/img/logodejesus.png" width="130">
            </a>
        </div>
        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
            <ul class="kt-menu__nav">
                <li class="kt-menu__item primary"><a href="{{ route('disp') }}" class="kt-menu__link  primary"><span
                            class="kt-menu__link-text primary">Disponibilidad</span></a></li>
                <li class="kt-menu__item"><a href="{{route('clientes')}}" class="kt-menu__link "><span
                            class="kt-menu__link-text">Clientes</span></a></li>
                <li class="kt-menu__item"><a href="{{route('maquinas')}}" class="kt-menu__link "><span
                            class="kt-menu__link-text">Maquinas</span></a></li>
                <li class="kt-menu__item"><a href="{{ route('operadores') }}" class="kt-menu__link "><span
                            class="kt-menu__link-text">Operadores</span></a></li>
                <li class="kt-menu__item"><a href="{{ route('servicios')}}" class="kt-menu__link "><span
                            class="kt-menu__link-text">Servicios</span></a></li>
                <li class="kt-menu__item"><a href="{{route('logs')}}" class="kt-menu__link "><span
                            class="kt-menu__link-text">Logs</span></a></li>
                <li class="kt-menu__item"><a href="{{ route('vendedores')}}" class="kt-menu__link "><span
                            class="kt-menu__link-text">Vendedores</span></a></li>
            </ul>
        </div>
    </div>
    <div class="kt-header__topbar">
        <div class="kt-header__topbar-item dropdown">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
                <div class="kt-header__topbar-item kt-header__topbar-item--user">
                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                        <div class="kt-header__topbar-user">
                            <span class="kt-header__topbar-welcome kt-hidden-mobile">Bienvenido,</span>
                            <span class="kt-header__topbar-username kt-hidden-mobile">{{ Auth::user()->name }}</span>
                            <img alt="Pic" class="kt-radius-100" src="assets/media/users/usuario.png" />
                        </div>
                    </div>
                    <div
                        class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                        <!--begin: Navigation -->
                        <div style="background-color:#201F2B;" class="kt-notification">

                            <div class="kt-notification__custom kt-space-between">
                                <a href="custom/user/login-v2.html" target="_blank"
                                    class="btn btn-clean btn-sm btn-bold"></a>
                                <a href="{{ route('logout') }}" target="_blank" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"
                                    class="btn btn-label btn-label-brand btn-sm btn-bold">Cerrar Sesión</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>

                        <!--end: Navigation -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>