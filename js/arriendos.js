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

    total = total_detalle + despacho_detalle + cobro_adicional_detalle - descuento_detalle;

    $("#valor_total").val(total);

    var abono = parseInt($("#abono").val());
    var saldo = total - abono;

    $("#saldo").val(saldo);
}

function calcularAdicional() {
    var porc_add = parseInt($("#porc_add").val());

    cobro_adicional_detalle = total_detalle * (porc_add / 100);
    $("#cobro_adicional").val(cobro_adicional_detalle);

    calcular();
}

function calcularDescuento(){
    var porcentaje = parseInt($("#porcentaje").val());

    descuento_detalle = total_detalle * (porcentaje / 100);
    $("#descuento").val(descuento_detalle);

    calcular();
}

function modificarArriendo(){
    var form_arriendo_detalle = document.getElementById("form_arriendo_detalle");
    var xhr_enviar = new XMLHttpRequest;

    xhr_enviar.open('POST', "funciones.php?v=2");

    xhr_enviar.addEventListener('load', (info) => {
        var resultado_enviar = new String;
        resultado_enviar = info.target.response;
        console.log(resultado_enviar);
        alert(resultado_enviar);
    })
    xhr_enviar.send(new FormData(form_arriendo_detalle));
    setTimeout(function () {
        location.href = "http://pdc.arcadesamuel.cl/arriendos.php";
    }, 3000);
}

function modificarJuegos(){
    var cantidad_juegos = 0;
    var id_juegos = new Array;
    var url = ";"

    $(".juego input").each(function () {
        if ($(this).prop('checked') == true) {
            id_juegos[cantidad_juegos] = $(this).data("id");
            url += "&juego" + cantidad_juegos + "=" + $(this).data("id");
            cantidad_juegos++;
        
        }
    })
    alert("funciones.php?cant="+cantidad_juegos+url)
}

$(document).ready(function () {
    $('#tabla_juegos').DataTable();
});