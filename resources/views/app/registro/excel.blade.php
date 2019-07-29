<table>
    <thead>
        <tr>
            <th><b>Regional</b></th>
            <th><b>Centro de Formación</b></th>
            <th><b>Categoria</b></th>
            <th><b>Tipo Documento</b></th>
            <th><b>Documento</b></th>
            <th><b>Nombre</b></th>
            <th><b>Apellidos</b></th>
            <th><b>Fecha de Nacimiento</b></th>
            <th><b>Ficha</b></th>
            <th><b>Ciudad</b></th>
            <th><b>Aeropuerto de Origen</b></th>
            <th><b>Tipo de Contrato</b></th>
            <th><b>Correo</b></th>
            <th><b>Correo Alterno</b></th>
            <th><b>Teléfono</b></th>
            <th><b>Teléfono Alterno</b></th>
            <th><b>Programa de Formación</b></th>
            <th><b>RH</b></th>
            <th><b>EPS</b></th>
            <th><b>ARL</b></th>
            <th><b>Talla de Camisa</b></th>
            <th><b>Tipo de Alimentación</b></th>
            <th><b>Alergias</b></th>
            <th><b>Enfermedades</b></th>
            <th><b>Medicamentos</b></th>
            <th><b>Tipo de Persona</b></th>
            <th><b>Fecha de Creación</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos as $value)
            <tr>
                <td>{{$value->Centro->Regional->nombre_regional}}</td>
                <td>{{$value->Centro->nombre_centro}}</td>
                <td>{{$value->Categoria == null? "" : $value->Categoria->nombre_categoria}}</td>
                <td>{{$value->tipo_documento}}</td>
                <td>{{$value->documento}}</td>
                <td>{{$value->nombres}}</td>
                <td>{{$value->apellidos}}</td>
                <td>{{$value->fecha_nacimiento}}</td>
                <td>{{$value->ficha}}</td>
                <td>{{$value->ciudad}}</td>
                <td>{{$value->ciudad_desplazamiento_aereo}}</td>
                <td>{{$value->tipo_contrato}}</td>
                <td>{{$value->correo_principal}}</td>
                <td>{{$value->correo_alterno}}</td>
                <td>{{$value->telefono}}</td>
                <td>{{$value->otro_telefono}}</td>
                <td>{{$value->programa_formacion}}</td>
                <td>{{$value->rh}}</td>
                <td>{{$value->eps}}</td>
                <td>{{$value->arl}}</td>
                <td>{{$value->talla_camisa}}</td>
                <td>{{$value->tipo_alimentacion}}</td>
                <td>{{$value->alergias}}</td>
                <td>{{$value->enfermedades}}</td>
                <td>{{$value->medicamento_consume}}</td>
                <td>{{$value->TipoPersona->descripcion_tipo_persona}}</td>
                <td>{{$value->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>