@extends('layouts.master-without-nav')
@section('title')Cerrar Sesión @endsection
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
                                        <div class="avatar-lg mx-auto">
                                            <div class="avatar-title bg-soft-primary text-primary display-5 rounded-circle">
                                                <i class="uil uil-user-circle"></i>
                                            </div>
                                        </div>

                                        <div class="text-center mt-4 py-2">
                                            <h4>Has Cerrado Sesión</h4>
                                            <p>Gracias por usar <span class="fw-semibold">Atenea</span></p>
                                            <div class="mt-4">
                                                <a href="{{url('/login')}}" class="btn btn-primary w-100">Iniciar Sesión</a>
                                            </div>
                                        </div>
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
