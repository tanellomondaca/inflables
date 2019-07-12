function jornada(fecha) {
    
    var xhr_trabajadores = new XMLHttpRequest;

    xhr_trabajadores.open('GET', "trabajadores_consulta.php?v=2&fecha=" + fecha);

    xhr_trabajadores.addEventListener('load', (info) => {
        var resultado_trabajadores = new String;
        resultado_trabajadores = info.target.response;
        $("#dataTable").html(resultado_trabajadores);
    })
    xhr_trabajadores.send();
}

function listaTrabajadores(){
    var xhr_trabajadores = new XMLHttpRequest;

    xhr_trabajadores.open('GET', "trabajadores_consulta.php?v=3");

    xhr_trabajadores.addEventListener('load', (info) => {
        var resultado_trabajadores = new String;
        resultado_trabajadores = info.target.response;
        $("#trabajador").html(resultado_trabajadores);
    })
    xhr_trabajadores.send();
}

listaTrabajadores();

function enviar(){
    var rut = $("#trabajador").val();
    var mes = $("#mes").val();
    var ano = $("#ano").val();

    var url = "trabajadores_hrs.php?rut="+rut+"&mes="+mes+"&ano="+ano;

    location.assign(url);

}