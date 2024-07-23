@extends('layouts.vertical-master-layout')
@section('title')CREAR NIVEL LEAD | @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Nivel @endslot
            @slot('title') Crear Nivel Lead  @endslot
        @endcomponent
    @endsection
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Crear Nivel</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="card-body">
                    <div id="table-search">
                        <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="d-flex flex-wrap align-items-start justify-content-md-star mt-2 mt-md-0 gap-2 mb-3"> 
                                        <form method="POST" action="/config_level_lead_create">
                                            @csrf
                                            <input type="text" name="name" placeholder="Agregar Niveles de Lead..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input" required>
                                            <button type="submit" name="send" title="AGREGAR NIVEL" class="btn btn-primary"><i class="bx bx-save"></i></button>
                                        </form>
                                        <a href="/config_level_lead"><button title="CANCELAR" class="btn btn-primary"><i class="bx bx-arrow-back"></i></button></a>
                                    </div>
                                </div>                                
                            </div> 
                            <div id="gridjs-temp" class="gridjs-temp"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection
