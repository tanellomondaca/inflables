//Funciones para inicar enseguida
mostrarClientes();
comunas();
llenarListas();
/////////////////

var e = new String;
//Agregar cliente
function agregarCliente() {
    var form_agregar = document.getElementById("form_agregar");

    var rut = document.getElementById("rut").value;
    if (rut == "") {
        alert("Faltan campos por llenar");
    } else {
        var xhr_agregar = new XMLHttpRequest;
        //CAMBIAR PARA INTERNET
        xhr_agregar.open('POST', "clientes_consultar.php?v=2&e="+e);

        xhr_agregar.addEventListener('load', (info) => {
            var resultado_agregar = new String;
            resultado_agregar = info.target.response;
            alert(resultado_agregar);
        })
        xhr_agregar.send(new FormData(form_agregar));
    }
    llenarListas();
    mostrarClientes();

}

//Llenar comunas
function comunas(){
    var xhr_comunas = new XMLHttpRequest;
    xhr_comunas.open('GET','clientes_consultar.php?v=3');

    xhr_comunas.addEventListener('load', (info) => {
        var resultado_comunas = info.target.response;
        document.getElementById("comuna").innerHTML = resultado_comunas;
    })
    xhr_comunas.send();
}

//Mostrar/Actualizar tabla de clientes
function mostrarClientes() {
    var xhr_mostrar = new XMLHttpRequest;
    //CAMBIAR PARA INTERNET

    xhr_mostrar.open('GET', 'clientes_consultar.php?v=1');

    xhr_mostrar.addEventListener('load', (info) => {
        var resultado_mostrar = new String;
        resultado_mostrar = info.target.response;
        document.getElementById("dataTable").innerHTML = resultado_mostrar;
    })
    xhr_mostrar.send();
}

//Cambiar cambiar cosas en el formulario para cliente empresa
function clienteEmpresa(){
    var btn = document.getElementById("btn_cliente");
    if(btn.innerHTML == "Es cliente empresa"){
        document.getElementById("rut").setAttribute("placeholder","Rut Empresa");
        document.getElementById("nombre").setAttribute("placeholder", "Nombre representante");
        document.getElementById("apellido").setAttribute("placeholder", "Apellido Representante");

        var contenedor = document.createElement("div");
        contenedor.setAttribute("class","col-lg-6");
        contenedor.setAttribute("id","div_rs");

        var razon_social = document.createElement("input");
        razon_social.setAttribute("type","text" );
        razon_social.setAttribute("class","form-control form-control-user");
        razon_social.setAttribute("placeholder","Razon Social");
        razon_social.setAttribute("name","razon_social");

        contenedor.appendChild(razon_social);
        document.getElementById("div_cont").appendChild(contenedor);

        e = 1;
        btn.innerHTML = "No es cliente empresa";
        
    } else{
        var contenedor = document.getElementById("div_rs");
        document.getElementById("div_cont").removeChild(contenedor);

        document.getElementById("rut").setAttribute("placeholder", "Rut");
        document.getElementById("nombre").setAttribute("placeholder", "Nombre");
        document.getElementById("apellido").setAttribute("placeholder", "Apellido");

        e = 0;
        btn.innerHTML = "Es cliente empresa";
    }
}

//LLenar lista de opciones a eliminar y modificar
function llenarListas() {
    var xhr_eliminar = new XMLHttpRequest;
        xhr_eliminar.open('GET', 'clientes_consultar.php?v=4');


    xhr_eliminar.addEventListener('load', (info) => {
        var resultado = new String;
        resultado = info.target.response;
        document.getElementById("rut_eliminar").innerHTML = resultado;
        document.getElementById("rut_modificar").innerHTML = resultado;
    })
    xhr_eliminar.send();
}

//llena el formulario para modificar cliente
function actualizarCliente() {
    var rut = document.getElementById("rut_modificar");
    var xhr = new XMLHttpRequest;
    xhr.open('GET', 'clientes_consultar.php?v=5&rut_modificar=' + rut.value);
    

    xhr.addEventListener('load', (data) => {
        var contenido = new String;
        contenido = data.target.response;
        document.getElementById("form_modificar").innerHTML = contenido;
    })
    xhr.send();
}

//Guardar datos odificados
function guardarModificacion() {
    var form_modificar = document.getElementById("form_modificar");
    var rut_modificar = document.getElementById("rut_modificar");

    var xhr_agregar = new XMLHttpRequest;

    xhr_agregar.open('POST', "clientes_consultar.php?v=6&rut_modificar=" + rut_modificar.value);

    xhr_agregar.addEventListener('load', (info) => {
        var resultado_modificar = new String;
        resultado_modificar = info.target.response;
        alert(resultado_modificar);
    })
    xhr_agregar.send(new FormData(form_modificar));

    mostrarClientes();
    llenarListas();

}

function eliminarCliente(){
    var rut = document.getElementById("rut_eliminar");
    var xhr = new XMLHttpRequest;
    xhr.open('GET', 'clientes_consultar.php?v=7&rut_eliminar=' + rut.value);


    xhr.addEventListener('load', (data) => {
        alert(data.target.response);
    })
    mostrarClientes();
    llenarListas();
    xhr.send();
}

