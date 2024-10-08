@php
    if(Route::current()->getName() == 'lead_create'){
        $namePage = "Lead";
    }else{
        $namePage = "Cliente";
    }
@endphp

@extends('layouts.vertical-master-layout')
@section('title')  AGREGAR {{strtoupper($namePage)}} | @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') {{$namePage}} @endslot
            @slot('title') Agregar {{$namePage}} @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xl-9">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title">{{$namePage}}</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div>
                    <form action="/lead_create" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <div class="modal-body p-4">
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
                                <input type="hidden" name="type" class="form-control" value={{(Route::current()->getName() == 'lead_create')?"lead":"client"}}>
                                <div class="mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre Completo" value="{{ old('name') }}" id="name" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control" placeholder="Correo Electrónico" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="email" name="second_email" class="form-control" placeholder="Correo Electrónico Secundario" value="{{ old('second_email') }}">                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="text" onkeypress="return valideKey(event);" name="phone" class="form-control" placeholder="Teléfono" value="{{ old('phone') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="text" onkeypress="return valideKey(event);" name="second_phone" class="form-control" placeholder="Teléfono Secundario" value="{{ old('second_phone') }}">                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">                                            
                                            <select name="country" class="form-select" id="country" onchange="">
                                                <option value="España">España</option>
                                                @foreach ($country as $c)
                                                    <option value="{{$c->name}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            {{--Aqui esta el codigo de españa complementado con el script--}}
                                            <select name="state" Style="display:none" class="form-select" id="spain" onchange="">
                                                <option value="" selected disabled hidden>Provincia</option>
                                                @foreach ($state as $s)
                                                    <option value={{$s->name}}>{{$s->name}}</option>
                                                @endforeach
                                            </select>
                                            {{--Aqui esta el input de no ser españa--}}
                                            <input type="text" id="non_spain" Style="display:none" name="state" class="form-control" placeholder="Provincia" value="{{ old('state') }}" >                                    
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="city" class="form-control" placeholder="Ciudad" value="{{ old('city') }}" >                                    
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="street" class="form-control" placeholder="Calle / Avenida" value="{{ old('city') }}" >                                    
                                    </div>

                                    <div class="col-md-9 mb-3">
                                        <input type="text" name="address" class="form-control" placeholder="Dirección" value="{{ old('address') }}" >
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="text" name="postal_code" minlength="5" maxlength="5" onkeypress="return valideKey(event);" class="form-control" placeholder="Código Postal" value="{{ old('postal_code') }}" >                                    
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <input type="text" name="coordinate" class="form-control" placeholder="Coordenadas" value="{{ old('coordinate') }}" >                                        
                                    </div>

                                    <div class="col">
                                        <select name="id_origins" class="form-select" >
                                            <option value="" selected disabled hidden>Origen del Lead</option>
                                            @foreach ($origin as $o)
                                                <option value="{{$o->id}}">{{$o->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="id_level" class="form-select" >
                                            <option value="" selected disabled hidden>Nivel del Lead</option>
                                            @foreach ($level as $l)
                                                <option value="{{$l->id}}">{{$l->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="id_type" class="form-select" >
                                            <option value="" selected disabled hidden>Tipo del Lead</option>
                                            @foreach ($type as $t)
                                                <option value="{{$t->id}}">{{$t->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- ***ESTE ES EL INPUT PARA SUBIR LA IMAGEN***
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Subir imagen de perfil (Opcional)</label>
                                    <input class="form-control" name="image" type="file" id="formFile">
                                </div>--}}
                                <div class="mb-3">
                                </div>
                                <div class="mb-3">
                                    <textarea name="notes" class="form-control" cols="30" rows="10" placeholder="Descripción" >{{ old('notes') }}</textarea>
                                </div>
                            </div>
                            <!-- end modalbody -->
                            <div class="modal-footer">
                                @if(Route::current()->getName() == 'lead_create')
                                    <a href="/lead"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                                @else
                                    <a href="/client"><button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button></a>
                                @endif
                                <button type="submit" class="btn btn-primary w-sm">Agregar {{$namePage}}</button>
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

<script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/gridjs.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script>

    var spain = document.getElementById('spain');
    var non_spain = document.getElementById('non_spain');
    var country = document.getElementById("country");
    
    function valideKey(evt){
    
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
}


    window.addEventListener("load", () => {
        if(country.value === "España") {
        spain.style.display = 'initial';
        non_spain.style.display = 'none';
        //non_spain.removeAttribute("required");
        non_spain.removeAttribute("name");
        //spain.required = true;
        }
    });

    
    country.addEventListener("change", () => {
      if (country.value === "España") {
        spain.style.display = 'initial';
        non_spain.style.display = 'none';
        non_spain.removeAttribute("required");
        non_spain.removeAttribute("name");
        spain.setAttribute("name", "state");
        //spain.required = true;
      } else {
        non_spain.style.display = 'initial';
        spain.style.display = 'none';
        spain.removeAttribute("required");
        spain.removeAttribute("name");
        non_spain.setAttribute("name", "state");
        //non_spain.required = true;
      }
    });

</script>
@endsection

