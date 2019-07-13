function fechaArriendo(){
    var fecha = $("#fecha_arriendo").val();
    //location.replace("arriendos_nuevo.php?fecha="+fecha);
    location.href = "arriendos_nuevo.php?fecha=" + fecha;
}

function asignarId(id,total){
    $("#id_arriendo").val(id);
    $("#total_abono").val(total);
}

function calcularTotal() {
    var total = $("#total_abono").val();
    var abono = $("#abono_abono").val();
    $("#saldo_abono").val(total-abono);
}

function ingresarAbono(){
    var form_abono = $("#form_abono");
    var xhr_enviar = new XMLHttpRequest;

    xhr_enviar.open('POST', "funciones.php?v=1");

    xhr_enviar.addEventListener('load', (info) => {
        var resultado_enviar = new String;
        resultado_enviar = info.target.response;
        alert(resultado_enviar);
    })
    xhr_enviar.send(new FormData(form_abono));
    //setTimeout(function(){
      //  location.href = "http://pdc.arcadesamuel.cl/arriendos.php";
    //},3000);
}
