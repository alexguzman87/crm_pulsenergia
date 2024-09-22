@extends('layouts.vertical-master-layout')
@section('title')EDITAR OPORTUNIDAD | @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Oportunidad @endslot
            @slot('title') Editar Oportunidad @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xxl-3 col-lg-4">
        {{--INFORMACIÓN GENERAL--}}
        <div class="card">
            <div class="card-body p-0">
                <div class="p-4 mt-2">
                    <h5 class="font-size-16">INFORMACIÓN:</h5>

                    <div class="mt-4">
                        <p class="text-muted mb-1">Nombre:</p>
                        <h5 class="font-size-14 text-truncate">{{$oportunity->title}}</h5>
                    </div>

                    <div class="mt-4">
                        <p class="text-muted mb-1">Lead Asociado:</p>
                        <h5 class="font-size-14 text-truncate">@if($oportunity->id_contact){{$oportunity->contact->name}}@else No existe Lead Asociado @endif</h5>
                    </div>

                    <div class="mt-4">
                        <p class="text-muted mb-1">Organización:</p>
                        <h5 class="font-size-14 text-truncate">{{$oportunity->organization}}</h5>
                    </div>

                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <p class="text-muted mb-1">Correo Electrónico:</p>
                                    <h5 class="font-size-14 text-truncate">{{$oportunity->email}}</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <p class="text-muted mb-1">Teléfono:</p>
                                    <h5 class="font-size-14 text-truncate">{{$oportunity->phone}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
        {{--ASIGNAR USUARIO--}}
        @if(auth()->user()->type_user=='admin')
        <div class="card">
            <div class="card-body p-0">
                <div class="p-4 mt-2">
                    <h5 class="font-size-16">RESPONSABLE:</h5>

                    <div class="mt-4">
                        <p class="text-muted mb-1">Nombre:</p>
                        @if($oportunity->id_user)
                        <h5 class="font-size-14 text-truncate">{{$oportunity->user->name}}</h5>
                        @else
                        <h5 class="font-size-14 text-truncate">No asignado</h5>
                        @endif
                    </div>

                    <div class="mt-4">
                        <p class="text-muted mb-1">Asignar Responsable:</p>
                        <div class="mt-4">
                            <form action="/oportunity_edit_user/{{$oportunity->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <select class="form-control" name="id_user">
                                                    <option value="" disabled selected>Responsable</option>
                                                    @foreach ($user as $u)
                                                        <option value="{{$u->id}}">{{$u->name}}</option>
                                                    @endforeach
                                                </select>   
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                @if($oportunity->id_user)
                                                <button type="submit" class="btn btn-primary w-sm">Modificar</button>
                                                @else
                                                <button type="submit" class="btn btn-primary w-sm">Asignar</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @include('layouts.message')
                            </form>
                        </div> 
                    </div>
                </div>                
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addContactModal"><button type="submit" title="BORRAR" name="send" class="btn btn-primary">BORRAR OPORTUNIDAD</button></a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <!-- end modalheader -->
                            <div class="modal-body p-4">
                                <div class="d-flex justify-content-center">
                                    <h4>¿SEGURO DESEA ELIMINAR LA OPORTUNIDAD?</h4>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <form action="{{route('oportunity_delete', $oportunity->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="status" value="lost">
                                        <button type="submit" title="ELIMINAR" class="btn btn-primary"> ELIMINAR </button>                                                            
                                    </form>    
                                </div>
                            </div>
                        </div><!-- end content -->
                    </div>
                </div>
                <!-- end modal -->
            </div>
        </div>
    </div>
    <!-- end col -->

   
    <div class="col-xxl-9 col-lg-8">
        <div class="card">
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#navtabs-profile" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Editar</span>
                        </a>
                    </li>
                    @if($oportunity->id_user)
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#navtabs-task" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Tareas</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#navtabs-notes" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Notas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#navtabs-files" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block">Archivos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#navtabs-mail" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block">Email</span>
                        </a>
                    </li>
                </ul>

                
                <div class="tab-content p-3 text-muted">
                    
                    {{--EDITAR--}}
                    <div class="tab-pane active" id="navtabs-profile" role="tabpanel">                    
                        <div class="card-body">
                            <form action="/oportunity_edit/{{$oportunity->id}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                    <div class="modal-body p-4">
                                        <div class="mb-3">
                                            <input type="text" name="title" class="form-control" placeholder="Titulo" value="{{$oportunity->title}}">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" name="contact_name" class="form-control" placeholder="Nombre del contacto" value="{{$oportunity->contact_name}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" name="organization" class="form-control" placeholder="Organización"  value="{{$oportunity->organization}}">                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="email" name="email" class="form-control" placeholder="Correo Electrónico"  value="{{$oportunity->email}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" onkeypress="return valideKey(event);" name="phone" class="form-control" placeholder="Teléfono" value="{{$oportunity->phone}}" required>                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <select name="country" class="form-select" id="country">
                                                        <option value="{{$oportunity->country}}">{{$oportunity->country}}</option>
                                                        @foreach ($country as $c)
                                                            <option value="{{$c->name}}">{{$c->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    {{--Aqui esta el codigo de españa complementado con el script--}}
                                                    <select name="state" Style="display:none" class="form-select" id="spain" onchange="">
                                                        <option value="{{$oportunity->state}}">{{$oportunity->state}}</option>
                                                        @foreach ($state as $s)
                                                            <option value={{$s->name}}>{{$s->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {{--Aqui esta el input de no ser españa--}}
                                                    <input type="text" id="non_spain" Style="display:none" name="state" class="form-control" placeholder="Provincia" value="{{$oportunity->state}}">                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" name="city" class="form-control" placeholder="Ciudad" value="{{$oportunity->city}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" name="street" class="form-control" placeholder="Calle / Avenida" value="{{$oportunity->street}}">                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="mb-3">
                                                    <input type="text" name="address" class="form-control" placeholder="Dirección" value="{{$oportunity->address}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <input type="text" onkeypress="return valideKey(event);" minlength="5" maxlength="5" name="postal_code" class="form-control" placeholder="Código Postal" value="{{$oportunity->postal_code}}">                                    
                                                </div>
                                            </div>
                                        </div>                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <input type="url" name="coordinate" class="form-control" placeholder="Coordenadas" value="{{$oportunity->coordinate}}">
                                                </div>
                                            </div>
                                        </div>                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <input type="text" onkeypress="return valideKey(event);" name="budget" class="form-control" placeholder="Presupuesto" value={{$oportunity->budget}}>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <select name="status" class="form-select">
                                                        <option value="{{$oportunity->status}}">
                                                            @if ($oportunity->status =='oportunity') OPORTUNIDAD 
                                                            @elseif($oportunity->status =='proposal') EN PROPUESTA
                                                            @elseif($oportunity->status =='need') NECESITO APOYO
                                                            @elseif($oportunity->status =='sale') VENTA EXITOSA
                                                            @elseif($oportunity->status =='lost') PÉRDIDO
                                                            @endif
                                                        </option>
                                                        <option value="oportunity">Oportunidad</option>
                                                        <option value="proposal">En Propuesta</option>
                                                        <option value="need">Necesito Apoyo</option>
                                                        <option value="sale">Venta Exitosa</option>
                                                        <option value="lost">Pérdido</option>
                                                    </select> 
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Probabilidad: <output id="value"></output>%</label>
                                                </div>
                                            </div><!-- end row -->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <input id="pi_input" name="probability" class="form-range mt-2" type="range" min="0" max="100" step="10" value={{$oportunity->probability}}/>
                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                        <div class="row">
                                        </div><!-- end row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <select name="id_origins" class="form-select">
                                                        @if($oportunity->id_origins)
                                                            <option value="{{$oportunity->id_origins}}">{{$oportunity->origin->name}}</option>
                                                        @else
                                                            <option value="" selected disabled hidden>Origen del Lead</option>
                                                        @endif
                                                        @foreach ($origin as $o)
                                                            <option value="{{$o->id}}">{{$o->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <select name="id_level" class="form-select">
                                                        @if($oportunity->id_level)
                                                            <option value="{{$oportunity->id_level}}">{{$oportunity->level->name}}</option>
                                                        @else
                                                            <option value="" selected disabled hidden>Nivel del Lead</option>
                                                        @endif
                                                        @foreach ($level as $l)
                                                            <option value="{{$l->id}}">{{$l->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <select name="id_type" class="form-select">
                                                        @if($oportunity->id_type)
                                                            <option value="{{$oportunity->id_type}}">{{$oportunity->type->name}}</option>
                                                        @else
                                                            <option value="" selected disabled hidden>Tipo del Lead</option>
                                                        @endif
                                                        @foreach ($type as $t)
                                                            <option value="{{$t->id}}">{{$t->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Descripción">{{$oportunity->description}}</textarea>
                                        </div>
                                    </div>
                                    <!-- end modalbody -->
                                    <div class="modal-footer">
                                        <a href="/oportunity"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                                        <button type="submit" class="btn btn-primary w-sm">Modificar Oportunidad</button>
                                    </div>
                                @include('layouts.message')
                            </form><!-- end form -->    
                        </div>
                    </div>

                    {{--TASK--}}
                    @if($oportunity->id_user)
                    <div class="tab-pane" id="navtabs-task" role="tabpanel">
                        <div class="card-body">
                            <form action="/task_oportunity_create" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="mb-3">
                                        <input type="hidden" name="id_oportunity" value={{$oportunity->id}}>
                                        <input type="hidden" name="task_origin" value='oportunity'>
                                        <input type="hidden" name="id_user" value={{$oportunity->user->id}}>
                                        <input type="text" name="task" class="form-control" placeholder="Descripción de la Tarea..." required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <input type="url" name="coordinate" class="form-control" placeholder="Coordenadas" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <select class="form-control" name="priority" required>
                                            <option value="" disabled selected>PRIORIDAD</option>
                                            <option value="alta" style="border: none; width: 100%; color: #ef7564; background-color: white;">ALTA</option>
                                            <option value="media" style="border: none; width: 100%; color: #ffb968; background-color: white;">MEDIA</option>
                                            <option value="baja" style="border: none; width: 100%; color: #7bc86c; background-color: white;">BAJA</option>
                                        </select>                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <select class="form-control" name="status">
                                            <option value="pendiente" style="border: none; width: 100%; color: #ef7564; background-color: white;">PENDIENTE</option>
                                            <option value="en_proceso" style="border: none; width: 100%; color: #ffb968; background-color: white;">EN PROCESO</option>
                                            <option value="hecho" style="border: none; width: 100%; color: #7bc86c; background-color: white;">HECHO</option>
                                        </select>                                    
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="formrow-firstname-input">Fecha de Inicio</label>
                                        <input type="date" name="assigned_date" class="form-control" placeholder="Fecha Asignado" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="formrow-firstname-input">Hora de Inicio</label>                                        
                                        <input class="form-control" name="assigned_time" type="time" placeholder="Hora Asignado"  min="<?php echo date('H:m'); ?>" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="formrow-firstname-input">Fecha Fin</label>
                                        <input type="date" name="done_date" class="form-control" placeholder="Fecha Realizado" min="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="formrow-firstname-input">Hora Fin</label>
                                        <input class="form-control" name="done_time" type="time" placeholder="Hora Realizado" required>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="mb-3">
                                                <a href="/lead"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                                                <button type="submit" class="btn btn-primary w-md">Agregar Tarea</button>                                            
                                        </div>
                                    </div> 
                                    @include('layouts.message')
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Tarea</th>
                                            <th scope="col">Prioridad</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Creado</th>
                                            <th scope="col">Finalizado</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($task as $t)
                                            <tr>
                                                <td><a href={{$t->coordinate}} target="_blank"><button type="submit" title="UBICACIÓN" class="btn btn-primary"><i class="bx bx-map"></i></button></a></td>
                                                <td>{{$t->task}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link text-dark dropdown-toggle shadow-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i>
                                                                @if ($t->priority=='alta')
                                                                <span class="badge badge-soft-danger mb-0">ALTA</span>
                                                                @elseif($t->priority=='media')
                                                                <span class="badge badge-soft-warning mb-0">MEDIA</span>
                                                                @elseif($t->priority=='baja')
                                                                <span class="badge badge-soft-success mb-0">BAJA</span>
                                                                @endif
                                                            </i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-center">
                                                            <form action="{{route('task_change_priority', $t->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="priority" value="alta">
                                                                <button style="border: none; width: 100%; color: #ef7564; background-color: white;" type="submit">ALTA</button>                                                            
                                                            </form>
                                                            <form action="{{route('task_change_priority', $t->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="priority" value="media">
                                                                <button style="border: none; width: 100%; color: #ffb968; background-color: white;" type="submit">MEDIA</button>                                                            
                                                            </form>
                                                            <form action="{{route('task_change_priority', $t->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="priority" value="baja">
                                                                <button style="border: none; width: 100%; color: #7bc86c; background-color: white;" type="submit">BAJA</button>                                                            
                                                            </form>
                                                        </ul>
                                                    </div><!-- end dropdown -->
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link text-dark dropdown-toggle shadow-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i>
                                                                @if ($t->status=='pendiente')
                                                                <span class="badge badge-soft-danger mb-0">PENDIENTE</span>
                                                                @elseif($t->status=='en_proceso')
                                                                <span class="badge badge-soft-warning mb-0">EN PROCESO</span>
                                                                @elseif($t->status=='hecho')
                                                                <span class="badge badge-soft-success mb-0">HECHO</span>
                                                                @endif
                                                            </i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-center">
                                                            <form action="{{route('task_change_status', $t->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="pendiente">
                                                                <button style="border: none; width: 100%; color: #ef7564; background-color: white;" type="submit">PENDIENTE</button>                                                            
                                                            </form>
                                                            <form action="{{route('task_change_status', $t->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="en_proceso">
                                                                <button style="border: none; width: 100%; color: #ffb968; background-color: white;" type="submit">EN PROCESO</button>                                                            
                                                            </form>
                                                            <form action="{{route('task_change_status', $t->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="hecho">
                                                                <button style="border: none; width: 100%; color: #7bc86c; background-color: white;" type="submit">HECHO</button>                                                            
                                                            </form>
                                                        </ul>
                                                    </div><!-- end dropdown -->
                                                </td>
                                                <td>{{ date('d-M-y', strtotime($t->assigned_date)) }} {{date('H:i', strtotime($t->assigned_time))}}</td>
                                                <td>{{ date('d-M-y', strtotime($t->done_date)) }} {{date('H:i', strtotime($t->done_time))}}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href={{route('task_edit', $t->id)}}><button title="EDITAR OPORTUNIDAD" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button></a>
                                                        <form action="{{route('task_delete', $t->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" title="BORRAR USUARIO" class="btn btn-primary"><i class="bx bx-x-circle"></i></button>
                                                        </form>
                                                    </div>  
                                                </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end tab pane -->
                    @endif


                    {{--Notas--}}
                    <div class="tab-pane" id="navtabs-notes" role="tabpanel">
                        <form action="/notes_oportunity_create" method="POST">
                            @csrf
                                <div class="mb-3">
                                    <input type="hidden" name="task_origin" value='oportunity'>
                                    <input type="hidden" name="id_oportunity" value={{$oportunity->id}}>
                                    <textarea name="notes" placeholder="Escribe aquí las notas..." class="form-control" cols="30" rows="10" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <div class="mt-4">
                                        <a href="#"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                                        <button type="submit" class="btn btn-primary w-md">Agregar Notas</button>
                                    </div>
                                </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Nota</th>
                                    </tr><!-- end tr -->
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach ($notes as $n )
                                    <tr>
                                        <td>{{date('d-M-y', strtotime($n->created_at))}}</td>
                                        <td>{{$n->notes}}</td>
                                    </tr><!-- end tr --> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end tab pane -->
                    
                    
                    {{--ARCHIVOS--}}
                    <div class="tab-pane" id="navtabs-files" role="tabpanel">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <form action="/store_file_oportunity" class="dropzone" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <input type="hidden" name="task_origin" value='oportunity'>
                                                    <input type="hidden" name="id_oportunity" value={{$oportunity->id}}>
                                                    <input name="fileName" type="text" class="form-control" placeholder="Nombre / Descripción del archivo" required>
                                                </div>
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple="multiple" required>
                                                </div>
                                                <div class="dz-message needsclick text-center">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                                        <h4>Suelte los archivos aquí o haga clic para cargarlos.</h4>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="mt-4">
                                                        <a href="/oportunity"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                                                        <button type="submit" class="btn btn-primary">Guardar Archivo</button>
                                                    </div>
                                                </div>
                                                @include('layouts.message')
                                            </form>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-check">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nombre del Archivo</th>
                                                        <th scope="col">Archivo</th>
                                                        <th scope="col">Subido el</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $file as $c )
                                                        <tr>
                                                            <td>{{$c->fileName}}</td>
                                                            <td>{{$c->file}}</td>
                                                            <td>{{ date('d-M-y', strtotime($c->created_at)) }}</td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <a href="/download_file_oportunity/{{$c->file}}"><button type="submit" title="DESCARGAR ARCHIVO" class="btn btn-primary"><i class="bx bx-download"></i></button></a>
                                                                    <form action="{{route('file_delete_oportunity', $c->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" title="BORRAR ARCHIVO" class="btn btn-primary"><i class="bx bx-x-circle"></i></button>
                                                                    </form>      
                                                                </div>
                                                            <td>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div><!-- end card -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div><!-- end tab pane -->
                    <div class="tab-pane" id="navtabs-mail" role="tabpanel">
                        <div class="card-body">
                            <form action="/send-mail" method="GET">
                                @csrf
                                    <div class="mb-3">
                                        <input type="hidden" name="email_user" class="form-control" value="{{auth()->user()->email}}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="hidden" name="email" class="form-control" value="{{$oportunity->title}}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="title" class="form-control" placeholder="Asunto" required>
                                    </div>
                                    <div class="mb-3">
                                        <textarea name="body" id=""  class="form-control" placeholder="Escribe aquí tu mensaje" cols="20" rows="5" required></textarea>
                                    </div>
                                    <!--<div class="card-body">
                                        <div id="ckeditor-classic" name="body"></div>
                                    </div> end cardbody -->
                                    <div class="modal-footer">
                                        <div class="mt-4">
                                            <a href="/lead"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                                            <button type="submit" class="btn btn-primary w-md">Enviar Correo</button>
                                        </div>
                                    </div>
                                    @include('layouts.message')
                            </form>
                        </div>
                    </div><!-- end tab pane -->
                </div>
            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection

@section('script')



<!-- ckeditor -->
<script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
<script>
    const value = document.querySelector("#value");
    const input = document.querySelector("#pi_input");
        value.textContent = input.value;
        input.addEventListener("input", (event) => {
          value.textContent = event.target.value;
        });

        var spain = document.getElementById('spain');
    var non_spain = document.getElementById('non_spain');
    var country = document.getElementById("country");
    
    function valideKey(evt){
    
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
}


    window.addEventListener("load", () => {
        if(country.value === "España") {
        spain.style.display = 'initial';
        non_spain.style.display = 'none';
        non_spain.removeAttribute("required");
        non_spain.removeAttribute("name");
        //spain.required = true;
        }else{
        non_spain.style.display = 'initial';
        spain.style.display = 'none';
        spain.removeAttribute("required");
        spain.removeAttribute("name");
        //non_spain.required = true; 
        }
    });

    
    country.addEventListener("change", () => {
      if (country.value === "España") {
        spain.style.display = 'initial';
        non_spain.style.display = 'none';
        non_spain.removeAttribute("required");
        non_spain.removeAttribute("name");
        spain.setAttribute("name", "state");
        //spain.required = true;
      } else {
        non_spain.style.display = 'initial';
        spain.style.display = 'none';
        spain.removeAttribute("required");
        spain.removeAttribute("name");
        non_spain.setAttribute("name", "state");
        //non_spain.required = true;
      }
    });




</script>
<script src="{{ URL::asset('assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
<!-- quill js -->
<!-- init js -->
<script src="{{ URL::asset('assets/js/pages/form-editor.init.js') }}"></script>


@endsection
