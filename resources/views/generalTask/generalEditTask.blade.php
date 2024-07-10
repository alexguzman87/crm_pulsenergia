@extends('layouts.vertical-master-layout')
@section('title')EDITAR TAREA | @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Tarea @endslot
            @slot('title') Editar Tarea  @endslot
        @endcomponent
    @endsection

    <div class="row">
        <div class="col-xl-6">
            <div class="card card-h-100">
                <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title">Editar Tarea</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div>
                        <form action="/task_update/{{$task->id}}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="modal-body p-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-firstname-input">Nombre de la tarea</label>
                                        <input type="hidden" name="id_oportunity" value={{$task->id}}>
                                        <input type="hidden" name="task_origin" value='{{$task->task_origin}}'>
                                        <input type="hidden" name="id_user" value={{$task->id_user}}>
                                        <input type="text" name="task" class="form-control" placeholder="Nombre de la Tarea" value="{{$task->task}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-firstname-input">Prioridad</label>
                                                <select class="form-control" name="priority">
                                                    <option value="" disabled selected>PRIORIDAD</option>
                                                    <option value="alta" style="border: none; width: 100%; color: #ef7564; background-color: white;">ALTA</option>
                                                    <option value="media" style="border: none; width: 100%; color: #ffb968; background-color: white;">MEDIA</option>
                                                    <option value="baja" style="border: none; width: 100%; color: #7bc86c; background-color: white;">BAJA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-firstname-input">Estado</label>
                                                <select class="form-control" name="status">
                                                    <option value=""disabled selected>ESTADO</option>
                                                    <option value="pendiente" style="border: none; width: 100%; color: #ef7564; background-color: white;">PENDIENTE</option>
                                                    <option value="en_proceso" style="border: none; width: 100%; color: #ffb968; background-color: white;">EN PROCESO</option>
                                                    <option value="hecho" style="border: none; width: 100%; color: #7bc86c; background-color: white;">HECHO</option>
                                                </select>                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-firstname-input">Asignado el: {{date("d/m/Y", strtotime($task->assigned_date))}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-firstname-input">Realizado el</label>
                                                <input type="date" name="done_date" class="form-control" placeholder="Realizado el..." value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">                                                                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modalbody -->
                                <div class="modal-footer">
                                    <a href="/general_task"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                                    <button type="submit" class="btn btn-primary w-sm">Modificar Tarea</button>
                                </div>
                            @include('layouts.message')
                        </form><!-- end form -->
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
@endsection
