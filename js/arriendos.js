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
