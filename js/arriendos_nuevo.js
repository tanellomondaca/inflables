//ESTO ES UNA PRUEBA A VER SI SE SUBE REALMETE

llenarListas();
comunas();
//mostrarJuegos();

var e = 0;

/*============LLenar Resumen del arriendo========================*/
    var total = 0;
    var total_juegos = 0;
    var total_persona = 0;
    var total_empresa = 0;
    var despacho = 0;
    var cobro_adicional = 0;
    var descuento = 0;

    var cantidad_juegos = 0;
    var nombre_juegos = new Array;
    var id_juegos = new Array;
    var stock_juegos = new Array;


    function tiempoArriendo(){
        var fecha = $("#fecha_arriendo").val();
        var fin = $("#fecha_fin").val();
        var horario_inicio = $("#horario_inicio").val();
        var horario_termino = $("#horario_termino").val();

        alert("La fecha del arriendo: "+fecha+". El horario: "+horario_inicio+" - "+horario_termino);
        //Se asigna a el formulario de resumen
        $("#fec_arriendo").val(fecha);
        $("#fin_arriendo").val(fin);

        $("#hora_inicio").val(horario_inicio);

        $("#hora_termino").val(horario_termino);
    }
    
    function envioArriendo(){
        var comuna = $("#comuna_envio").val();
        var costo_despacho = parseInt($('select[id="comuna_envio"] option:selected').data("valor"));
        despacho = parseInt(costo_despacho);
        
        var direccion = $("#direccion_envio").val();
        var telefono = $("#telefono_envio").val();

        var rut = $("#rut_cliente").val();
        var dir_notas = $("#direccion_notas").val();

        $("#rut_arriendo").val(rut);

        var cliente = $('select[id="rut_cliente"] option:selected').text();

        //Se asigna a el formulario de resumen
        $("#dir_notas").val(dir_notas);
        $("#comuna").val(comuna);
        $("#telefono").val(telefono);
        $("#direccion").val(direccion);
        $("#cliente").val(cliente);
        $("#valor_despacho").val(costo_despacho);
       calcularTotal();

    }

    function calcularTotal(){
        total_juegos = parseInt($("#total_juegos").val());
        despacho = parseInt($("#valor_despacho").val());
        cobro_adicional = parseInt($("#cobro_adicional").val());
        descuento = parseInt($("#descuento").val());
        total = total_juegos+despacho+cobro_adicional-descuento;
        
        $("#valor_total").val(total);

        var abono = parseInt( $("#abono").val() );
        var saldo = total-abono;
        
        $("#saldo").val(saldo);
    }

    function totalJuegos(tipo){
        if(tipo == "total_persona"){
            total_juegos = total_persona;
        }else{
            total_juegos = total_empresa;
        }
        $("#total_juegos").val(total_juegos);
        alert("Total de los juegos guardado");
        calcularTotal();
    }

    function guardarArriendo(){
        var form_arriendo =  document.getElementById("form_arriendo");
        var xhr_enviar = new XMLHttpRequest;

        xhr_enviar.open('POST', "arriendos_ingresar.php");

        xhr_enviar.addEventListener('load', (info) => {
            var resultado_enviar = new String;
            resultado_enviar = info.target.response;
            alert(resultado_enviar);
        })
        xhr_enviar.send(new FormData(form_arriendo));
        setTimeout(function () {
            location.href = "http://pdc.arcadesamuel.cl/arriendos.php";
        }, 1000);
    }

    function calcularDescuento(){
        var porcentaje = $("#porcentaje").val();

        descuento = total*(porcentaje/100);
        $("#descuento").val(descuento);
        
        calcularTotal();
    }
    3
    function calcularAdicional() {
        var porc_add = $("#porc_add").val();

        cobro_adicional = total * (porc_add / 100);
        $("#cobro_adicional").val(cobro_adicional);
        console.log(cobro_adicional);

        calcularTotal();
    }
/*===============================================================*/

/*============Funciones para arriendo nuevo======================*/

function mostrarJuegos() {
    //Muestra los juegos disponibles para una fecha seleccionada
    //var fecha = document.getElementById("fecha_arriendo").value;
    var inicio = $("#fecha_inicio").val();
    var termino = $("#fecha_termino").val();
    if(inicio == termino){
        //alert("Mismo dia");
    }else{
        //alert("Mas de un dia!");
    }
    var xhr_juegos = new XMLHttpRequest;
    
    xhr_juegos.open('GET', 'consulta_juegos.php?v=1&fecha=' + inicio + '&fecha_termino='+termino);
    xhr_juegos.addEventListener('load', (info) => {
        var resultado = info.target.response;
        document.getElementById("dataTable").innerHTML = resultado;
    })
    xhr_juegos.send();
}

