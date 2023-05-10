@extends('layouts.master')
@section('title')Advance Tables @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Tables @endslot
            @slot('title') Advance Tables @endslot
        @endcomponent
    @endsection
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Usuarios Registrados</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="card-body">
                    <div id="table-search">
                        <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                            <div class="gridjs-head">
                                <div class="gridjs-search">
                                    <input type="search" placeholder="Type a keyword..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                                </div>
                            </div>
                            <div class="gridjs-wrapper" style="height: auto;">
                                <table role="grid" class="gridjs-table" style="height: auto;">
                                    <thead class="gridjs-thead">
                                        <tr class="gridjs-tr">
                                            <th data-column-id="name" class="gridjs-th" style="min-width: 85px; width: 172px;">
                                                <div class="gridjs-th-content">Nombre</div>
                                            </th>
                                            <th data-column-id="email" class="gridjs-th" style="min-width: 188px; width: 382px;">
                                                <div class="gridjs-th-content">Email</div>
                                            </th>
                                            <th data-column-id="position" class="gridjs-th" style="min-width: 243px; width: 494px;">
                                                <div class="gridjs-th-content">Nombre de Usuario</div>
                                            </th>
                                            <th data-column-id="company" class="gridjs-th" style="min-width: 124px; width: 252px;">
                                                <div class="gridjs-th-content">Perfil</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="gridjs-tbody">
                                        @foreach ( $users as $user )
                                            <tr class="gridjs-tr">
                                                <td data-column-id="name" class="gridjs-td">{{$user->name}}</td>
                                                <td data-column-id="email" class="gridjs-td">{{$user->email}}</td>
                                                <td data-column-id="position" class="gridjs-td">{{$user->username}}</td>
                                                <td data-column-id="company" class="gridjs-td"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="gridjs-footer">
                                <div>{{$users->links('layouts.pagination')}}</div>
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
