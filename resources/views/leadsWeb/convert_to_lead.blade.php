@extends('layouts.vertical-master-layout')
@section('title')  CONVERTIR A LEAD | @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Lead @endslot
            @slot('title') Agregar Lead @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xl-9">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Convertir a un Lead</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div>
                    <form action="/lead_create" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="modal-body p-4">
                                <div class="mb-3">
                                    @foreach ($form as $f)
                                        @foreach (json_decode($f->fields) as $i)
                                        <div class="mb-3">
                                        <input type="text" name={{$i->name}} class="form-control" placeholder="Correo Electrónico" value={{$i->value}}>    
                                    </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <select name="id_origins" class="form-select">
                                            <option value="" selected disabled hidden>Origen del Lead</option>
                                            @foreach ($origin as $o)
                                                <option value="{{$o->id}}">{{$o->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="id_level" class="form-select">
                                            <option value="" selected disabled hidden>Nivel del Lead</option>
                                            @foreach ($level as $l)
                                                <option value="{{$l->id}}">{{$l->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="id_type" class="form-select">
                                            <option value="" selected disabled hidden>Tipo del Lead</option>
                                            @foreach ($type as $t)
                                                <option value="{{$t->id}}">{{$t->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- end modalbody -->
                            <div class="modal-footer">
                                <a href="/lead"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                                <button type="submit" class="btn btn-primary w-sm">Convertir a Lead</button>
                            </div>
                        @include('layouts.message')
                        </form><!-- end form -->
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
<!-- End Form Layout -->

@endsection

