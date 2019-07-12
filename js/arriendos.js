function fechaArriendo(){
    var fecha = $("#fecha_arriendo").val();
    //location.replace("arriendos_nuevo.php?fecha="+fecha);
    location.href = "arriendos_nuevo.php?fecha=" + fecha;
}