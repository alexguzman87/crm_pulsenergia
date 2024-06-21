<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Nombre de Usuario</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $user as $user )
            <tr>
                <td>{{$user->id}}</td>
                <td> 
                    @if($user->type_user == 'admin') Administrador @endif
                    @if($user->type_user == 'analyst') Analista @endif
                    @if($user->type_user == 'general') General @endif
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->username}}</td>
            </tr>
        @endforeach
    </tbody>
</table>