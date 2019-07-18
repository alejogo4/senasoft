<table>
    <thead>
        <tr>
            <th>Regional</th>
            <th>Centro de Formación</th>
            <th>Categoria</th>
            <th>Tipo Documento</th>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Fecha de Nacimiento</th>
            <th>Ficha</th>
            <th>Ciudad</th>
            <th>Aeropuerto de Origen</th>
            <th>Tipo de Contrato</th>
            <th>Correo</th>
            <th>Correo Alterno</th>
            <th>Teléfono</th>
            <th>Teléfono Alterno</th>
            <th>Programa de Formación</th>
            <th>RH</th>
            <th>EPS</th>
            <th>ARL</th>
            <th>Talla de Camisa</th>
            <th>Tipo de Alimentación</th>
            <th>Alergias</th>
            <th>Enfermedades</th>
            <th>Medicamentos</th>
            <th>Tipo de Persona</th>
            <th>Fecha de Creación</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos as $value)
            <?php echo "<pre>"; print($value); echo "</pre>"; ?>
            
        @endforeach
    </tbody>
</table>