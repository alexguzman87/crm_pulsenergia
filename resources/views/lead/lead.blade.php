@extends('layouts.vertical-master-layout')
@section('title')Contactos @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Inicio @endslot
            @slot('title') Lead  @endslot
        @endcomponent
    @endsection
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Leads</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="card-body">
                    <div id="table-search">
                        <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">                 
                            <div class="row">
                                <div class="col-md-11">
                                        <!--<form method="GET" action="/contact">
                                            @csrf
                                            <input type="text" name="search_id" placeholder="Buscar Nombre..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                                            <input type="text" name="search_name" placeholder="Buscar Ciclo FP..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                                            <input type="text" name="search_email" placeholder="Buscar Email..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                                            <input type="text" name="search_phone" placeholder="Buscar Teléfono..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                                            <button type="submit" name="send" class="btn btn-default"></button>
                                        </form>-->
                                </div>
                                <div class="col-md-1">
                                    <div class="d-flex flex-wrap align-items-start justify-content-md-end mt-2 mt-md-0 gap-2 mb-3">
                                        <div>
                                            <a href="/lead_create"><button type="submit" class="btn btn-primary w-md">Agregar</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gridjs-wrapper" style="height: auto;">
                                <table role="grid" class="gridjs-table" style="height: auto;">
                                    <thead class="gridjs-thead">
                                        <tr class="gridjs-tr">
                                            <th data-column-id="name" class="gridjs-th" style="min-width: 85px; width: auto;">
                                                <div class="gridjs-th-content">Nombre</div>
                                            </th>
                                            <th data-column-id="fp_cycle" class="gridjs-th" style="min-width: 85px; width: auto;">
                                                <div class="gridjs-th-content">Ciclo FP</div>
                                            </th>
                                            <th data-column-id="email" class="gridjs-th" style="min-width: 85px; width: auto;">
                                                <div class="gridjs-th-content">Email</div>
                                            </th>
                                            <th data-column-id="phone_movile" class="gridjs-th" style="min-width: 188px; width: auto;">
                                                <div class="gridjs-th-content">Teléfono Móvil</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="gridjs-tbody">
                                        @foreach ( $lead as $l )
                                            <tr class="gridjs-tr">
                                                <td data-column-id="name" class="gridjs-td">{{$l->name}}</td>
                                                <td data-column-id="fp_cycle" class="gridjs-td">{{$l->fp_cycle}}</td>
                                                <td data-column-id="email" class="gridjs-td">{{$l->email}}</td>
                                                <td data-column-id="phone_movile" class="gridjs-td">{{$l->phone_movile}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="gridjs-footer">
                                <div>{{$lead->links('layouts.pagination')}}</div>
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
@section('script')

<!-- gridjs js -->
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/gridjs.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>



@endsection
