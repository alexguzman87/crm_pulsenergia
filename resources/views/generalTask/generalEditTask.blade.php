@extends('layouts.vertical-master-layout')
@section('title')NANANANNAA @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Inicio @endslot
            @slot('title') Origen Lead  @endslot
        @endcomponent
    @endsection
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Editar Origen</h4>
            </div><!-- end card header -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="/task_oportunity_create" method="POST">
                    @csrf
                        <div class="mb-3">
                            <input type="text" name="id_oportunity" value={{$task->id}}>
                            <input type="text" name="task_origin" value='{{$task->task_origin}}'>
                            <input type="text" name="id_user" value={{$task->user->name}}>
                            <input type="text" name="task" class="form-control" placeholder="Nombre de la Tarea..." value="{{$task->task}}">
                        </div>
                        <div class="row">
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
                                        <option value="Asignado">Asignado</option>
                                        <option value="En Proceso">En Proceso</option>
                                        <option value="Realizado">Realizado</option>
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
                                    <a href="/lead"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                                </div>
                            </div>
                            <div class="col-md-2">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary w-md">Agregar Tarea</button>                                            </div>
                                    </div>  
                            </div>
                        @include('layouts.message')
                </form>
            </div>
        </div>
    </div>
</div>
                


@endsection
