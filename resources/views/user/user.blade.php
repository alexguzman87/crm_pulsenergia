@extends('layouts.vertical-master-layout')
@section('title')USUARIOS | @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Inicio @endslot
            @slot('title') Usuarios  @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5 class="card-title">Usuarios registrados <span class="text-muted fw-normal ms-2">{{$users->count()}}</span></h5>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="d-flex flex-wrap align-items-start justify-content-md-end mt-2 mt-md-0 gap-2 mb-3">
                            <div>
                                <a href="/user_export"><button type="submit" title="EXPORTAR EXCEL" name="send" class="btn btn-primary"><i class="bx bx-download"></i></button></a>
                            </div>
                            <div>
                                <a href="#" class="btn btn-primary" title="AGREGAR USUARIO" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="bx bx-user-plus"></i></a>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="GET" action="/user">
                            @csrf
                            <input type="text" name="search_id" placeholder="Buscar ID..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                            <select style="width: 250px; border-color: var(--bs-input-border);background-color: var(--bs-input-bg);color: var(--bs-body-color); border: 1px solid #d2d6dc; border-radius: 5px; font-size: 14px; line-height: 1.45; outline: none; padding: 10px 13px;" class="gridjs-input gridjs-search-input" name="search_type">
                                <option value="" disabled selected>Buscar tipo...</option>
                                <option value="admin">Administrador</option>
                                <option value="commercial">Comercial</option>
                            </select> 
                            <input type="text" name="search_name" placeholder="Buscar Nombre..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                            <input type="text" name="search_email" placeholder="Buscar email..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                            <input type="text" name="search_username" placeholder="Buscar Nombre de Usuario..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                            <button type="submit" name="send" title="FILTRAR" class="btn btn-primary"><i class="bx bx-send"></i></button>
                            <a href="/errase"><button type="submit" name="send" title="BORRAR FILTRO" class="btn btn-primary"><i class="bx bxs-eraser"></i></button></a>
                        </form>
                    </div>                    
                </div><!-- end row -->
                


                <!-- addUserModal -->
                <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addUserModalLabel">Agregar Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- end modalheader -->
                            <form action="/user_create" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="modal-body p-4">
                                    <div>
                                        <div class="mb-3">
                                            <input type="text" name="name" class="form-control" id="formrow-firstname-input" placeholder="Nombre Completo">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <input type="Text" name="username" class="form-control" id="formrow-email-input" placeholder="Nombre de usuario">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <select name="type_user" class="form-select">
                                                    <option value="" selected disabled hidden>Selecciona un perfil</option>
                                                    <option value="admin">Administrador</option>
                                                    <option value="commercial">Comercial</option>
                                                </select> 
                                            </div>
                                        </div><!-- end row -->
                                    </div><!-- end row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control" id="formrow-email-input" placeholder="Correo Electrónico">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <input type="password" name="password" class="form-control" id="formrow-password-input" placeholder="Contraseña">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Subir imagen</label>
                                        <input class="form-control" name="image" type="file" id="formFile">
                                    </div>
                                </div>
                                <!-- end modalbody -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary w-sm">Registrar</button>
                                </div>
                            @include('layouts.message')
                            </form><!-- end form -->
                            <!-- end modalfooter -->                            
                        </div><!-- end content -->
                    </div>
                </div>
                <!-- end modal -->

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap table-check">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Usuario</th>
                                <th style="width: 80px; min-width: 80px;"></th>
                            </tr><!-- end tr -->
                        </thead><!-- end thead -->
                        <tbody>
                            @foreach ( $users as $user )
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    @if($user->image)<img src={{URL::asset('images/'.$user->image)}} alt="" class="avatar-sm rounded-circle me-2">
                                    @else<img src={{URL::asset('images/user/Sin-Perfil-Hombre.png')}} alt="" class="avatar-sm rounded-circle me-2">
                                    @endif
                                </td>
                                <td>
                                    @if($user->type_user == 'admin') Administrador @endif
                                    @if($user->type_user == 'commercial') Comercial @endif
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->username}}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{route('user_edit', $user->id)}}"><button type="submit" title="EDITAR USUARIO" class="btn btn-primary"><i class="bx bx-pencil"></i></button></a>
                                        <a href="{{route('user_edit_pass', $user->id)}}"><button type="submit" title="MODIFICAR CONTRASEÑA" class="btn btn-primary"><i class="fas fa-key"></i></button></a>
                                        <!--<a href="#" data-bs-toggle="modal" data-bs-target="#editPasswordModal"><button type="submit" title="MODIFICAR CONTRASEÑA" class="btn btn-primary"><i class="fas fa-key"></i></button></a>-->
                                        <form action="{{route('user_delete', $user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="BORRAR USUARIO" class="btn btn-primary"><i class="bx bx-x-circle"></i></button>
                                        </form>  
                                    </div>
                                </td>
                                
                            </tr><!-- end tr --> 
                            @endforeach
                            
                                <!-- editUserModal -->
                                <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editUserModalLabel">Editar: {{$user->name}} {{$user->id}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- end modalheader -->
                                            <form action="/user_edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                                <div class="modal-body p-4">
                                                    <div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-firstname-input">Nombre</label>
                                                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                                        </div> 
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-firstname-input">Correo Electrónico</label>
                                                            <input type="email" name="email" class="form-control" value="{{$user->email}}">                                                       </div>
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
                                                                        <option value="{{$user->type_user}}">@if($user->type_user == 'admin') Administrador @endif
                                                                            @if($user->type_user == 'analyst') Analista @endif
                                                                            @if($user->type_user == 'general') General @endif</option>
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
                                <!-- end editUsermodal -->


                                <!-- editPasswordModal -->
                                <div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPasswordModal">EDITAR CONTRASEÑA: {{$user->name}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- end modalheader -->
                                            <form action="/user_edit_pass/{{$user->id}}" method="POST">
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
                                <!-- end editUsermodal -->


                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div><!-- end table responsive -->
                <div class="row g-0 text-center text-sm-start">
                    <div>{{$users->links('layouts.pagination')}}</div>
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
