@extends('layouts.vertical-master-layout')
@section('title')Usuarios @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Inicio @endslot
            @slot('title') Contactos Web  @endslot
        @endcomponent
    @endsection
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Contactos Web</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="card-body">
                    <div id="table-search">
                        <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                            <div class="gridjs-head">
                                <div class="gridjs-search">
                                    <form method="GET" action="/contact">
                                        @csrf
                                        <input type="text" name="search_id" placeholder="Buscar ID..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                                        <input type="text" name="search_name" placeholder="Buscar Nombre..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                                        <input type="text" name="search_email" placeholder="Buscar email..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                                        <input type="text" name="search_phone" placeholder="Buscar Teléfono..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                                        <input type="text" name="search_cycle" placeholder="Buscar Ciclo..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                                        <button type="submit" name="send" class="btn btn-primary"><i class="bx bx-send"></i></button>
                                        <a href="/contact"><button type="submit" name="send" class="btn btn-primary"><i class="bx bxs-eraser"></i></button></a>
                                    </form>
                                </div>                                
                            </div>
                            <div class="gridjs-wrapper" style="height: auto;">
                                <table role="grid" class="gridjs-table" style="height: auto; text-align: center;">
                                    <thead class="gridjs-thead">
                                        <tr class="gridjs-tr">
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
                                            <th>Ciclo</th>
                                            <th>Asunto</th>
                                            <th>Mensaje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i => $k)
                                       <tr>
                                            <td>
                                            {{$data['name']}}
                                           </td>                                        
                                           <td>
                                            {{$data['phone']}}
                                           </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="gridjs-temp" class="gridjs-temp"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 
                

                
                
                end card body -->
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
