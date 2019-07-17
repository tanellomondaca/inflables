$(document).ready(function () {
    $('#tabla_juegos').DataTable();
});

//Calcula el total de los juegos seleccionados segun sea empresa o persona
function juegosSel() {
    $(".juego input").each(function () {
        if ($(this).prop('checked') == true) {
            id_juegos[cantidad_juegos] = $(this).data("id");

            total_persona += $(this).data("valor");
            total_empresa += $(this).data("empresa");

            cantidad_juegos++;
        }
    })

    //$("#lista_juegos li").remove();
    //$("#lista_juegos input").remove();

    /*for (i = 0; i < cantidad_juegos; i++) {
        $("#lista_juegos").append(
            $('<input>', {
                'type': 'hidden',
                'name': 'nombre' + i,
                'value': nombre_juegos[i]
            })
        );
        $("#lista_juegos").append(
            $('<input>', {
                'type': 'hidden',
                'name': 'id' + i,
                'value': id_juegos[i]
            })
        );
        $("#lista_juegos").append(
            $('<li>', {
                'html': nombre_juegos[i]
            })
        )
    }*/


    //$("#cant_juegos").val(cantidad_juegos);

    $("#total_persona").text(total_persona);
    $("#total_empresa").text(total_empresa);
}

var cantidad_juegos = 0;
var nombre_juegos = new Array;
var id_juegos = new Array;
var total_persona = 0;
var total_empresa = 0;

$("input").on("click", function () {
    console.log($(this).prop('checked'));
    if ($(this).prop('checked') == true) {
        id_juegos[cantidad_juegos] = $(this).data("id");
        total_persona += parseInt($(this).data("valor"));
        total_empresa += parseInt($(this).data("empresa"));

        cantidad_juegos++;
    } else {
        total_persona -= parseInt($(this).data("valor"));
        total_empresa -= parseInt($(this).data("empresa"));

        cantidad_juegos--;
    }
    $("#total_persona").text(total_persona);
    $("#total_empresa").text(total_empresa);
});

function juegoMarcado(){ 
}