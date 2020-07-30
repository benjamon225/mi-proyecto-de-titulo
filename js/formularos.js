function Vlogin() {

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (email.length == 0 || password.length == 0) {
        alert("Debes Ingresar tu Email y/o Constraseña");
        return false;
    }

}



function Vempleados() {
    var nombre, apellido, direccion, telefono, rut, estado;
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    direccion = document.getElementById("direccion").value;
    telefono = document.getElementById("telefono").value;
    rut = document.getElementById("rut");
    estado = document.getElementById("estado").selectedIndex;


    if (nombre.length == 0 || apellido.length == 0 || direccion.length == 0 || telefono.length == 0 || rut.length == 0 || estado == 0 || estado == null) {
        alert("Todos los datos solicitados son oblligatorios.")
        return false;
    } else if (!isNaN(nombre)) {
        alert("El nombre ingresado no es válido.");
        return false;
    }
    else if (!isNaN(apellido)) {
        alert("El apellido ingresado no es válido.");
        return false;
    }
    else if (isNaN(telefono)) {
        alert("El teléfono ingresado no es un número.");
        return false;
    }
    else if (telefono.length > 9 && telefono.length < 9) {
        alert("Recuerda que tu teléfono son 9 (Incluye el 9)");
        return false;
    }

}

function Vuser() {
    var nombre, apellido, email, password;
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellidos").value;
    email = document.getElementById("email").value;
    password = document.getElementById("password").value;

    if (nombre.length == 0 || apellido.length == 0 || email.length == 0 || password.length == 0) {
        alert("Todos los datos son obligatorios");
        return false;
    } else if (password.length < 7) {
        alert("La contraseña debe tener al menos 8 dígitos");
        return false;
    }
}

function Vpro() {
    var nombre, direccion, presupesto, tipo, estado;

    nombre = document.getElementById("nombre").value;
    direccion = document.getElementById("direccion").value;
    presupesto = document.getElementById("presupuesto").value;
    tipo = document.getElementById("tipo").selectedIndex;
    estado = document.getElementById("estado").selectedIndex;

    if (nombre.length == 0 || direccion.length == 0 || presupesto.length == 0 || tipo == 0 || tipo == null || estado == 0 || estado == null) {
        alert("Todos los datos son obligatorios");
        return false;
    }
    else if (!isNaN(nombre)) {
        alert("El nombre no es válido");
        return false;
    } else if (nombre.length <= 2) {
        alert("El nombre es muy corto");
        return false;
    }

}
function Vv(){
    var nombre, email, telefono, rut , direccion;

    nombre = document.getElementById("nombre").value;
    email = document.getElementById("email").value;
    telefono = document.getElementById("telefono").value;
    rut = document.getElementById("rut").value;
    direccion = document.getElementById("direccion").value;

    if (nombre.length == 0 || email.length == 0 || telefono.length == 0 || rut.length == 0 || direccion.length == 0 ) {
        alert("Todos los datos son obligatorios.")
        return false;
    }else if (isNaN(telefono)) {
        alert("Número de Teléfono no válido.")
        return false;
    }
}

//<a href="<?= base_url ?>?controller=usuario&action=editar&id=<?= $us->id ?>" class="button button-gestion">Editar</a>


