@extends('layouts.vertical-master-layout')
@section('title')OPORTUNIDADES | @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/dragula/dragula.min.css') }}" rel="stylesheet">

@endsection
@section('content')

{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') OPORTUNIDADES @endslot
            @slot('title')  @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-lg-12">   
        <div class="card">
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-lg-auto">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="text-center p-3">
                                    <a href="/oportunity_create" class="btn btn-primary btn-soft w-100"><i class="mdi mdi-plus mr-1"></i> Agregar Oportunidad</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto ms-sm-auto">
                        @if(auth()->user()->type_user=='admin')
                        <div class="avatar-group justify-content-sm-end">
                            <div class="avatar-group-item">
                                <a href="/oportunity_list" title="ALL">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary">
                                            <i class="uil-backward"></i>
                                        </div>
                                    </div>
                                </a>
                            </div><!-- end avatar group item -->
                            @foreach ($user as $u)
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip" data-placement="top" title="{{strtoupper($u->name)}}">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-primary">
                                                <a href="{{route('oportunity_show_list', $u->id)}}" style="border: none; width: 100%; color: white; background-color: transparent; text-align: center;">{{strtoupper(substr($u->name,0,3))}}</a>
                                            </div>
                                        </div>
                                    </a>
                                </div><!-- end avatar group item -->
                            @endforeach
                        </div><!-- end avatar-group -->
                    </div>
                    @endif
                    <!--end col-->
                    <div class="d-flex flex-wrap align-items-start justify-content-md-end mt-2 mt-md-0 gap-2 mb-3">
                        <div>
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link" href="/oportunity_show_list/{{auth()->user()->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Lista"><i class="uil uil-list-ul"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/oportunity_show_user/{{auth()->user()->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Tablero"><i class="uil uil-apps"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5 class="card-title">Total Oportunidades <span class="text-muted fw-normal ms-2">{{$oportunity->count()}}</span></h5>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap table-check">
                        <thead>
                            <tr>
                                <th scope="col">Encargado</th>
                                <th scope="col">Nombre de Contacto</th>
                                <th scope="col">Correo</th> 
                                <th scope="col">Teléfono</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Nivel</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Estatus</th>
                                <th style="width: 80px; min-width: 80px;">Acción</th>
                            </tr><!-- end tr -->
                        </thead><!-- end thead -->
                        {{--
                            <span class="badge badge-soft-warning mb-0">NECESITO APOYO</span> ***FONDO AMARILLO***
                            <span class="badge badge-soft-info mb-0">OPORTUNIDAD</span> ***FONDO AZUL******
                            <span class="badge badge-soft-primary mb-0">EN PROPUESTA</span> ***FONDO MORADO******
                            <span class="badge badge-soft-success mb-0">VENTA EXITOSA</span> ***FONDO VERDE******
                            <span class="badge badge-soft-danger mb-0">PERDIDO</span> ***FONDO ROJO******
                            <span class="badge badge-soft-secondary mb-0">ESTUDIO DE FACTURA</span> ***FONDO GRIS******
                            <span class="badge badge-soft-light mb-0">ENERGÍAS RENOVABLES</span> ***FONDO GRIS******
                            <span class="badge badge-soft-dark mb-0">OTRA</span> ***FONDO GRIS******


                        --}}                            
                        <tbody>
                            @foreach ($oportunity as $o)
                                       <tr>
                                            <td>
                                                <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip" data-placement="top" title="{{strtoupper($o->user->name)}}">
                                                    <div class="avatar">
                                                        <div class="avatar-title rounded-circle bg-primary">
                                                            <a href="{{route('oportunity_show_list', $o->id_user)}}" style="border: none; width: 100%; color: white; background-color: transparent; text-align: center;">{{strtoupper(substr($o->user->name,0,3))}}</a>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                {{strtoupper($o->contact_name)}}
                                            </td>
                                            <td>
                                                {{$o->email}}
                                            </td>    
                                            <td>
                                                {{$o->phone}}</td>  
                                            <td>
                                                @if ($o->id_origin){{$o->origin->name}}@else No indicado @endif
                                            </td>
                                            <td>                                            
                                                @if ($o->id_level){{$o->level->name}}@else No indicado @endif
                                            </td>
                                            <td>
                                                @if ($o->id_type){{$o->type->name}}@else No indicado @endif
                                            </td>
                                            <td>
                                                @if ($o->status=='oportunity')
                                                <span class="badge badge-soft-info mb-0">OPORTUNIDAD</span>
                                                @elseif($o->status=='proposal')
                                                <span class="badge badge-soft-primary mb-0">EN PROPUESTA</span>
                                                @elseif($o->status=='need')
                                                <span class="badge badge-soft-warning mb-0">NECESITO APOYO</span>
                                                @elseif($o->status=='sale')
                                                <span class="badge badge-soft-success mb-0">VENTA EXITOSA</span>
                                                @else
                                                <span class="badge badge-soft-danger mb-0">PERDIDO</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="/oportunity_edit/{{$o->id}}"><button type="submit" title="EDITAR LEAD" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button></a>
                                                </div>
                                            </td>
                                        </tr>
                            @endforeach
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div><!-- end table responsive -->

                <div class="row g-0 text-center text-sm-start">
                    <div>{{$oportunity_user->links('layouts.pagination')}}</div>
                </div><!-- end row -->  
                <div id="gridjs-temp" class="gridjs-temp"></div>
                @include('layouts.message')

            </div><!-- end card body -->
        </div>
    </div>
</div>

@endsection
@section('script')

<!-- dragula plugins -->
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="{{ URL::asset('assets/libs/dragula/dragula.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/kanbanboard.init.js') }}"></script>

@endsection
