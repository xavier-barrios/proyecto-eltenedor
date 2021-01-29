window.onload = function() {
    mostrar();
}

function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function mostrar() {
    var restaurantes = document.getElementById('restaurantes');
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    // Busca la ruta read y que sea asyncrono
    ajax.open('GET', 'mostrar', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            var tabla = '';
            tabla += '<table>';
            tabla += '<tr>';
            tabla += '<th>Foto</th>';
            tabla += '<th>Nombre</th>';
            tabla += '<th>Calle</th>';
            tabla += '<th>Tipo de cocina</th>';
            tabla += '<th>Precio medio</th>';
            tabla += '<th>Modificar</th>';
            tabla += '<th>Eliminar medio</th>';
            tabla += '</tr>';
            for (let i = 0; i < respuesta.length; i++) {
                tabla += '<tr>'
                tabla += '<td><img src="data:image/png;base64,' + respuesta[i].foto + '" alt="error"></td>';
                tabla += '<td>' + respuesta[i].nombre + '</td>'
                tabla += '<td>' + respuesta[i].calle + '</td>'
                tabla += '<td>' + respuesta[i].tipo_cocina + '</td>'
                tabla += '<td>' + respuesta[i].precio_medio + '</td>'
                tabla += '<td> <button class="btn btn-primary" onclick="openmodal(&#039;' + respuesta[i].id + '&#039;,&#039;' + respuesta[i].resultado + ')">Actualizar</button></td>';
                tabla += '<td> <button class="btn btn-danger" onclick="eliminar(' + respuesta[i].id + ')" type="sumbit">Borrar</button></td>';
                tabla += '</tr>'
            }
            tabla += '</table>'
        }
        restaurantes.innerHTML = tabla;
    }
    ajax.send(datasend);
}