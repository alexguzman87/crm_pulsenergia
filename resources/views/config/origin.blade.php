@extends('layouts.vertical-master-layout')
@section('title')Origen Lead @endsection
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
                <h4 class="card-title">Origen Lead</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="card-body">
                    <div id="table-search">
                        <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="d-flex flex-wrap align-items-start justify-content-md-star mt-2 mt-md-0 gap-2 mb-3">
                                        <form method="POST" action="/config_origin_create">
                                            @csrf
                                            <input type="text" name="name" placeholder="Agregar Origen de Lead..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                                            <button type="submit" name="send" title="AGREGAR" class="btn btn-primary"><i class="bx bx-save"></i></button>
                                        </form>
                                    </div>
                                </div>                                
                            </div>
                            
                            <div class="gridjs-wrapper" style="height: auto; width:60%;">
                                <table role="grid" class="gridjs-table" style="height: auto; text-align: center;">
                                    <thead class="gridjs-thead">
                                        <tr class="gridjs-tr">
                                            <th data-column-id="name" class="gridjs-th" style="min-width: 85px; width: 40%;">
                                                <div class="gridjs-th-content">Origen</div>
                                            </th>
                                            <th data-column-id="buttons" class="gridjs-th" style="min-width: 85px; width: 10%;">
                                                <div class="gridjs-th-content"></div>
                                            </th>
                                            <th data-column-id="buttons" class="gridjs-th" style="min-width: 85px; width: 10%;">
                                                <div class="gridjs-th-content"></div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="gridjs-tbody" >
                                        @foreach ( $origin as $o )
                                            <tr class="gridjs-tr">
                                                <td data-column-id="name" class="">
                                                    {{$o->name}}
                                                </td>
                                                <td>
                                                    <a href="{{route('config_origin_edit', $o->id)}}"><button type="submit" title="EDITAR" class="btn btn-primary"><i class="bx bx-edit-alt"></i></button></a>
                                                </td>
                                                <td>
                                                    <form action="{{route('config_origin_delete', $o->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" title="BORRAR" class="btn btn-primary"><i class="bx bx-x-circle"></i></button>
                                                    </form>                                                   
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="gridjs-footer" style="height: auto; width:60%;">
                                <div>{{$origin->links('layouts.pagination')}}</div>
                            </div>    
                            <div id="gridjs-temp" class="gridjs-temp"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection
@section('script')

<!-- gridjs js -->
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/gridjs.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>



@endsection
