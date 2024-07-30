<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">


     <!-- LOGO -->
     <div class="navbar-brand-box">
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{URL::asset('assets/images/logo-pulse-favicon.jpg')}}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{URL::asset('assets/images/logo-pulse-favicon.jpg')}}" alt="" height="50"> <span class="logo-txt"></span>
            </span>
        </a>

        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{URL::asset('assets/images/logo-pulse-favicon.jpg')}}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{URL::asset('assets/images/logo-pulse-favicon.jpg')}}" alt="" height="50"> <span class="logo-txt"></span>
            </span>
        </a>
    </div>
    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>
    <div data-simplebar class="sidebar-menu-scroll">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">MENÚ</li>
                <li>
                    <a href="/">
                        <i class="bx bx-home-circle nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">RESUMEN</span>
                    </a>
                </li>
                <li class="menu-title" data-key="t-menu">MÓDULOS</li>
                <!--li class="menu-item">
                    <a href="https://wiki.eboraformacion.es" target="_blank">
                        <i class="bx bx-book nav-icon"></i> <span>LEADS</span>
                    </a>
                </li>-->
                
                @if(auth()->user()->type_user=='admin')
                <li>
                    <a href="/lead">
                        <i class="bx bx-user-circle nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">LEADS</span>
                    </a>
                </li>
                @else
                <li>
                    <a href="/lead_show_user/{{auth()->user()->id}}">
                        <i class="bx bx-user-circle nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">LEADS</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->type_user=='admin')
                <li>
                    <a href="/client">
                        <i class="bx bx-user-check nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">CLIENTES</span>
                    </a>
                </li>
                @else
                <li>
                    <a href="/client_show_user/{{auth()->user()->id}}">
                        <i class="bx bx-user-check nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">CLIENTES</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="/general_task">
                        <i class="bx bx-chat nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">TAREAS</span>
                    </a>
                </li>               
                <li>
                    <a href="/calendar">
                        <i class="bx bx-calendar nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">CALENDARIO</span>
                    </a>
                </li>
                @if(auth()->user()->type_user=='admin')
                <li>
                    <a href="/oportunity">
                        <i class="bx bxl-trello nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">OPORTUNIDADES</span>
                    </a>
                </li>
                @else
                <li>
                    <a href="/oportunity_show_user/{{auth()->user()->id}}">
                        <i class="bx bxl-trello nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">OPORTUNIDADES</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="/leadsWeb">
                        <i class="bx bx-mail-send nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">LEADS WEB</span>
                    </a>
                </li>
                @if(auth()->user()->type_user=='admin')
                <li class="menu-title" data-key="t-menu">CONFIGURACIÓN</li>
                <li>
                    <a href="/user">
                        <i class="bx bx-user nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">USUARIOS</span>
                    </a>
                </li>
                <li>
                    <a href="/config_lead_origin">
                        <i class="bx bx-list-plus nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">ORIGEN DE LEADS</span>
                    </a>
                </li>
                <li>
                    <a href="/config_type_lead">
                        <i class="bx bx-list-plus nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">TIPOS DE LEADS</span>
                    </a>
                </li>
                <li>
                    <a href="/config_level_lead">
                        <i class="bx bx-list-plus nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">NIVEL DE LEADS</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>