//Cambiar Fecha seleccionada
function cambiarFecha(tipo){
    var fecha = $("#fecha_arriendo").val(); //Fecha de inicio
    var fin = $("#fecha_fin").val(); //Fecha de termino
    //Verifica que input activo la funcion, si el de inicio o el de termino
    if(tipo == "inicio"){ //Si fue el de inicio,  
        $("#fecha_fin").val(fecha); //se iguala la fecha final a la inicial
        location.href = "arriendos_nuevo.php?fecha=" + fecha; //Y se cargan los juegos para esa fecha
    }else{//Si lo activo el input "fecha termino"
        if(fecha > fin){ //Se verifica que la fecha final no sea anterior a la inicial
            alert("Error: La fecha de termino no puede ser anterior a la de inicio");
            $("#fecha_fin").val(fecha);
        }else{
            location = ("arriendos_nuevo.php?fecha=" + fecha + "&fin=" + fin);
        }    
    }
}
//calcular total juegos con stock al hacer click
function stock(){

}
//Calcula el total de los juegos seleccionados segun sea empresa o persona
$("input.juego").on("click", function () {
    if ($(this).prop('checked') == true) {
        if ($(this).data("stock") == '1') {
            var cantidad = prompt("Inserte cantidad para arrendar:","Ej: 8");
            var id = $(this).data("id");
            stock_juegos[id] = cantidad;

            nombre_juegos[cantidad_juegos] = cantidad+" "+$(this).data("nombre");
            id_juegos[cantidad_juegos] = $(this).data("id");


            total_persona += cantidad*$(this).data("valor");
            total_empresa += cantidad*$(this).data("empresa");

            cantidad_juegos++
        }else{
            
            nombre_juegos[cantidad_juegos] = $(this).data("nombre");
            id_juegos[cantidad_juegos] = $(this).data("id");
            var id = $(this).data("id");
            stock_juegos[id] = 1;

            total_persona += $(this).data("valor");
            total_empresa += $(this).data("empresa");

            cantidad_juegos++;
        }
    }else{
        if ($(this).data("stock") == '1') {
            var id = $(this).data("id");
            var cantidad = stock_juegos[id];

            total_persona -= cantidad*$(this).data("valor");
            total_empresa -= cantidad*$(this).data("empresa");
        }else{
            total_persona -= $(this).data("valor");
            total_empresa -= $(this).data("empresa");
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
                'name': 'id' + i,
                'value': id_juegos[i]
            })
        );
        $("#lista_juegos").append(
            $('<li>', {
                'html': nombre_juegos[i]
            })
        )
    }


    $("#cant_juegos").val(cantidad_juegos);

    $("#total_persona").text(total_persona);
    $("#total_empresa").text(total_empresa);

});

//Cambiar cambiar cosas en el formulario para cliente empresa
function clienteEmpresa() {
    var btn = document.getElementById("btn_cliente");
    if (btn.innerHTML == "Es cliente empresa") {
        document.getElementById("rut").setAttribute("placeholder", "Rut Empresa");
        document.getElementById("nombre").setAttribute("placeholder", "Nombre representante");
        document.getElementById("apellido").setAttribute("placeholder", "Apellido Representante");

        var contenedor = document.createElement("div");
        contenedor.setAttribute("class", "col-lg-6");
        contenedor.setAttribute("id", "div_rs");

        var razon_social = document.createElement("input");
        razon_social.setAttribute("type", "text");
        razon_social.setAttribute("class", "form-control form-control-user");
        razon_social.setAttribute("placeholder", "Razon Social");
        razon_social.setAttribute("name", "razon_social");

        contenedor.appendChild(razon_social);
        document.getElementById("div_cont").appendChild(contenedor);

        e = 1;
        btn.innerHTML = "No es cliente empresa";

    } else {
        var contenedor = document.getElementById("div_rs");
        document.getElementById("div_cont").removeChild(contenedor);

        document.getElementById("rut").setAttribute("placeholder", "Rut");
        document.getElementById("nombre").setAttribute("placeholder", "Nombre");
        document.getElementById("apellido").setAttribute("placeholder", "Apellido");

        e = 0;
        btn.innerHTML = "Es cliente empresa";
    }
}
//Agregar cliente
function agregarCliente() {
    var form_agregar = document.getElementById("form_agregar");

    var rut = document.getElementById("rut").value;
    if (rut == "") {
        alert("Faltan campos por llenar");
    } else {
        var xhr_agregar = new XMLHttpRequest;
        //CAMBIAR PARA INTERNET
        xhr_agregar.open('POST', "clientes_consultar.php?v=2&e=" + e);

        xhr_agregar.addEventListener('load', (info) => {
            var resultado_agregar = new String;
            resultado_agregar = info.target.response;
            alert(resultado_agregar);
            llenarListas();
        })
        xhr_agregar.send(new FormData(form_agregar));
    }

    
}
//LLenar lista de opciones a eliminar y modificar
function llenarListas() {
    var xhr_eliminar = new XMLHttpRequest;
    xhr_eliminar.open('GET', 'clientes_consultar.php?v=4');


    xhr_eliminar.addEventListener('load', (info) => {
        var resultado = new String;
        resultado = info.target.response;
        document.getElementById("rut_cliente").innerHTML = resultado;
    })
    xhr_eliminar.send();
}
//Llenar comunas
function comunas() {
    var xhr_comunas = new XMLHttpRequest;
    xhr_comunas.open('GET', 'clientes_consultar.php?v=3');

    xhr_comunas.addEventListener('load', (info) => {
        var resultado_comunas = info.target.response;
        document.getElementById("comuna").innerHTML = resultado_comunas;
        document.getElementById("comuna_nuevo").innerHTML = resultado_comunas;
    })
    xhr_comunas.send();
}

//
function datosEnvios() {
    var rut = document.getElementById("rut_cliente");
    var xhr = new XMLHttpRequest;
    xhr.open('GET', 'clientes_consultar.php?v=8&rut_cliente=' + rut.value);


    xhr.addEventListener('load', (data) => {
        var contenido = new String;
        contenido = data.target.response;
        document.getElementById("form_datos_envio").innerHTML = contenido;
    })
    xhr.send();
}


