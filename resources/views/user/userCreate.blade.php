@extends('layouts.vertical-master-layout')
@section('title')Registro @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') usuarios @endslot
            @slot('title') Registro @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xl-6">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Registro de usuarios</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div>
                <form action="/user_create" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" id="formrow-firstname-input" placeholder="Nombre Completo">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="Text" name="username" class="form-control" id="formrow-email-input" placeholder="Nombre de usuario">
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Perfil de usuario">
                                    <datalist id="datalistOptions">
                                        <option value="Administrador">
                                        <option value="Editor">
                                        <option value="Usuario">
                                    </datalist>
                                    
                                </div>
                            </div><!-- end row -->
                        </div><!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" id="formrow-email-input" placeholder="Correo Electrónico">
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control" id="formrow-password-input" placeholder="Contraseña">
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-md">Registrar Usuarios</button>
                        </div>
                    </form><!-- end form -->
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
<!-- End Form Layout -->

@endsection
@section('script')

<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
