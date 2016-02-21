<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Intervenidos</title>
    </head>
    <body>
    <table border="1px">
        <head>
            <tr>
                <th>Nombre</th>
                <th>Tipo Documento</th>
                <th>Documento</th>
                <th>Direcci&oacute;n</th>
                <th>Tel&eacute;fono</th>
                <th>Email</th>
                <th>Escolaridad</th>
            </tr>
        </head>
        <tbody>
            @foreach($intervened as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->document_type}}</td>
                    <td>{{$item->document}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->pupilage}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </body>
</html>