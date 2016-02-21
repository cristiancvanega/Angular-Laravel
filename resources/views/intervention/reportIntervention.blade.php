<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Intervenidos</title>
</head>
<body>
<table cellspacing="0" border="1px">
    <head>
        <tr>
            <th>Entidad</th>
            <th>Municipio</th>
            <th>Nombre</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Descripción</th>
            <th>Evidencias Planeadas</th>
        </tr>
    </head>
    <tbody>
    @foreach($intervention as $item)
    <tr>
        <td>{{$item->entity->name}}</td>
        <td>{{$item->municipality->name}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->start_date}}</td>
        <td>{{$item->end_date}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->evidencias_planeadas}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>