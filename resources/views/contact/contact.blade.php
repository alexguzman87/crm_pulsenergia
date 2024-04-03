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
            @slot('title') Contactos  @endslot
        @endcomponent
    @endsection
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Contactos Registrados</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="card-body">
                    <div id="table-search">
                        <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                            <div class="gridjs-head">
                                <div class="gridjs-search">
                                    <input type="search" placeholder="Buscar..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                                </div>
                            </div>
                            <div class="gridjs-wrapper" style="height: auto;">
                                <table role="grid" class="gridjs-table" style="height: auto;">
                                    <thead class="gridjs-thead">
                                        <tr class="gridjs-tr">
                                            <th data-column-id="id" class="gridjs-th" style="min-width: 85px; width: auto;">
                                                <div class="gridjs-th-content">ID</div>
                                            </th>
                                            <th data-column-id="name" class="gridjs-th" style="min-width: 85px; width: auto;">
                                                <div class="gridjs-th-content">Nombre</div>
                                            </th>
                                            <th data-column-id="email" class="gridjs-th" style="min-width: 188px; width: auto;">
                                                <div class="gridjs-th-content">Email</div>
                                            </th>
                                            <th data-column-id="second_email" class="gridjs-th" style="min-width: 243px; width: auto;">
                                                <div class="gridjs-th-content">Email Secundario</div>
                                            </th>
                                            <th data-column-id="phone" class="gridjs-th" style="min-width: 124px; width: auto;">
                                                <div class="gridjs-th-content">Teléfono</div>
                                            </th>
                                            <th data-column-id="second_phone" class="gridjs-th" style="min-width: 124px; width: auto;">
                                                <div class="gridjs-th-content">Teléfono Secundario</div>
                                            </th>
                                            <th data-column-id="notes" class="gridjs-th" style="min-width: 124px; width: auto;">
                                                <div class="gridjs-th-content">Notas</div>
                                            </th>
                                            <th data-column-id="" class="gridjs-th" style="min-width: 124px; width: auto;">
                                                <div class="gridjs-th-content"></div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="gridjs-tbody">
                                        @foreach ( $contact as $c )
                                            <tr class="gridjs-tr">
                                                <td data-column-id="id" class="gridjs-td">{{$c->id}}</td>
                                                <td data-column-id="name" class="gridjs-td">{{$c->name}}</td>
                                                <td data-column-id="email" class="gridjs-td">{{$c->email}}</td>
                                                <td data-column-id="second_email" class="gridjs-td">{{$c->second_email}}</td>
                                                <td data-column-id="phone" class="gridjs-td">{{$c->phone}}</td>
                                                <td data-column-id="second_phone" class="gridjs-td">{{$c->second_phone}}</td>
                                                <td data-column-id="notes" class="gridjs-td">{{$c->notes}}</td>
                                                <td><a href="{{route('contact_edit', $c->id)}}"><button type="submit" class="btn btn-primary w-md">Editar</button></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="gridjs-footer">
                                <div>{{$contact->links('layouts.pagination')}}</div>
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