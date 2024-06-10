@extends('layouts.vertical-master-layout')
@section('title')Contactos @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Contactos @endslot
            @slot('title') Editar @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xxl-3 col-lg-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="mt-n5 position-relative">
                    <div class="text-center">
                        <img src="{{URL::asset('images/'.auth()->user()->image)}}" alt="" class="avatar-xl rounded-circle img-thumbnail">

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
                        <p class="text-muted mb-1">Teléfono:</p>
                        <h5 class="font-size-14 text-truncate">{{$contact->phone}}</h5>
                    </div>
                </div>

            </div>
            <!-- end card body -->
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
                            <span class="d-none d-sm-block">Editar Usuario</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#navtabs-task" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Tareas</span>
                        </a>
                    </li>
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
                            <form action="/contact_edit/{{$contact->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control" value="{{$contact->name}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control" value="{{$contact->email}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <input type="email" name="second_email" class="form-control" value="{{$contact->second_email}}">                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <input type="number" name="phone" name="email" class="form-control" value="{{$contact->phone}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <input type="number" name="second_phone" class="form-control" value="{{$contact->second_phone}}">                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-md">Editar Usuario</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="navtabs-task" role="tabpanel">
                        <div class="card-body">
                            <form action="/task_create" method="POST">
                                @csrf
                                    <div class="mb-3">
                                        <input type="text" name="task" class="form-control" placeholder="Tarea">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <select class="form-control" name="id_user">
                                                    <option value="" disabled selected>Responsable</option>
                                                    @foreach ($user as $u)
                                                        <option value="{{$u->id}}">{{$u->name}}</option>
                                                    @endforeach
                                                </select>                                    
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <select class="form-control" name="priority">
                                                    <option value="" disabled selected>Prioridad</option>
                                                    <option value="Alta">Alta</option>
                                                    <option value="Media">Media</option>
                                                    <option value="Baja">Baja</option>
                                                </select>                                    
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <select class="form-control" name="status">
                                                    <option value="" disabled selected>Estado</option>
                                                    <option value="Alta">Por Asignar</option>
                                                    <option value="Media">En Proceso</option>
                                                    <option value="Baja">Realizado</option>
                                                </select>                                    
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <input type="date" name="assigned_date" class="form-control" placeholder="Asignado el..." value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">                                                                       
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <input type="date" name="done_date" class="form-control" placeholder="Realizado el..." value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">                                                                     
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary w-md">Agregar Tarea</button>                                            </div>
                                            </div>
                                        </div>
                                                                           

                            </form>
                        </div>
                        <div class="card-body">
                            <table role="grid" class="gridjs-table" style="height: auto;">
                                <thead class="gridjs-thead">
                                    <tr class="gridjs-tr">
                                        <th data-column-id="id" class="gridjs-th" style="min-width: 85px; width: auto;">
                                            <div class="gridjs-th-content">Responsable</div>
                                        </th>
                                        <th data-column-id="id" class="gridjs-th" style="min-width: 85px; width: auto;">
                                            <div class="gridjs-th-content">Tarea</div>
                                        </th>
                                        <th data-column-id="name" class="gridjs-th" style="min-width: 85px; width: auto;">
                                            <div class="gridjs-th-content">Prioridad</div>
                                        </th>
                                        <th data-column-id="email" class="gridjs-th" style="min-width: 188px; width: auto;">
                                            <div class="gridjs-th-content">Estado</div>
                                        </th>
                                        <th data-column-id="second_email" class="gridjs-th" style="min-width: 243px; width: auto;">
                                            <div class="gridjs-th-content">Creado</div>
                                        </th>
                                        <th data-column-id="phone" class="gridjs-th" style="min-width: 124px; width: auto;">
                                            <div class="gridjs-th-content">Finalizado</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="gridjs-tbody">
                                    @foreach ( $task as $c )
                                        <tr class="gridjs-tr">
                                            <td data-column-id="id" class="gridjs-td">{{$c->user->name}}</td>
                                            <td data-column-id="id" class="gridjs-td">{{$c->task}}</td>
                                            <td data-column-id="id" class="gridjs-td">{{$c->priority}}</td>
                                            <td data-column-id="id" class="gridjs-td">{{$c->status}}</td>
                                            <td data-column-id="id" class="gridjs-td">{{ date('d-M-y', strtotime($c->assigned_date)) }}</td>
                                            <td data-column-id="id" class="gridjs-td">{{ date('d-M-y', strtotime($c->done_date)) }}</td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end tab pane -->
                    <div class="tab-pane" id="navtabs-notes" role="tabpanel">
                        <form action="/contact_edit/{{$contact->id}}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="mb-3">
                                    <textarea name="notes" placeholder="Escribe aquí las notas" class="form-control" cols="30" rows="10" value="{{$contact->notes}}"></textarea>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary w-md">Editar Notas</button>
                                </div>
                        </form>
                    </div><!-- end tab pane -->
                    <div class="tab-pane" id="navtabs-files" role="tabpanel">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <form action="#" class="dropzone">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple="multiple">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                                    </div>
                        
                                                    <h4>Suelte los archivos aquí o haga clic para cargarlos.                                                    </h4>
                                                </div>
                                            </form>
                                            <!-- end form -->
                                        </div>
                        
                                        <div class="text-center mt-4">
                                            <button type="button" class="btn btn-primary">Guardar Archivo</button>
                                        </div>
                                    </div>
                                </div><!-- end card -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div><!-- end tab pane -->
                    <div class="tab-pane" id="navtabs-mail" role="tabpanel">
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control" value="{{$contact->email}}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Asunto">
                                    </div>
                                    <div class="card-body">
                                        <div id="ckeditor-classic"></div>
                                    </div><!-- end cardbody -->
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-md">Enviar Correo</button>
                                    </div>
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
