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
var total_juegos = 0;
var total_detalle = 0;
var despacho_detalle = 0;
var cobro_adicional_detalle = 0;
var descuento_detalle = 0;

function calcular(){
    if ($("#total_juegos").val() == "") {
        alert("Ingrese valor");
    } else {
        total_juegos = parseInt($("#total_juegos").val());
    }
    if ($("#valor_despacho").val()== ""){
        alert("Ingrese valor");    
    }else{
        despacho_detalle = parseInt($("#valor_despacho").val());
    }
    if ($("#cobro_adicional").val() == "") {
        alert("Ingrese valor");
    } else {
        cobro_adicional_detalle = parseInt($("#cobro_adicional").val());
    }
    if ($("#descuento").val() == "") {
        alert("Ingrese valor");
    } else {
        descuento_detalle = parseInt($("#descuento").val());
    }
    console.log("juegos = "+total_juegos);
    console.log("despacho = "+despacho_detalle);
    console.log("adicionl ="+cobro_adicional_detalle);
    console.log("descuento ="+descuento_detalle);
    

    total = total_juegos + despacho_detalle + cobro_adicional_detalle - descuento_detalle;

    console.log("total = "+total);
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
        location.href = "http://pdc.arcadesamuel.cl/arriendos.php";
    })
    xhr_enviar.send(new FormData(form_arriendo_detalle));
}
function modificarDatos() {
    var form_arriendo_detalle = document.getElementById("form_arriendo_detalle");
    var xhr_enviar = new XMLHttpRequest;

    xhr_enviar.open('POST', "funciones.php?v=3");

    xhr_enviar.addEventListener('load', (info) => {
        var resultado_enviar = new String;
        resultado_enviar = info.target.response;
        console.log(resultado_enviar);
        alert(resultado_enviar);
        location.href = "http://pdc.arcadesamuel.cl/arriendos.php";
    })
    xhr_enviar.send(new FormData(form_arriendo_detalle));
}

function modificarJuegos(){
    var id_arriendo = $("#id_arriendo_modificar").val();
    location.href = "arriendos_modjuegos.php?id_arriendo="+id_arriendo;

}


