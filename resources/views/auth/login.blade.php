@extends('layouts.master-without-nav')
@section('title')Iniciar Sesión @endsection
@section('content')

<div class="auth-page d-flex align-items-center min-vh-100">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="d-flex flex-column h-100 py-5 px-4">
                    <div class="my-auto">
                        <div class="p-3 text-center">
                            <span class="logo-txt">ATENEA</span>
                        </div>
                        <div class="p-3 text-center">
                            <img src="{{URL::asset('assets/images/logoEbora.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>

                    <div class="mt-4 mt-md-5 text-center">
                        <p class="mb-0">© <script>
                                document.write(new Date().getFullYear())

                            </script><a href="{{url('https://eboraformacion.es/')}}" target="_blank"> Ebora Formación.</a> Creado por <a href="{{url('https://itglobalproject.com/')}}" target="_blank"><img src="{{URL::asset('assets/images/logoITGP.png')}}" alt="" height="35"></a></p>
                    </div>
                </div>

                <!-- end auth full page content -->
            </div>
            <!-- end col -->

            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg bg-light py-md-5 p-4 d-flex">
                    <div class="bg-overlay-gradient"></div>
                    <!-- end bubble effect -->
                    <div class="row justify-content-center g-0 align-items-center w-100">
                        <div class="col-xl-4 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="px-3 py-3">
                                        <div class="text-center">
                                            <h5 class="mb-0">¡Bienvenido!</h5>
                                            <p class="text-muted mt-2">Inicia Sesión</p>
                                        </div>
                                        <form class="mt-4 pt-2" action="/login" method="POST">
                                            @csrf
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="text" name="username" class="form-control" id="input-username" placeholder="Enter User Name">
                                                <label for="input-username">Nombre de usuario</label>
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-users-alt"></i>
                                                </div>
                                            </div>
                                            <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                                                <input type="password" name="password" class="form-control" id="password-input" placeholder="Enter Password">
                                                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                </button>
                                                <label for="password-input">Contraseña</label>
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-padlock"></i>
                                                </div>
                                            </div>
                                            <div class="form-check form-check-primary font-size-16 py-1">
                                                <input class="form-check-input" type="checkbox" id="remember-check">
                                                <div class="float-end">
                                                    <a href="auth-resetpassword-basic" class="text-muted text-decoration-underline font-size-14">¿Olvidaste tu contraseña?</a>
                                                </div>
                                                <label class="form-check-label font-size-14" for="remember-check">
                                                    Recuerdame
                                                </label>
                                            </div>

                                            <div class="mt-3">
                                                <button class="btn btn-primary w-100" type="submit">Inicia Sesión</button>
                                            </div>

                                        </form><!-- end form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>
<!-- end authentication section -->

@endsection
