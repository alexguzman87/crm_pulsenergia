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
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                </div>

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
                                <td>{{date("d/m/Y", strtotime($r->created_at))}}</td>
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
