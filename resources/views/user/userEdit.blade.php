@extends('layouts.vertical-master-layout')
@section('title')Editar @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') usuarios @endslot
            @slot('title') Editar @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xl-6">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Editar {{$user->name}}</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div>
                <form action="/user_edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-firstname-input">Nombre</label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-firstname-input">Correo Electrónico</label>
                                    <input type="email" name="email" class="form-control" value="{{$user->email}}">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-firstname-input">Nombre de usuario</label>
                                    <input type="text" name="username" class="form-control" value="{{$user->username}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-firstname-input">Tipo de Usuario</label>
                                    <select name="type_user" class="form-select">
                                        <option value="" selected disabled hidden>Selecciona un perfil</option>
                                        <option value="admin">Administrador</option>
                                        <option value="analyst">Analista</option>
                                        <option value="general">General</option>
                                    </select>                          
                                </div>
                            </div>
                        </div><!-- end row -->
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Modificar imagen</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-md">Editar Usuario</button>
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
