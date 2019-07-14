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
    var form_abono = document.getElementById("form_abono");
    var xhr_enviar = new XMLHttpRequest;

    xhr_enviar.open('POST', "funciones.php?v=1");

    xhr_enviar.addEventListener('load', (info) => {
        var resultado_enviar = new String;
        resultado_enviar = info.target.response;
        alert(resultado_enviar);
    })
    xhr_enviar.send(new FormData(form_abono));
    setTimeout(function(){
    location.href = "http://pdc.arcadesamuel.cl/arriendos.php";
    },3000);
}

var total_detalle = 0;
var despacho_detalle = 0;
var cobro_adicional_detalle = 0;
var descuento_detalle = 0;

function calcular(){
    despacho_detalle = parseInt($("#valor_despacho").val());
    cobro_adicional_detalle = parseInt($("#cobro_adicional").val());
    descuento_detalle = parseInt($("#descuento").val());
    total_detalle = parseInt($("#valor_total").val()) + despacho_detalle + cobro_adicional_detalle - descuento_detalle;

    $("#valor_total").val(total_detalle);

    var abono = parseInt($("#abono").val());
    var saldo = total_detalle - abono;

    $("#saldo").val(saldo);
}

function calcularAdicional() {
    var porc_add = $("#porc_add").val();

    cobro_adicional_detalle = total_detalle * (porc_add / 100);
    $("#cobro_adicional").val(cobro_adicional_detalle);

    calcular();
}

function calcularDescuento(){
    var porcentaje = $("#porcentaje").val();

    descuento_detalle = total_detalle * (porcentaje / 100);
    $("#descuento").val(descuento_detalle);

    calcular();
}

function modificarArriendo(){

}