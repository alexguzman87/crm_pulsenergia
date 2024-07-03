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
                <form action="/user_edit_pass/{{$user->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <!--<div class="mb-3">
                                    <input type="hidden" name="username" class="form-control" id="formrow-email-input"  value="{{$user->username}}">
                                    <input type="hidden" name="email" class="form-control" id="formrow-email-input"  value="{{$user->email}}">
                                    <input type="hidden" name="name" class="form-control" id="formrow-firstname-input"  value="{{$user->name}}">
                                </div>-->
                            </div><!-- end col -->
                        </div><!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-firstname-input">Nueva Contraseña</label>
                                    <input type="password" name="password" class="form-control" id="formrow-password-input" placeholder="Escribe la nueva contraseña">
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-md">Modificar Contraseña</button>
                            <a href="/user"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
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
