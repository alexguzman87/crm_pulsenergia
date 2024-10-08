<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
           <!-- LOGO -->
           <div class="navbar-brand-box">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{URL::asset('assets/images/logo-pulse-favicon.jpg')}}" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{URL::asset('assets/images/logo-pulse-favicon.jpg')}}" alt="" height="26"> <span class="logo-txt">PULSE</span>
                    </span>
                </a>
                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{URL::asset('assets/images/logo-pulse-favicon.jpg')}}" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{URL::asset('assets/images/logo-pulse-favicon.jpg')}}" alt="" height="26"> <span class="logo-txt">PULSE</span>
                    </span>
                </a>
            </div>
            
            <button type="button" class="btn btn-sm px-3 header-item vertical-menu-btn noti-icon">
                <i class="fa fa-fw fa-bars font-size-16"></i>
            </button>

            <!--FORMATO DE BUSCADOR 
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Buscar...">
                    <span class="bx bx-search icon-sm"></span>
                </div>
            </form>
            -->
         
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block d-block d-lg-none">
                <button type="button" class="btn header-item noti-icon"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-search icon-sm"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                    <form class="p-2">
                        <div class="search-box">
                            <div class="position-relative">
                                <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                <i class="bx bx-search search-icon"></i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           <!--
            <div class="dropdown d-inline-block language-switch">
                <button type="button" class="btn header-item noti-icon"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img id="header-lang-img" src="assets/images/flags/us.jpg" alt="Header Language" height="16">
                </button>
                <div class="dropdown-menu dropdown-menu-end">                    
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="eng">
                        <img src="{{URL::asset('assets/images/flags/us.jpg')}}" alt="user-image" class="me-2" height="12"> <span class="align-middle">English</span>
                    </a>                     
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                        <img src="{{URL::asset('assets/images/flags/spain.jpg')}}" alt="user-image" class="me-2" height="12"> <span class="align-middle">Spanish</span>
                    </a>                    
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                        <img src="{{URL::asset('assets/images/flags/germany.jpg')}}" alt="user-image" class="me-2" height="12"> <span class="align-middle">German</span>
                    </a>                    
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                        <img src="{{URL::asset('assets/images/flags/italy.jpg')}}" alt="user-image" class="me-2" height="12"> <span class="align-middle">Italian</span>
                    </a>                    
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                        <img src="{{URL::asset('assets/images/flags/russia.jpg')}}" alt="user-image" class="me-2" height="12"> <span class="align-middle">Russian</span>
                    </a>
                </div>
            </div>
            -->
            <div class="dropdown d-inline-block">
                {{--<button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell icon-sm"></i>
                    <span class="noti-dot bg-danger rounded-pill">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-15"> Notifications </h5>
                            </div>
                            <div class="col-auto">
                                <a href="javascript:void(0);" class="small"> Mark all as read</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 250px;">
                        <h6 class="dropdown-header bg-light">New</h6>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex border-bottom align-items-start">
                                <div class="flex-shrink-0">
                                    <img src="{{URL::asset('assets/images/users/avatar-3.jpg')}}"
                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Justin Verduzco</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-13">Your task changed an issue from "In Progress" to <span class="badge badge-soft-success">Review</span></p>
                                        <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex border-bottom align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm me-3">
                                        <span class="avatar-title bg-primary rounded-circle font-size-16">
                                            <i class="uil-shopping-basket"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">New order has been placed</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-13">Open the order confirmation or shipment confirmation.</p>
                                        <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> 5 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <h6 class="dropdown-header bg-light">Earlier</h6>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex border-bottom align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm me-3">
                                        <span class="avatar-title bg-soft-success text-success rounded-circle font-size-16">
                                            <i class="uil-truck"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your item is shipped</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-13">Here is somthing that you might light like to know.</p>
                                        <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> 1 day ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex border-bottom align-items-start">
                                <div class="flex-shrink-0">
                                    <img src="{{URL::asset('assets/images/users/avatar-4.jpg')}}"
                                        class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Salena Layfield</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-13">Yay ! Everything worked!</p>
                                        <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> 3 days ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="uil-arrow-circle-right me-1"></i> <span>View More..</span>
                        </a>
                    </div>
                </div>--}}
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle" id="right-bar-toggle">
                    <i class="bx bx-cog icon-sm"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{URL::asset('images/'.auth()->user()->image)}}"
                    alt="Header Avatar">
                    <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                        <span class="user-name">{{auth()->user()->username}} <i class="mdi mdi-chevron-down"></i></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <h6 class="dropdown-header">{{auth()->user()->username}}</h6>
                    <a class="dropdown-item" href="/user_edit/{{auth()->user()->id}}"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Perfil</span></a>
                    <a class="dropdown-item" href="/user"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Usuarios</span></a>
                    <!--<a class="dropdown-item" href="apps-chat"><i class="mdi mdi-message-text-outline text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Mensajes</span></a>
                    <a class="dropdown-item" href="apps-kanban-board"><i class="mdi mdi-calendar-check-outline text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
                    <a class="dropdown-item" href="pages-faqs"><i class="mdi mdi-lifebuoy text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-wallet text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$6951.02</b></span></a>
                    <a class="dropdown-item d-flex align-items-center" href="contacts-settings"><i class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Settings</span><span class="badge badge-soft-success ms-auto">New</span></a>
                    <a class="dropdown-item" href="auth-lockscreen-cover"><i class="mdi mdi-lock text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>-->
                    <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Cerrar Sesión</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @yield('breadcrumb')
    </div> 
    @if(Route::is('home') )
    <div class="collapse show verti-dash-content" id="dashtoggle">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card dash-header-box shadow-none border-0">
                        <div class="card-body p-0">
                            <div class="row row-cols-xxl-6 row-cols-md-3 row-cols-1 g-0">
                                <div class="col">
                                    <div class="mt-md-0 py-3 px-4 mx-2">
                                        <p class="text-white-50 mb-2 text-truncate">Tareas en Proceso </p>
                                        <h3 class="text-white mb-0">{{$task_process}}</h3>
                                    </div>
                                </div> 
                                <div class="col">
                                    <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                        <p class="text-white-50 mb-2 text-truncate">Tareas Pendientes</p>
                                        <h3 class="text-white mb-0">{{$task_toDo}}</h3>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                        <p class="text-white-50 mb-2 text-truncate">Presupuestos</p>
                                        <h3 class="text-white mb-0">{{number_format($budget,2,",",".")}}</h3>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                        <p class="text-white-50 mb-2 text-truncate">Ventas Exitosas</p>
                                        <h3 class="text-white mb-0">{{number_format($sales,2,",",".")}}</h3>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-3 mt-lg-0 py-3 px-4 mx-2">
                                        <p class="text-white-50 mb-2 text-truncate">Leads</p>
                                        <h3 class="text-white mb-0">{{$lead}}</h3>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-3 mt-lg-0 py-3 px-4 mx-2">
                                        <p class="text-white-50 mb-2 text-truncate">Leads Muy Probables</p>
                                        <h3 class="text-white mb-0">{{$lead_very_likely}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <div>
        <a class="dash-troggle-icon" id="dash-troggle-icon" data-bs-toggle="collapse" href="#dashtoggle" aria-expanded="true" aria-controls="dashtoggle">
            <i class="bx bx-up-arrow-alt"></i>
        </a>
    </div>    
    @endif
   
</header>