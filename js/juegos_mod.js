$(document).ready(function () {
    $('#tabla_juegos').DataTable();
    $('#tabla_eliminar').DataTable();
});

//Mandar los juegos a eliminar
function eliminarJuegos(){
        var form_eliminar = document.getElementById("juegos_eliminar");

        var xhr_eliminar = new XMLHttpRequest;

        xhr_eliminar.open('POST', "funciones.php?v=4");
        xhr_eliminar.addEventListener('load', (info) => {
            var resultado_agregar = info.target.response;
            alert(resultado_agregar);
        })
        xhr_eliminar.send(new FormData(form_eliminar));

}

function agregarJuegos() {
    var form_agregar = document.getElementById("juegos_agregar");

    var xhr_agregar = new XMLHttpRequest;

    xhr_agregar.open('POST', "funciones.php?v=5");
    xhr_agregar.addEventListener('load', (info) => {
        var resultado_agregar = info.target.response;
        alert(resultado_agregar);
    })
    xhr_agregar.send(new FormData(form_agregar));

}

//Calcula el total de los juegos seleccionados segun sea empresa o persona
var stock_juegos = new Array;
var id_juegos = new Array;
var cantidad_juegos = 0;
var nombre_juegos = new Array;

$("input.juego").on("click", function () {
    if ($(this).prop('checked') == true) {
        if ($(this).data("stock") == '1') {
            var cantidad = prompt("Inserte cantidad para arrendar:", "Ej: 8");
            var id = $(this).data("id");
            stock_juegos[id] = cantidad;

            nombre_juegos[cantidad_juegos] = cantidad + " " + $(this).data("nombre");
            id_juegos[cantidad_juegos] = $(this).data("id");


            // total_persona += cantidad * $(this).data("valor");
            // total_empresa += cantidad * $(this).data("empresa");

            cantidad_juegos++
        } else {
            stock_juegos[id] = 1;
            nombre_juegos[cantidad_juegos] = $(this).data("nombre");
            id_juegos[cantidad_juegos] = $(this).data("id");


            // total_persona += $(this).data("valor");
            // total_empresa += $(this).data("empresa");

            cantidad_juegos++;
        }
    } else {
        if ($(this).data("stock") == '1') {
            var id = $(this).data("id");
            var cantidad = stock_juegos[id];

            // total_persona -= cantidad * $(this).data("valor");
            // total_empresa -= cantidad * $(this).data("empresa");
        } else {
            // total_persona -= $(this).data("valor");
            // total_empresa -= $(this).data("empresa");
        }
        cantidad_juegos--;
    }

    $("#lista_juegos li").remove();
    $("#lista_juegos input").remove();

    for (i = 0; i < cantidad_juegos; i++) {
        $("#lista_juegos").append(
            $('<input>', {
                'type': 'hidden',
                'name': 'stock' + i,
                'value': stock_juegos[id_juegos[i]]
            })
        );
        $("#lista_juegos").append(
            $('<input>', {
                'type': 'hidden',
                'name': 'juego' + i,
                'value': id_juegos[i]
            })
        );
        $("#lista_juegos").append(
            $('<li>', {
                'html': nombre_juegos[i]
            })
        )
    }


    $("#agregar_cantidad_juegos").val(cantidad_juegos);

    // $("#total_persona").text(total_persona);
    // $("#total_empresa").text(total_empresa);

});

