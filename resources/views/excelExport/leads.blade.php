<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha de contacto</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Email Secundario</th>
            <th>Teléfono</th>
            <th>Teléfono Secundario</th>
            <th>Notas</th>
        </tr>
    </thead>
    <tbody class="gridjs-tbody">
        @foreach ( $contact as $c )
            <tr class="gridjs-tr">
                <td data-column-id="id" class="gridjs-td">{{$c->id}}</td>
                <td data-column-id="id" class="gridjs-td">{{date("d/m/Y", strtotime($c->created_at))}}</td>
                <td data-column-id="name" class="gridjs-td">{{$c->name}}</td>
                <td data-column-id="email" class="gridjs-td">{{$c->email}}</td>
                <td data-column-id="second_email" class="gridjs-td">{{$c->second_email}}</td>
                <td data-column-id="phone" class="gridjs-td">{{$c->phone}}</td>
                <td data-column-id="second_phone" class="gridjs-td">{{$c->second_phone}}</td>
                <td data-column-id="notes" class="gridjs-td">{{$c->notes}}</td>
            </tr>
        @endforeach
    </tbody>
</table>    