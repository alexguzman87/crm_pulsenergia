@extends('layouts.vertical-master-layout')
@section('title') CONVERTIR A OPORTUNIDAD | @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Oportunidad @endslot
            @slot('title') Generar Oportunidad @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xl-6">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Generar Oportunidad</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div>
                <form action="{{route('convert_lead_to_oportunity')}}" method="POST">
                        @csrf
                        @if (auth()->user()->type_user=='admin')
                        <div class="mb-3">
                            <select name="id_user" class="form-select">
                                <option value="" selected disabled hidden>Responsable</option>
                                @foreach ($user as $u)
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                            </select>
                        </div> 
                        @else
                            <input type="hidden" name="id_user" class="form-control" value={{auth()->user()->id}}>
                        @endif
                        <div class="mb-3">
                            <input type="hidden" name="id_contact" class="form-control" placeholder="Titulo" value="{{$contact->id}}">
                            <input type="text" name="title" class="form-control" placeholder="Titulo" value="{{ old('title') }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="contact_name" class="form-control" placeholder="Nombre del contacto" value="{{$contact->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="organization" class="form-control" placeholder="Organización"  value="{{ old('organization') }}">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Correo Electrónico"  value="{{$contact->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="number" name="phone" class="form-control" placeholder="Teléfono" value="{{$contact->phone}}">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="country" class="form-control" placeholder="País" value="{{$contact->country}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="state" class="form-control" placeholder="Estado / Provincia/ Región" value="{{$contact->state}}">                                    
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="address" class="form-control" placeholder="Dirección" value="{{$contact->address}}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="city" class="form-control" placeholder="Ciudad" value="{{$contact->city}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="number" name="postal_code" class="form-control" placeholder="Código Postal" value="{{$contact->postal_code}}">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <input type="number" name="budget" class="form-control" placeholder="Presupuesto" value="{{ old('budget') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <select name="status" class="form-select" value="">
                                        <option value="oportunity">Oportunidad</option>
                                        <option value="proposal">En Propuesta</option>
                                        <option value="need">Necesito Apoyo</option>
                                        <option value="sale">Venta Exitosa</option>
                                        <option value="lost">Pérdido</option>
                                    </select> 
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Probabilidad: <output id="value"></output>%</label>
                                </div>
                            </div><!-- end row -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <input id="pi_input" name="probability" class="form-range mt-2" type="range" min="0" max="100" step="10" value="{{ old('probability') }}"/>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <select name="id_origins" class="form-select">
                                        <option value="" selected disabled hidden>Origen Oportunidad</option>
                                        @foreach ($origin as $o)
                                            <option value="{{$o->id}}">{{$o->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- end row -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <select name="id_level" class="form-select">
                                        <option value="" selected disabled hidden>Nivel Oportunidad</option>
                                        @foreach ($level as $l)
                                            <option value="{{$l->id}}">{{$l->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- end row -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <select name="id_type" class="form-select">
                                        <option value="" selected disabled hidden>Tipo Oportunidad</option>
                                        @foreach ($type as $t)
                                            <option value="{{$t->id}}">{{$t->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- end row -->
                        </div><!-- end row -->
                        <div class="mb-3">
                            <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Descripción" value="{{ old('description') }}"></textarea>
                        </div>
                        <div class="mt-4">
                            <a href="/oportunity"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                            <button type="submit" class="btn btn-primary w-md">Crear Oportunidad</button>
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
@section('script')

<script>
const value = document.querySelector("#value");
    const input = document.querySelector("#pi_input");
    value.textContent = input.value;
    input.addEventListener("input", (event) => {
      value.textContent = event.target.value;
    });
    </script>

@endsection
