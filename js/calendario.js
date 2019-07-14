var fecha = new String;
var total_detalle = 0; 

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction','dayGrid', 'timeGrid' ],
        height: 'auto',
        defaultView: 'dayGridWeek',
        eventTextColor: 'white',
        header: {
            left: 'dayGridDay,dayGridWeek,dayGridMonth',
            center: 'title',
            right: 'today prev,next'
        },
        displayEventTime: true,
        displayEventEnd: true,
        events: 'arriendos_eventos.php',
        locale: 'es',
        selectable: true,
        dateClick: function(info) {
            fecha = info.dateStr;
            mostrarEventos(fecha);
        },
        eventClick: function(info) {
            id = info.event.id;
            detalleArriendo(id);
            $('#btn_detalle').click();

        }
    });
    calendar.render();
});

function mostrarEventos(fecha){
    //Esta funcion busca los ventos en la base de datos y los muestra en una tabla
    // debajo del calendario
    var xhr_eventos = new XMLHttpRequest;
    xhr_eventos.open('GET','arriendos_tablaeventos.php?fecha='+fecha);
    xhr_eventos.addEventListener('load',(info) => {
        var resultado = new String;
        resultado  = info.target.response;
        document.getElementById("dataTable").innerHTML = resultado;
    })

    xhr_eventos.send()
}

function detalleArriendo(id){
    var xhr_detalle = new XMLHttpRequest;
    xhr_detalle.open('GET', 'arriendos_detalle.php?id=' + id);
    xhr_detalle.addEventListener('load', (info) => {
        var resultado = new String;
        resultado = info.target.response;
        document.getElementById("form_arriendo").innerHTML = resultado;
            total_detalle = parseInt($("#valor_total").val());
            console.log($("#valor_total").val());
            console.log("total = " + total_detalle);
            
    })
    xhr_detalle.send()
}


function calcularTotal() {

    var cobro_adicional = parseInt($("#cobro_adicional").val());
    var descuento = parseInt($("#descuento").val());
    var total = total_juegos + despacho + cobro_adicional - descuento;

    $("#valor_total").val(total);

    var abono = parseInt($("#abono").val());
    var saldo = total - abono;

    $("#saldo").val(saldo);
}
