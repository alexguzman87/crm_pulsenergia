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
                        <div class="avatar-group justify-content-sm-end">
                            <div class="avatar-group-item">
                                <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip" data-placement="top" title="ALEXANDER">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary">
                                            A
                                        </div>
                                    </div>
                                </a>
                            </div><!-- end avatar group item -->
                        </div><!-- end avatar-group -->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>

        {{--OPORTUNIDAD--}}
        <div class="card shadow-none border-0 bg-transparent">
            <div class="task-board">
                <div class="task-list">
                    <div class="card shadow-none h-100">
                        <div class="card-header bg-transparent border-bottom d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h4 class="card-title mb-0">OPORTUNIDAD <span class="font-size-14 text-muted">{{$oportunity->count()}}</span></h4>
                            </div>
                        </div><!-- end card-header -->
                        <div>
                            <div data-simplebar class="tasklist-content p-3">
                                <div id="todo-task" class="tasks">
                                   
                                    {{--CARD--}} 
                                    @foreach ($oportunity as $o)
                                    <div class="card task-box">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start mb-3">
                                                <div class="flex-grow-1">
                                                    {{--<label class="form-check-label text-primary" for="task-todoCheck3">DS-047</label>--}}
                                                </div>

                                                <div class="flex-shrink-0 ms-2">
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle font-size-16 text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Estado
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="oportunity">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">OPORTUNIDAD</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="proposal">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">EN PROPUESTA</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="need">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">NECESITO APOYO</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="sale">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">VENTA EXITOSA</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="lost">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">PÉRDIDO</button>                                                            
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="font-size-15 mb-1">{{$o->title}}</h5>

                                            <p class="text-muted text-truncate">{{$o->description}}</p>

                                        </div>
                                        <div class="card-footer py-2 bg-transparent border-top d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Emily Surface">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title rounded-circle bg-danger">
                                                                E
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-comment-text-outline me-1"></i>Task</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-comment-text-outline me-1"></i>Notas</a>
                                                    </li>
                                                    <li class="list-inline-item ms-1">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-link-variant me-1"></i>Archivos</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end tasklist -->

                {{--EN PROPUESTA--}}
                <div class="task-list">
                    <div class="card shadow-none h-100">
                        <div class="card-header bg-transparent border-bottom d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h4 class="card-title mb-0">EN PROPUESTA <span class="font-size-14 text-muted">{{$proposal->count()}}</span></h4>
                            </div>
                        </div>

                        <div>
                            <div data-simplebar class="tasklist-content p-3">
                                <div id="todo-task" class="tasks">
                                   
                                    @foreach ($proposal as $o)
                                    <div class="card task-box">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start mb-3">
                                                <div class="flex-grow-1">
                                                    {{--<label class="form-check-label text-primary" for="task-todoCheck3">DS-047</label>--}}
                                                </div>

                                                <div class="flex-shrink-0 ms-2">
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle font-size-16 text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Estado
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="oportunity">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">OPORTUNIDAD</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="proposal">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">EN PROPUESTA</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="need">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">NECESITO APOYO</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="sale">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">VENTA EXITOSA</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="lost">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">PÉRDIDO</button>                                                            
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="font-size-15 mb-1">{{$o->title}}</h5>

                                            <p class="text-muted text-truncate">{{$o->description}}</p>

                                        </div>
                                        <div class="card-footer py-2 bg-transparent border-top d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Emily Surface">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title rounded-circle bg-danger">
                                                                E
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-comment-text-outline me-1"></i>Task</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-comment-text-outline me-1"></i>Notas</a>
                                                    </li>
                                                    <li class="list-inline-item ms-1">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-link-variant me-1"></i>Archivos</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div><!-- end card -->
                </div><!-- end tasklist -->

                {{--APOYO--}}
                <div class="task-list">
                    <div class="card shadow-none h-100">
                        <div class="card-header bg-transparent border-bottom d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h4 class="card-title mb-0">NECESITO APOYO <span class="font-size-14 text-muted">{{$need->count()}}</span></h4>
                            </div>
                        </div>

                        <div>
                            <div data-simplebar class="tasklist-content p-3">
                                <div id="todo-task" class="tasks">
                                   
                                    @foreach ($need as $o)
                                    <div class="card task-box">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start mb-3">
                                                <div class="flex-grow-1">
                                                    {{--<label class="form-check-label text-primary" for="task-todoCheck3">DS-047</label>--}}
                                                </div>

                                                <div class="flex-shrink-0 ms-2">
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle font-size-16 text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Estado
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="oportunity">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">OPORTUNIDAD</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="proposal">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">EN PROPUESTA</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="need">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">NECESITO APOYO</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="sale">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">VENTA EXITOSA</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="lost">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">PÉRDIDO</button>                                                            
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="font-size-15 mb-1">{{$o->title}}</h5>

                                            <p class="text-muted text-truncate">{{$o->description}}</p>

                                        </div>
                                        <div class="card-footer py-2 bg-transparent border-top d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Emily Surface">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title rounded-circle bg-danger">
                                                                E
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-comment-text-outline me-1"></i>Task</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-comment-text-outline me-1"></i>Notas</a>
                                                    </li>
                                                    <li class="list-inline-item ms-1">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-link-variant me-1"></i>Archivos</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- end tasklist -->

                {{--EXITOSA--}}
                <div class="task-list">
                    <div class="card shadow-none h-100">
                        <div class="card-header bg-transparent border-bottom d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h4 class="card-title mb-0">VENTA EXITOSA <span class="font-size-14 text-muted">{{$sale->count()}}</span></h4>
                            </div>
                        </div>

                        <div>
                            <div data-simplebar class="tasklist-content p-3">
                                <div id="todo-task" class="tasks">
                                   
                                    @foreach ($sale as $o)
                                    <div class="card task-box">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start mb-3">
                                                <div class="flex-grow-1">
                                                    {{--<label class="form-check-label text-primary" for="task-todoCheck3">DS-047</label>--}}
                                                </div>

                                                <div class="flex-shrink-0 ms-2">
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle font-size-16 text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Estado
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="oportunity">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">OPORTUNIDAD</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="proposal">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">EN PROPUESTA</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="need">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">NECESITO APOYO</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="sale">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">VENTA EXITOSA</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="lost">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">PÉRDIDO</button>                                                            
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="font-size-15 mb-1">{{$o->title}}</h5>

                                            <p class="text-muted text-truncate">{{$o->description}}</p>

                                        </div>
                                        <div class="card-footer py-2 bg-transparent border-top d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Emily Surface">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title rounded-circle bg-danger">
                                                                E
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-comment-text-outline me-1"></i>Task</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-comment-text-outline me-1"></i>Notas</a>
                                                    </li>
                                                    <li class="list-inline-item ms-1">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-link-variant me-1"></i>Archivos</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- end tasklist -->

                {{--PERDIDO--}}
                <div class="task-list">
                    <div class="card shadow-none h-100">
                        <div class="card-header bg-transparent border-bottom d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h4 class="card-title mb-0">PÉRDIDO <span class="font-size-14 text-muted">{{$lost->count()}}</span></h4>
                            </div>
                        </div>

                        <div>
                            <div data-simplebar class="tasklist-content p-3">
                                <div id="todo-task" class="tasks">
                                   
                                    @foreach ($lost as $o)
                                    <div class="card task-box">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start mb-3">
                                                <div class="flex-grow-1">
                                                    {{--<label class="form-check-label text-primary" for="task-todoCheck3">DS-047</label>--}}
                                                </div>

                                                <div class="flex-shrink-0 ms-2">
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle font-size-16 text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Estado
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="oportunity">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">OPORTUNIDAD</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="proposal">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">EN PROPUESTA</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="need">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">NECESITO APOYO</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="sale">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">VENTA EXITOSA</button>                                                            
                                                            </form>
                                                            <form action="{{route('oportunity_change_status', $o->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="lost">
                                                                <button style="border: none; width: 100%; background-color: white;}" type="submit">PÉRDIDO</button>                                                            
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="font-size-15 mb-1">{{$o->title}}</h5>

                                            <p class="text-muted text-truncate">{{$o->description}}</p>

                                        </div>
                                        <div class="card-footer py-2 bg-transparent border-top d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Emily Surface">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title rounded-circle bg-danger">
                                                                E
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-comment-text-outline me-1"></i>Task</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-comment-text-outline me-1"></i>Notas</a>
                                                    </li>
                                                    <li class="list-inline-item ms-1">
                                                        <a href="" class="text-muted font-size-13"><i class="mdi mdi-link-variant me-1"></i>Archivos</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- end tasklist -->


            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

@endsection
@section('script')

<!-- dragula plugins -->
<script src="{{ URL::asset('assets/libs/dragula/dragula.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/kanbanboard.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
