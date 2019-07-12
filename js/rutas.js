 $(function hola() {
     $(".punto").draggable({
        revert: "invalid",
        helper: "clone"
        });
     $(".trabajador").draggable({
        revert: "invalid",
        helper: "clone"
    });

    $("#ruta-chofer").droppable({
        accept: ".trabajador",
        classes: {
            "ui-droppable-active": "ui-state-active",
            "ui-droppable-hover": "ui-state-hover"
        },
        drop: function (event, ui) {
            $(this).append(ui.draggable);
        }
    });

    $("#ruta-pioneta").droppable({
        accept: ".trabajador",
        classes: {
            "ui-droppable-active": "ui-state-active",
            "ui-droppable-hover": "ui-state-hover"
        },
        drop: function (event, ui) {
            $(this).append(ui.draggable);
        }
    });
    
    $("#ruta-arriendos").droppable({
         accept: ".punto",
         classes: {
             "ui-droppable-active": "ui-state-active",
             "ui-droppable-hover": "ui-state-hover"
         },
         drop: function (event, ui) {
            $(this).append(ui.draggable);
         }
    });
 });

function mandarInfo(ruta){
    alert(ruta);
    var puntos = "";

    $("#ruta1 #ruta-arriendos > .punto").each(function(){
        puntos += $(this).attr("id") + " - ";
    })
    alert(puntos);
}

function cargarArriendos(fecha){
    var xhr_arriendos = new XMLHttpRequest;

    xhr_arriendos.open('GET', 'ruta_arriendos.php?fecha=' + fecha);

    xhr_arriendos.addEventListener('load', (info) => {
        var resultado_arriendos = info.target.response;
        document.getElementById("arriendos").innerHTML = resultado_arriendos;
        //$("#arriendos").text(resultado_arriendos);
    })

    xhr_arriendos.send()
    hola();
}

 function fecha(){
     var fecha = document.getElementById("fecha").value;
}