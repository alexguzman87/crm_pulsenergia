@extends('layouts.vertical-master-layout')
@section('title')CREAR USUARIO @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Usuario @endslot
            @slot('title') Crear Usuario @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xl-6">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Crear usuario</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div>
                <form action="/user_create" method="POST" enctype="multipart/form-data">
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
                                    <select name="type_user" class="form-select">
                                        <option value="" selected disabled hidden>Selecciona un perfil</option>
                                        <option value="admin">Administrador</option>
                                        <option value="analyst">Analista</option>
                                        <option value="general">General</option>
                                    </select> 
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
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Subir imagen</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-md">Registrar Usuarios</button>
                        </div>
                        @include('layouts.message')
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
