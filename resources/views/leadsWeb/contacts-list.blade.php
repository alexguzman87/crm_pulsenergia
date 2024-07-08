@extends('layouts.vertical-master-layout')
@section('title')LEAD WEB | @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Leads @endslot
            @slot('title') Listado @endslot
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
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="contacts-list" data-bs-toggle="tooltip" data-bs-placement="top" title="List"><i class="uil uil-list-ul"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contacts-grid" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid"><i class="uil uil-apps"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addContactModal"><i class="uil uil-plus me-1"></i> Add New</a>
                            </div>
                            <div class="dropdown">
                                <a class="btn btn-link text-dark dropdown-toggle shadow-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="uil uil-ellipsis-h"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div><!-- end dropdown -->
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->

                <!-- Modal -->
                <div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addContactModalLabel">Add Contact</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- end modalheader -->
                            <div class="modal-body p-4">
                                <div>
                                    <div class="mb-3">
                                        <label for="addcontact-name-input" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="addcontact-name-input" placeholder="Enter Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="addcontact-designation-input" class="form-label">Designation</label>
                                        <input type="text" class="form-control" id="addcontact-designation-input" placeholder="Enter Designation">
                                    </div>
                                    <div class="mb-3">
                                        <label for="addcontact-file-input" class="form-label">User Image</label>
                                        <input type="file" class="form-control" id="addcontact-file-input">
                                    </div>

                                    <div class="mb-3">
                                        <label for="addcontact-email-input" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="addcontact-email-input" placeholder="Enter Email">
                                    </div>
                                </div>
                            </div>
                            <!-- end modalbody -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary w-sm">Add</button>
                            </div>
                            <!-- end modalfooter -->
                        </div><!-- end content -->
                    </div>
                </div>
                <!-- end modal -->

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap table-check">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Solicitud</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo Electrónico</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Estado</th>
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
                            @foreach ($data as $i => $k)
                                       <tr>
                                            <td>{{$i}}</td>
                                            <td>
                                                @if($k['solution']=='Fotovoltaica')
                                                <span class="badge badge-soft-warning mb-0">FOTOVOLTAICA</span>
                                                @elseif($k['solution']=='Engineering and projects'||$k['solution']=='Ingeniería y proyectos')
                                                <span class="badge badge-soft-info mb-0">INGENIERÍA Y PROYECTOS</span>
                                                @elseif($k['solution']=='Aerothermal'||$k['solution']=='Aerotermia')
                                                <span class="badge badge-soft-primary mb-0">AEROTERMIA</span>
                                                @elseif($k['solution']=='Climatización')
                                                <span class="badge badge-soft-danger mb-0">CLIMATIZACIÓN</span>
                                                @elseif($k['solution']=='Instalación eléctrica'||$k['solution']=='Electrical installation')
                                                <span class="badge badge-soft-success mb-0">INSTALACIÓN ELECTRICA</span>
                                                @elseif($k['solution']=='Other'||$k['solution']=='Otro')
                                                <span class="badge badge-soft-dark mb-0">OTRA</span>
                                                @elseif($k['solution']=='Energía renovables'||$k['solution']=='Renewable energy')
                                                <span class="badge badge-soft-light mb-0">ENERGÍAS RENOVABLES</span>
                                                @elseif($k['solution']=='Invoice study'||$k['solution']=='Estudio de factura')
                                                <span class="badge badge-soft-secondary mb-0">ESTUDIO DE FACTURA</span>
                                                @else
                                                {{($k['solution'])}}
                                                @endif           
                                            
                                            </td>
                                            <td>{{$k['first_name']}} {{$k['last_name']}}</td>
                                            <td>{{$k['email']}}</td>                                        
                                            <td>{{$k['phone']}}</td>
                                            <td>{{$k['state']}}</td>
                                            <td style="white-space: normal;">{{$k['message']}}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{--route('lead_edit', $c->id)--}}"><button type="submit" title="EDITAR LEAD" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button></a>
                                                    <form action="{{--route('lead_delete', $c->id)--}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" title="BORRAR USUARIO" class="btn btn-primary"><i class="bx bx-x-circle"></i></button>
                                                    </form>  
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
                    <div>{{$formCount->links('layouts.pagination')}}</div>
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
