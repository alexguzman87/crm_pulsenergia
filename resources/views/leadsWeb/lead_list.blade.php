@extends('layouts.vertical-master-layout')
@section('title')LEADS WEB | @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Leads Web @endslot
            @slot('title') Listado Leads Web @endslot
        @endcomponent
    @endsection
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5 class="card-title">Leads Web <span class="text-muted fw-normal ms-2">{{$form->count()}}</span></h5>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="d-flex flex-wrap align-items-start justify-content-md-end mt-2 mt-md-0 gap-2 mb-3">
                            <div>
                                @if(auth()->user()->type_user=='admin')
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                    {{--<a href="/contact_export"><button type="submit" title="EXPORTAR EXCEL" name="send" class="btn btn-primary"><i class="bx bx-download"></i></button></a>--}}
                                    </li>
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap table-check">
                        <thead>
                            <tr>
                                <th scope="col">Origen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo Electrónico</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Solución</th>
                                <th scope="col">Provincia</th>
                                <th scope="col">Mensaje</th>
                                <th style="width: 80px; min-width: 80px;">Acción</th>
                            </tr><!-- end tr -->
                        </thead><!-- end thead -->
                        {{--
                            <span class="badge badge-soft-warning mb-0">FOTOVOLTAICA</span> ***FONDO AMARILLO***
                            <span class="badge badge-soft-info mb-0">INGENIERÍA Y PROYECTOS</span> ***FONDO AZUL******
                            <span class="badge badge-soft-primary mb-0">AEROTERMIA</span> ***FONDO MORADO******
                            <span class="badge badge-soft-success mb-0">INSTALACIÓN ELECTRICA</span> ***FONDO VERDE******
                            <span class="badge badge-soft-danger mb-0">CLIMATIZACIÓN</span> ***FONDO ROJO******
                            <span class="badge badge-soft-secondary mb-0">ESTUDIO DE FACTURA</span> ***FONDO GRIS******
                            <span class="badge badge-soft-light mb-0">ENERGÍAS RENOVABLES</span> ***FONDO GRIS******
                            <span class="badge badge-soft-dark mb-0">OTRA</span> ***FONDO GRIS******


                        --}}
                        
                        
                        <tbody>
                            @foreach ($form as $f)
                                       <tr>
                                            <td>
                                                @if($f->form_id==2136)
                                                    <span class="badge badge-soft-warning mb-0">Presupuesto Ingles</span>
                                                @elseif($f->form_id==2127)
                                                    <span class="badge badge-soft-primary mb-0">Contacto Ingles</span>
                                                @elseif($f->form_id==2140)
                                                    <span class="badge badge-soft-success mb-0">Presupuesto Español</span>
                                                @elseif($f->form_id==190)
                                                    <span class="badge badge-soft-info mb-0">Contacto Español</span>
                                                @endif
                                            </td>

                                            @foreach (json_decode($f->fields) as $i)
                                            <td> {{$i->value}}</td>
                                            @endforeach

                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href={{route('convert_to_lead', $f->entry_id)}}><button type="submit" title="CONVERTIR A LEAD" class="btn btn-primary"><i class="uil-arrow-up-right"></i></button></a>  
                                                </div>
                                            </td>
                                        </tr>
                            @endforeach                        

                            {{--EJEMPLO DE TABLA
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck2">
                                        <label class="form-check-label" for="contacusercheck2"></label>
                                    </div>
                                </th>
                                <td>
                                    <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" alt="" class="avatar-sm rounded-circle me-2">
                                    <a href="pages-profile" class="text-body fw-medium">Helen Barron</a>
                                </td>
                                <td><span class="badge badge-soft-info mb-0">Frontend Developer</span></td>
                                <td>HelenBarron@Vuesy.com</td>
                                <td>125</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary font-size-11">Html</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">Css</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">2 + more</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="uil uil-ellipsis-h"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr><!-- end tr -->
                            --}}
                            

                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div><!-- end table responsive -->

                <div class="row g-0 text-center text-sm-start">
                    <div>{{$form->links('layouts.pagination')}}</div>
                </div><!-- end row -->  
                <div id="gridjs-temp" class="gridjs-temp"></div>
                @include('layouts.message')

            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection
@section('script')

<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
