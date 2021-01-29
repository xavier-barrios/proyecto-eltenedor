<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/ajax.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <title>Restaurantes</title>
</head>
<body>
<table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Calle </th>
                    <th>Tipo de cocina</th>
                    <th>Precio medio</th>
                </tr>
            </thead>
            <tbody>
            @foreach($lista as $restaurante)
                <tr>
                    <td>{{$restaurante->foto}}</td>
                    <td>{{$restaurante->nombre}}</td>
                    <td>{{$restaurante->calle}}</td>
                    <td>{{$restaurante->tipo_cocina}}</td>
                    <td>{{$restaurante->precio_medio}}</td>
                </tr>
                @endforeach   
            </tbody>
        </table>

</body>
</html>