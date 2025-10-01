@extends('layouts.vertical-master-layout')
@section('title')REGISTRO LOGIN | @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Registro Login @endslot
            @slot('title') Registro Login  @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                </div>

                <form method="GET" action="{{ route('register_login') }}" class="mb-4">
                    <div class="row align-items-end">
                        <div class="col-md-3 mb-3">
                            <label for="user_id" class="form-label">Usuario:</label>
                            <select name="user_id" id="user_id" class="form-control select2">
                                <option value="">Todos los Usuarios</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="created_at_start" class="form-label">Desde:</label>
                            <input type="date" name="created_at_start" id="created_at_start" class="form-control" value="{{ request('created_at_start') }}">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="created_at_end" class="form-label">Hasta:</label>
                            <input type="date" name="created_at_end" id="created_at_end" class="form-control" value="{{ request('created_at_end') }}">
                        </div>

                        <div class="col-md-3 mb-3 d-flex">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="fas fa-filter"></i> Filtrar
                            </button>
                            <a href="{{ route('register_login') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Limpiar
                            </a>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap table-check">
                        <thead>
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Fecha de Acceso</th>
                            </tr><!-- end tr -->
                        </thead><!-- end thead -->
                        <tbody>
                            @foreach ( $register_login as $r )
                            <tr>
                                <td>{{$r->user->name}}</td>
                                <td>{{date("d/m/Y", strtotime($r->created_at))}} - {{date("H:i", strtotime($r->created_at))}}</td>
                                <td></td>
                            </tr><!-- end tr --> 
                            @endforeach
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div><!-- end table responsive -->
                <div class="row g-0 text-center text-sm-start">
                    <div>{{$register_login->links('layouts.pagination')}}</div>
                </div><!-- end row -->  
                <div id="gridjs-temp" class="gridjs-temp"></div>
                @include('layouts.message')
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->



@endsection
@section('script')

<!-- gridjs js -->
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/gridjs.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>



@endsection
