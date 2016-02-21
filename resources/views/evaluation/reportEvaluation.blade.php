<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Evaluaciones</title>
</head>
<body>
<table border="1px">
    <head>
        <tr>
            <th>Intervencion</th>
            <th>Usuario</th>
            <th>Descripci&oacute;n Evidencia</th>
            <th>Impacto</th>
            <th>Estado Inicial</th>
            <th>Estado Final</th>
            <th>Descripci&oacute;n</th>
            <th>Recomendaciones</th>
        </tr>
    </head>
    <tbody>
    @foreach($evaluation as $item)
        <tr>
            <td>{{$item->intervention}}</td>
            <td>{{$item->user}}</td>
            <td>{{$item->descripcion_evidencia}}</td>
            <td>{{$item->impacto}}</td>
            <td>{{$item->estado_inicial}}</td>
            <td>{{$item->estado_final}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->recomendaciones}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>