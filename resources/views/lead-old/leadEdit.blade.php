@extends('layouts.vertical-master-layout')
@section('title')Contactos @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Contactos @endslot
            @slot('title') Editar @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xl-6">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Editar {{$contact->name}}</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div>
                <form action="/contact_edit/{{$contact->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" value="{{$contact->name}}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" value="{{$contact->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="email" name="second_email" class="form-control" value="{{$contact->second_email}}">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="number" name="phone" name="email" class="form-control" value="{{$contact->phone}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="number" name="second_phone" class="form-control" value="{{$contact->second_phone}}">                                    
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea name="notes" class="form-control" cols="30" rows="10" value="{{$contact->notes}}"></textarea>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-md">Editar Usuario</button>
                        </div>
                    </form><!-- end form -->
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
<!-- End Form Layout -->

@endsection
