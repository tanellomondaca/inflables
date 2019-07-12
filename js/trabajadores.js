function llenarTabla(){
    var xhr_trabajadores = new XMLHttpRequest;

    xhr_trabajadores.open('GET', "trabajadores_consulta.php?v=1");

    xhr_trabajadores.addEventListener('load', (info) => {
        var resultado_trabajadores = new String;
        resultado_trabajadores = info.target.response;
        $("#dataTable").html(resultado_trabajadores);
    })
    xhr_trabajadores.send();
}

llenarTabla();
