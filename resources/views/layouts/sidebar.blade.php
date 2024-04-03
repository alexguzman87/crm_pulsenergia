<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">


     <!-- LOGO -->
     <div class="navbar-brand-box">
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{URL::asset('assets/images/logoEbora.png')}}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{URL::asset('assets/images/logoEbora.png')}}" alt="" height="50"> <span class="logo-txt">ATENEA</span>
            </span>
        </a>

        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{URL::asset('assets/images/logoEbora.png')}}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{URL::asset('assets/images/logoEbora.png')}}" alt="" height="50"> <span class="logo-txt">ATENEA</span>
            </span>
        </a>
    </div>
    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>
    <div data-simplebar class="sidebar-menu-scroll">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                <li>
                    <a href="/">
                        <i class="bx bx-home-circle nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="bx bx-user nav-icon"></i>
                        <span class="has-arrow" data-key="t-authentication">Usuarios</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/user" class="menu-item" data-key="t-signin">Listado Usuarios</a>
                            <a href="/user_create" class="menu-item" data-key="t-signin">Crear Usuario</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="https://wiki.eboraformacion.es" target="_blank">
                        <i class="bx bx-book nav-icon"></i> <span>Wiki</span>
                    </a>
                </li>
                <li class="menu-title" data-key="t-layouts">CRM</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-user-pin nav-icon"></i>
                        <span class="menu-item" data-key="t-contacts">Contactos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/contact" data-key="t-user-grid">Listado</a></li>
                        <li><a href="contact_create" data-key="t-user-grid">Agregar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>