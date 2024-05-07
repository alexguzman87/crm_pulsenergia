@extends('layouts.vertical-master-layout')
@section('title')Registro @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Contactos @endslot
            @slot('title') Registro @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xl-6">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Registro de contactos</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div>
                <form action="/contact_create" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Nombre Completo">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Correo Electrónico">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="email" name="second_email" class="form-control" placeholder="Correo Electrónico Secundario">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="number" name="phone" name="email" class="form-control" placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="number" name="second_phone" class="form-control" placeholder="Teléfono Secundario">                                    
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea name="notes" class="form-control" cols="30" rows="10" placeholder="Notas"></textarea>
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
