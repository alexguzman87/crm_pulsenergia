@extends('layouts.vertical-master-layout')
@section('title') EDITAR LEADS | @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Leads @endslot
            @slot('title') Editar Leads @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xxl-3 col-lg-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="mt-n5 position-relative">
                    <div class="text-center">
                        <img src="{{URL::asset('images/'.$contact->image)}}" alt="" class="avatar-xl rounded-circle img-thumbnail">

                        <div class="mt-3">
                            <h5 class="mb-1">{{$contact->name}}</h5>
                        </div>

                    </div>
                </div>

                <div class="p-4 mt-2">
                    <h5 class="font-size-16">Información:</h5>

                    <div class="mt-4">
                        <p class="text-muted mb-1">Nombre:</p>
                        <h5 class="font-size-14 text-truncate">{{$contact->name}}</h5>
                    </div>

                    <div class="mt-4">
                        <p class="text-muted mb-1">Correo Electrónico:</p>
                        <h5 class="font-size-14 text-truncate">{{$contact->email}}</h5>
                    </div>

                    <div class="mt-4">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <p class="text-muted mb-1">Teléfono:</p>
                                    <h5 class="font-size-14 text-truncate">{{$contact->phone}}</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <p class="text-muted mb-1">Teléfono Secundario:</p>
                                    <h5 class="font-size-14 text-truncate">{{$contact->second_phone}}</h5>                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- end card body -->
        </div>
        
        @if(auth()->user()->type_user=='admin')
        <div class="card">
            <div class="card-body p-0">
                <div class="p-4 mt-2">
                    <h5 class="font-size-16">RESPONSABLE:</h5>

                    <div class="mt-4">
                        <p class="text-muted mb-1">Nombre:</p>
                        @if($contact->id_user)
                        <h5 class="font-size-14 text-truncate">{{$contact->user->name}}</h5>
                        @else
                        <h5 class="font-size-14 text-truncate">No asignado</h5>
                        @endif
                    </div>

                    <div class="mt-4">
                        <p class="text-muted mb-1">Asignar Responsable:</p>
                        <div class="mt-4">
                            <form action="/lead_edit_user/{{$contact->id}}" method="POST" enctype="multipart/form-data">
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
                                                @if($contact->id_user)
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
                    @if($contact->id_user)
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

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="navtabs-profile" role="tabpanel">                    
                        <div class="card-body">
                            <form action="/lead_edit/{{$contact->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                    <div class="modal-body p-4">
                                        <div class="mb-3">
                                                <input type="text" name="name" class="form-control" value="{{$contact->name}}" placeholder="Nombre Completo">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="email" name="email" class="form-control" value="{{$contact->email}}" placeholder="Correo Electrónico">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="email" name="second_email" class="form-control" value="{{$contact->second_email}}" placeholder="Correo Electrónico Secundario">                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="number" name="phone" class="form-control" value="{{$contact->phone}}" placeholder="Teléfono">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="number" name="second_phone" class="form-control" value="{{$contact->second_phone}}" placeholder="Teléfono Secundario">                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" name="country" name="email" class="form-control" value="{{$contact->country}}" placeholder="País de origen...">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" name="state" class="form-control" value="{{$contact->state}}" placeholder="Provincia de Origen...">                                    
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="address" class="form-control" value="{{$contact->address}}" placeholder="Dirección">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" name="city" class="form-control" value="{{$contact->city}}" placeholder="Ciudad">                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="number" name="postal_code" value="{{$contact->postal_code}}" class="form-control" placeholder="Código Postal">                                    
                                                </div>
                                            </div>
                                            <div class="col">
                                                    <select name="id_origins" class="form-select">
                                                        <option value="{{$contact->id_origins}}">{{$contact->origin->name}}</option>
                                                        @foreach ($origin as $o)
                                                            <option value="{{$o->id}}">{{$o->name}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="col">
                                                    <select name="id_level" class="form-select">
                                                        <option value="{{$contact->id_level}}">{{$contact->level->name}}</option>
                                                        @foreach ($level as $l)
                                                            <option value="{{$l->id}}">{{$l->name}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="col">
                                                    <select name="id_type" class="form-select">
                                                        <option value="{{$contact->id_type}}">{{$contact->type->name}}</option>
                                                        @foreach ($type as $t)
                                                            <option value="{{$t->id}}">{{$t->name}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                    
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Subir imagen de perfil (Opcional)</label>
                                            <input class="form-control" name="image" type="file" id="formFile">
                                        </div>
                                    </div>
                                    <!-- end modalbody -->
                                    <div class="modal-footer">
                                        <a href="/lead"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                                        <button type="submit" class="btn btn-primary w-sm">Modificar Lead</button>
                                    </div>
                                @include('layouts.message')
                            </form><!-- end form -->    
                        </div>
                    </div>

                    {{--TASK--}}
                    @if($contact->id_user)
                    <div class="tab-pane" id="navtabs-task" role="tabpanel">
                        <div class="card-body">
                            <form action="/task_lead_create" method="POST">
                                @csrf
                                    <div class="mb-3">
                                        <input type="hidden" name="id_contact" value={{$contact->id}}>
                                        <input type="hidden" name="task_origin" value='lead'>
                                        <input type="hidden" name="id_user" value={{$contact->user->id}}>
                                        <input type="text" name="task" class="form-control" placeholder="Descripción de la Tarea...">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control" name="priority">
                                                <option value="" disabled selected>PRIORIDAD</option>
                                                <option value="alta" style="border: none; width: 100%; color: #ef7564; background-color: white;">ALTA</option>
                                                <option value="media" style="border: none; width: 100%; color: #ffb968; background-color: white;">MEDIA</option>
                                                <option value="baja" style="border: none; width: 100%; color: #7bc86c; background-color: white;">BAJA</option>
                                            </select>                                    
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="status">
                                                <option value="pendiente" style="border: none; width: 100%; color: #ef7564; background-color: white;">PENDIENTE</option>
                                                <option value="en_proceso" style="border: none; width: 100%; color: #ffb968; background-color: white;">EN PROCESO</option>
                                                <option value="hecho" style="border: none; width: 100%; color: #7bc86c; background-color: white;">HECHO</option>
                                            </select>                                    
                                        </div>
                                        <div class="col">
                                            <input type="date" name="assigned_date" class="form-control" placeholder="Asignado el..." value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">                                                                       
                                        </div>
                                        <div class="col">
                                            <input type="date" name="done_date" class="form-control" placeholder="Realizado el..." value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">                                                                     
                                        </div>
                                        <div class="modal-footer">
                                            <div class="mb-3">
                                                <a href="/lead"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                                                <button type="submit" class="btn btn-primary w-md">Agregar Tarea</button>                                            </div>
                                            </div>
                                        </div>
                                    @include('layouts.message')
                            </form>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tarea</th>
                                            <th scope="col">Prioridad</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Creado</th>
                                            <th scope="col">Finalizado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $task as $t )
                                            <tr>
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
                                                <td>{{ date('d-M-y', strtotime($t->assigned_date)) }}</td>
                                                <td>{{ date('d-M-y', strtotime($t->done_date)) }}</td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end tab pane -->
                    @endif


                    {{--Notas--}}
                    <div class="tab-pane" id="navtabs-notes" role="tabpanel">
                        <form action="/notes_lead_create" method="POST">
                            @csrf
                                <div class="mb-3">
                                    <input type="hidden" name="task_origin" value='lead'>
                                    <input type="hidden" value={{$contact->id}} name="id_contact">
                                    <textarea name="notes" placeholder="Escribe aquí las notas..." class="form-control" cols="30" rows="10" value="{{$contact->notes}}"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <div class="mt-4">
                                        <a href="/lead"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
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
                                    @foreach ( $notes as $n )
                                    <tr>
                                        <td>{{ date('d-M-y', strtotime($n->created_at)) }}</td>
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
                                            <form action="/store_file_lead" class="dropzone" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <input type="hidden" name="id_contact" class="form-control" value="{{$contact->id}}">
                                                    <input type="hidden" name="task_origin" value='lead'>
                                                    <input name="fileName" type="text" class="form-control" placeholder="Nombre / Descripción del archivo">
                                                </div>
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple="multiple">
                                                </div>
                                                <div class="dz-message needsclick text-center">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                                        <h4>Suelte los archivos aquí o haga clic para cargarlos.</h4>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="mt-4">
                                                        <a href="/lead"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
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
                                                            <td><a href="/download_file_lead/{{$c->file}}"><button type="submit" title="DESCARGAR ARCHIVO" class="btn btn-primary"><i class="bx bx-download"></i></button></a></td>                                                           
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
                                        <input type="hidden" name="email" class="form-control" value="{{$contact->email}}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="title" class="form-control" placeholder="Asunto">
                                    </div>
                                    <div class="mb-3">
                                        <textarea name="body" id=""  class="form-control" placeholder="Escribe aquí tu mensaje" cols="20" rows="5"></textarea>
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
<script src="{{ URL::asset('assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
<!-- quill js -->
<!-- init js -->
<script src="{{ URL::asset('assets/js/pages/form-editor.init.js') }}"></script>


@endsection
