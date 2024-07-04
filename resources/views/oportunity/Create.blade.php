@extends('layouts.vertical-master-layout')
@section('title')    @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Oportunidad @endslot
            @slot('title') Registro @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xl-6">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Registro de Oportunidad</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div>
                <form action="/oportunity_create" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder="Titulo...">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="contact_name" class="form-control" placeholder="Nombre del contacto...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="organization" class="form-control" placeholder="Organización...">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Correo Electrónico...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="number" name="phone" class="form-control" placeholder="Teléfono...">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="country" class="form-control" placeholder="País...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="state" class="form-control" placeholder="Estado / Provincia/ Región...">                                    
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="address" class="form-control" placeholder="Dirección...">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="city" class="form-control" placeholder="Ciudad...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="number" name="postal_code" class="form-control" placeholder="Código Postal...">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select name="status" class="form-select">
                                        <option value="oportunity">Oportunidad</option>
                                        <option value="proposal">En Propuesta</option>
                                        <option value="need">Necesito Apoyo</option>
                                        <option value="sale">Venta Exitosa</option>
                                        <option value="lost">Pérdido</option>
                                    </select> 
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select name="type" class="form-select">
                                        <option value="" selected disabled hidden>Tipo</option>
                                        <option value="residential">Residencial</option>
                                        <option value="industrial">Industrial</option>
                                        <option value="commercial">Comercial</option>
                                    </select> 
                                </div>
                            </div><!-- end row -->
                        </div><!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="number" name="budget" class="form-control" placeholder="Presupuesto...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="currency" class="form-control" placeholder="Moneda...">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Probabilidad: <output id="value"></output>%</label>
                                </div>
                            </div><!-- end row -->
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <input id="pi_input" name="probability" class="form-range mt-2" type="range" min="0" max="100" step="10"/>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        <div class="mb-3">
                            <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Descripción..."></textarea>
                        </div>
                        <div class="mt-4">
                            <a href="/oportunity"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
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

<script>
const value = document.querySelector("#value");
    const input = document.querySelector("#pi_input");
    value.textContent = input.value;
    input.addEventListener("input", (event) => {
      value.textContent = event.target.value;
    });
    </script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
