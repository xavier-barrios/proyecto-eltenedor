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
    var ajax = new objetoAjax();
    // Busca la ruta read y que sea asyncrono
    ajax.open('GET', 'mostrar', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            alert(respuesta);
            var tabla = '';
            tabla += '<table>';
            tabla += '<tr>';
            tabla += '<th>Nombre</th>';
            tabla += '<th>Calle</th>';
            tabla += '<th>Tipo de cocina</th>';
            tabla += '</tr>';
            for (let i = 0; i < respuesta.length; i++) {
                tabla += '<tr>'
                tabla += '<td>' + respuesta[i].nombre + '</td>'
                tabla += '<td>' + respuesta[i].calle + '</td>'
                tabla += '<td>' + respuesta[i].tipo_cocina + '</td>'
                tabla += '</tr>'
            }
            tabla += '</table>'
        }
        restaurantes.innerHTML = tabla;
    }
    ajax.send(datasend);
}