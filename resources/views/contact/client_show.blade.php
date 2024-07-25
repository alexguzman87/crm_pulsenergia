@extends('layouts.vertical-master-layout')
@section('title') EDITAR CLIENTE | @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Leads @endslot
            @slot('title') Listado Cliente  @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5 class="card-title">Total Clientes <span class="text-muted fw-normal ms-2">{{$contact->count()}}</span></h5>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="d-flex flex-wrap align-items-start justify-content-md-end mt-2 mt-md-0 gap-2 mb-3">
                            @if(auth()->user()->type_user=='admin')
                            <div>
                                <a href="/lead_export"><button type="submit" title="EXPORTAR EXCEL" name="send" class="btn btn-primary"><i class="bx bx-download"></i></button></a>
                            </div>
                            @endif
                            <div>
                                <a href="/lead_create"><button type="submit" title="EXPORTAR EXCEL" name="send" class="btn btn-primary"><i class="bx bx-user-plus"></i></button></a>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="GET" action="/lead">
                            @csrf
                            <input type="text" name="search_id" placeholder="Buscar ID" aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                            <input type="text" name="search_name" placeholder="Buscar Nombre" aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                            <input type="text" name="search_email" placeholder="Buscar email" aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">

                            <select style="width: 250px; border-color: var(--bs-input-border);background-color: var(--bs-input-bg);color: var(--bs-body-color); border: 1px solid #d2d6dc; border-radius: 5px; font-size: 14px; line-height: 1.45; outline: none; padding: 10px 13px;" class="gridjs-input gridjs-search-input" name="search_type">
                                <option disabled selected>Buscar tipo...</option>
                                    @foreach ($type as $t)
                                        <option value={{$t->id}}>{{$t->name}}</option>  
                                    @endforeach
                            </select> 
                            <input type="text" name="search_phone" placeholder="Buscar Telefono" aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                            <button type="submit" name="send" title="FILTRAR" class="btn btn-primary"><i class="bx bx-send"></i></button>
                            <a href="/errase"><button type="submit" name="send" title="BORRAR FILTRO" class="btn btn-primary"><i class="bx bxs-eraser"></i></button></a>
                        </form>
                    </div>                    
                </div><!-- end row -->
                

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap table-check">
                        <thead>
                            <tr>
                                <th scope="col">Contacto</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Email 2</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Teléfono 2</th>
                                <th style="width: 80px; min-width: 80px;">Acción</th>
                            </tr><!-- end tr -->
                        </thead><!-- end thead -->
                        <tbody>
                            @foreach ( $contact as $c )
                            <tr>
                                <td>{{date("d/m/Y", strtotime($c->created_at))}}</td>
                                <td>{{$c->origin->name}}</td>
                                <td>{{$c->name}}</td>
                                <td>{{$c->email}}</td>
                                <td>{{$c->second_email}}</td>
                                <td>{{$c->phone}}</td>
                                <td>{{$c->second_phone}}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{route('lead_edit', $c->id)}}"><button type="submit" title="EDITAR LEAD" class="btn btn-primary"><i class="uil-eye"></i></button></a>
                                        <form action="{{route('lead_delete', $c->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="BORRAR USUARIO" class="btn btn-primary"><i class="bx bx-x-circle"></i></button>
                                        </form> 
                                        <a href={{route('convert_to_oportunity', $c->id)}}><button type="submit" title="CONVERTIR A OPORTUNIDAD" class="btn btn-primary"><i class="uil-arrow-up-right"></i></button></a> 
                                    </div>
                                </td>
                                
                            </tr><!-- end tr --> 
                            @endforeach
                            
                        {{--<!-- editcontactModal -->
                                <div class="modal fade" id="editcontactModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editcontactModalLabel">Editar: {{$contact->name}} {{$contact->id}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- end modalheader -->
                                            <form action="/contact_edit/{{$contact->id}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                                <div class="modal-body p-4">
                                                    <div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-firstname-input">Nombre</label>
                                                            <input type="text" name="name" class="form-control" value="{{$contact->name}}">
                                                        </div> 
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-firstname-input">Correo Electrónico</label>
                                                            <input type="email" name="email" class="form-control" value="{{$contact->email}}">                                                       </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-firstname-input">Nombre de usuario</label>
                                                                    <input type="text" name="contactname" class="form-control" value="{{$contact->contactname}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-firstname-input">Tipo de Usuario</label>
                                                                    <select name="type_contact" class="form-select">
                                                                        <option value="{{$contact->type_contact}}">@if($contact->type_contact == 'admin') Administrador @endif
                                                                            @if($contact->type_contact == 'analyst') Analista @endif
                                                                            @if($contact->type_contact == 'general') General @endif</option>
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
                                                </div>
                                                <!-- end modalbody -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary w-md">Editar Usuario</button>
                                                </div>
                                            @include('layouts.message')
                                            </form><!-- end form -->
                                            <!-- end modalfooter -->                            
                                        </div><!-- end content -->
                                    </div>
                                </div>
                                <!-- end editcontactmodal -->--}}


                                {{--<!-- editPasswordModal -->
                                <div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPasswordModal">EDITAR CONTRASEÑA: {{$contact->name}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- end modalheader -->
                                            <form action="/contact_edit_pass/{{$contact->id}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                                <div class="modal-body p-4">
                                                    <div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-firstname-input">Nueva Contraseña</label>
                                                            <input type="text" name="password" class="form-control" id="formrow-password-input" placeholder="Escribe la nueva contraseña">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end modalbody -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary w-sm">Modificar Contraseña</button>
                                                </div>
                                            @include('layouts.message')
                                            </form><!-- end form -->
                                            <!-- end modalfooter -->                            
                                        </div><!-- end content -->
                                    </div>
                                </div>
                                <!-- end editcontactmodal -->--}}


                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div><!-- end table responsive -->
                <div class="row g-0 text-center text-sm-start">
                    <div>{{$contact_user->links('layouts.pagination')}}</div>
                </div><!-- end row -->  
                <div id="gridjs-temp" class="gridjs-temp"></div>
                @include('layouts.message')
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<!-- end row -->
@endsection
@section('script')

<!-- gridjs js -->
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/gridjs.init.js') }}"></script>



@endsection
