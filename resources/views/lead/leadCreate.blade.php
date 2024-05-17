@extends('layouts.vertical-master-layout')
@section('title')Registro @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Clientes @endslot
            @slot('title') Registro @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xl-6">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Registro de clientes</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div>
                <form action="/lead_create" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Nombre Completo">
                        </div>
                        <div class="mb-3">
                            <select name="fp_cycle" class="form-select">
                                <option value="" selected disabled hidden>Selecciona un Ciclo</option>
                                <option value="tadaf">TADAF</option>
                                <option value="tsei">TSEI</option>
                                <option value="tcae">TCAE</option>
                            </select> 
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Correo Electrónico">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="number" name="phone_movile" name="email" class="form-control" placeholder="Teléfono Móvil">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="country" class="form-control" placeholder="País">                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="state" class="form-control" placeholder="Estado">                                    
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="address" class="form-control" placeholder="Dirección">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="city" name="email" class="form-control" placeholder="Ciudad">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="postal_code" class="form-control" placeholder="Código Postal">                                    
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea name="notes" class="form-control" cols="30" rows="10" placeholder="Notas"></textarea>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-md">Registrar Clientes</button>
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
