document.getElementById("btnMenu").addEventListener("click", function () {

    const menu = document.querySelector(".NavegaMenu");

    if(menu.style.display === "flex"){

        menu.style.display = "none";

    }else{

        menu.style.display = "flex";

    }

});

/*formulario abierto(solo contactos)*/
document.getElementById("btnAltaUsuario").addEventListener("click", function () {

    document.querySelector(".formularioAltaUsuario").style.display = "block";

});

/*formulario cerrado(solo contactos)*/
document.getElementById("btnCerrarAltaUsuario").addEventListener("click", function () {

    document.querySelector(".formularioAltaUsuario").style.display = "none";

});

const btnGuardarEmpleado = document.getElementById("btnGuardarEmpleado");

if(btnGuardarEmpleado){

    btnGuardarEmpleado.addEventListener("click", function () {

        const nombreIngresado = document.getElementById("nombre").value;

        const apellidoIngresado = document.getElementById("apellido").value;

        const telefonoIngresado = document.getElementById("telefono").value;

        const emailIngresada = document.getElementById("email").value;

        const contrasenaIngresada = document.getElementById("contrasena").value;

        const cargoIngresado = document.getElementById("cargo").value;

        const tipoDeConsulta = document.getElementById("tipoDeConsulta").value;

        const descripcionIngresada = document.getElementById("descripcion").value;

        // Crear objeto empleado
        const formularioGuardado = {

            nombre: nombreIngresado,

            apellido: apellidoIngresado,

            telefono: telefonoIngresado,

            email: emailIngresada,

            contrasena: contrasenaIngresada,

            cargo: cargoIngresado,

            tipoDeConsulta: tipoDeConsulta,

            descripcion: descripcionIngresada

        };

        console.log("Formulario guardado:", formularioGuardado);

        // Cerrar formulario
        console.log(formularioGuardado).style.display = "none";

        const contenedor = document.createElement("div");

        contenedor.classList.add("consultaGuardada");

        // Crear contenido
        contenedor.innerHTML = `

            <h3>Consulta guardada</h3>

            <p><strong>Nombre:</strong> ${formularioGuardado.nombre}</p>

            <p><strong>Apellido:</strong> ${formularioGuardado.apellido}</p>

            <p><strong>Teléfono:</strong> ${formularioGuardado.telefono}</p>

            <p><strong>Email:</strong> ${formularioGuardado.email}</p>

            <p><strong>Cargo:</strong> ${formularioGuardado.cargo}</p>

            <p><strong>Tipo:</strong> ${formularioGuardado.tipoDeConsulta}</p>

            <p><strong>Descripción:</strong> ${formularioGuardado.descripcion}</p>

            <hr>

        `;

        // Agregar al body
        document.body.appendChild(contenedor);

        alert("Formulario guardado correctamente");

    });

}

/* formulario trabajo (solo trabajos) */
const formulario = document.getElementById("formTrabajo");

if(formulario){

    formulario.addEventListener("submit", function(evento){

        // Evita recargar la página
        evento.preventDefault();

        // Obtener valores
        const email = document.getElementById("email").value;

        const sobreVos = document.getElementById("sobreVos").value;

        const archivo = document.getElementById("archivo").files[0];

        const aceptacion = document.getElementById("aceptacion").checked;

        // Verificar checkbox
        if(!aceptacion){

            alert("Debes aceptar ser contactado por la empresa");

            return;

        }

        // Crear objeto postulacion
        const postulacion = {

            email: email,

            sobreVos: sobreVos,

            archivo: archivo ? archivo.name : "Sin archivo",

            aceptacion: aceptacion

        };

        // Mostrar datos
        console.log(postulacion);

        // Mensaje
        alert("CV enviado correctamente");

        // Limpiar formulario
        formulario.reset();

    });

}