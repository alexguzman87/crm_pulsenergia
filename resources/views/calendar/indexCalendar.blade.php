@extends('layouts.vertical-master-layout')
@section('title')CALENDARIO | @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Calendario @endslot
            @slot('title') Calendario @endslot
        @endcomponent
    @endsection
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-xl-10">
                    <div class="card card-h-100">
                        <div class="card-body">  
                            <div class="d-flex flex-wrap align-items-start justify-content-md-end mt-2 mt-md-0 gap-2 mb-3">
                                <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addContactModal"><button type="submit" title="CREAR TAREA" name="send" class="btn btn-primary">Agregar Tarea</button></a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->

                <!-- Modal -->
                <div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addContactModalLabel">Agregar Tarea</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- end modalheader -->
                            <div class="modal-body p-4">
                                <form action="/task_lead_create" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3">
                                            <input type="hidden" name="task_origin" value='general'>
                                            <input type="hidden" name="id_user" value={{auth()->user()->id}}>
                                            <input type="text" name="task" class="form-control" placeholder="Descripción de la Tarea" required>
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
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <select class="form-control" name="status">
                                                <option value="pendiente" style="border: none; width: 100%; color: #ef7564; background-color: white;">PENDIENTE</option>
                                                <option value="en_proceso" style="border: none; width: 100%; color: #ffb968; background-color: white;">EN PROCESO</option>
                                                <option value="hecho" style="border: none; width: 100%; color: #7bc86c; background-color: white;">HECHO</option>
                                            </select>                                    
                                        </div>
    
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="formrow-firstname-input">Fecha de Asignado</label>
                                            <input type="date" name="assigned_date" class="form-control" placeholder="Fecha Asignado" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="formrow-firstname-input">Hora de Asignado</label>                                        
                                            <input class="form-control" name="assigned_time" type="time" placeholder="Hora Asignado"  min="<?php echo date('H:m'); ?>" required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="formrow-firstname-input">Fecha de Realizado</label>
                                            <input type="date" name="done_date" class="form-control" placeholder="Fecha Realizado" min="<?php echo date('Y-m-d'); ?>" required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="formrow-firstname-input">Hora de Realizado</label>
                                            <input class="form-control" name="done_time" type="time" placeholder="Hora Realizado" required>
                                        </div>
    
                                        <div class="modal-footer">
                                            <div class="mb-3">
                                                <a href="/calendar"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                                                <button type="submit" class="btn btn-primary w-md">Agregar Tarea</button>
                                            </div>
                                        </div>
                                    </div>
                                    @include('layouts.message')
                                </form>
                            </div>
                        </div><!-- end content -->
                    </div>
                </div>
                <!-- end modal -->
  
                <div class="col-xl-10">
                    <div class="card card-h-100">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
  
            <div style='clear:both'></div>
          </div>
    </div>
  


@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/calendar.init.js') }}"></script>
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/gridjs.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          
            //eventClick: function(info) {
                //alert('Event: ' + info.event.title,);
            //},
          

          initialView: 'dayGridMonth',
          locales: 'es',
          events: @json($events),
          buttonText: { 
            dayGridDay: "Hoy", 
            dayGridWeek: "Semana", 
            dayGridMonth: "Mes"
        },
          headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'dayGridDay,dayGridWeek,dayGridMonth'
        },
        });
        calendar.render();

      });

    </script>


@endsection