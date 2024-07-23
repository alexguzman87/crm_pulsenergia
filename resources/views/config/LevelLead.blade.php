@extends('layouts.vertical-master-layout')
@section('title')NIVEL | @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Nivel @endslot
            @slot('title') Nivel Lead  @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5 class="card-title"> Total Niveles<span class="text-muted fw-normal ms-2">{{$level->count()}}</span></h5>
                        </div>
                        <div class="mb-3">
                            <a href="/config_level_lead_create"><button title="AGREGAR NIVEL" class="btn btn-primary"><i class="bx bx-save"></i> Agregar Nivel</button></a>
                        </div>
                    </div><!-- end col -->
                </div>

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap table-check">
                        <thead>
                            <tr>
                                <th scope="col">Origen</th>
                                <th scope="col">Acción</th>
                            </tr><!-- end tr -->
                        </thead><!-- end thead -->
                        <tbody>
                            @foreach ( $level as $l )
                            <tr>
                                <td>{{$l->name}}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{route('config_level_lead_edit', $l->id)}}"><button type="submit" title="EDITAR" class="btn btn-primary"><i class="bx bx-edit-alt"></i></button></a>
                                        <form action="{{route('config_level_lead_delete', $l->id)}}" method="POST">
                                            @csrf   
                                            @method('DELETE')
                                            <button type="submit" title="BORRAR" class="btn btn-primary"><i class="bx bx-x-circle"></i></button>
                                        </form>  
                                    </div>
                                </td>
                                
                            </tr><!-- end tr --> 
                            @endforeach
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div><!-- end table responsive -->
                <div class="row g-0 text-center text-sm-start">
                    <div>{{$level->links('layouts.pagination')}}</div>
                </div><!-- end row -->  
                <div id="gridjs-temp" class="gridjs-temp"></div>
                @include('layouts.message')
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->



@endsection
@section('script')

<!-- gridjs js -->
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/gridjs.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>



@endsection
