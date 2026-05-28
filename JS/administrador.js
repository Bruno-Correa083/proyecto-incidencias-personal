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

        const cedulaIngresada = document.getElementById("cedula").value;

        const laboratorioIngresado = document.getElementById("laboratorio").value;

        const tipoDeConsulta = document.getElementById("tipoDeConsulta").value;

        const descripcionIngresada = document.getElementById("descripcion").value;

        // Crear objeto empleado
        const formularioGuardado = {

            nombre: nombreIngresado,

            apellido: apellidoIngresado,

            cedula: cedulaIngresada,

            laboratorio: laboratorioIngresado,

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

            <p><strong>Cedula:</strong> ${formularioGuardado.cedula}</p>

            <p><strong>Laboratorio:</strong> ${formularioGuardado.laboratorio}</p>

            <p><strong>Tipo:</strong> ${formularioGuardado.tipoDeConsulta}</p>

            <p><strong>Descripción:</strong> ${formularioGuardado.descripcion}</p>

            <hr>

        `;

        document.body.appendChild(contenedor);

        alert("Formulario guardado correctamente");

    });

}