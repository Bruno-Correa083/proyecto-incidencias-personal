<<<<<<< HEAD
document.addEventListener("DOMContentLoaded", () => {

    const btnMenu = document.getElementById("btnMenu");
    const menu = document.getElementById("menu");

    if (btnMenu && menu) {

        btnMenu.addEventListener("click", () => {

            menu.classList.toggle("abierto");

            const abierto = menu.classList.contains("abierto");
            console.log("Clase abierto:", abierto);

            btnMenu.textContent = abierto ? "✖" : "☰";
            btnMenu.setAttribute("aria-expanded", abierto);

        });

        const links = document.querySelectorAll("#menu a");

        links.forEach(link => {

            link.addEventListener("click", () => {

                if (window.innerWidth <= 576) {

                    menu.classList.remove("abierto");
                    btnMenu.textContent = "☰";
                    btnMenu.setAttribute("aria-expanded", "false");

                }

            });

        });
=======
document.getElementById("btnMenu").addEventListener("click", function () {

    const menu = document.querySelector(".NavegaMenu");

    if(menu.style.display === "flex"){

        menu.style.display = "none";

    }else{

        menu.style.display = "flex";
>>>>>>> 7c0461c50ced143774390e558d4f98d33314457e

    }

});

<<<<<<< HEAD
    const btnAltaUsuario = document.getElementById("btnAltaUsuario");
    if (btnAltaUsuario) {
        btnAltaUsuario.addEventListener("click", () => {
            const formulario = document.querySelector(".formularioAltaUsuario");
            if (formulario) {
                formulario.style.display = "block";
            }
        });
    }

    const btnCerrarAltaUsuario = document.getElementById("btnCerrarAltaUsuario");
    if (btnCerrarAltaUsuario) {
        btnCerrarAltaUsuario.addEventListener("click", () => {
            const formulario = document.querySelector(".formularioAltaUsuario");
            if (formulario) {
                formulario.style.display = "none"
            }
        });
    }

    const btnGuardarEmpleado = document.getElementById("btnGuardarEmpleado");
    if (btnGuardarEmpleado) {
        btnGuardarEmpleado.addEventListener("click", () => {
            const formularioGuardado = {
                nombre: document.getElementById("nombre")?.value || "",
                apellido: document.getElementById("apellido")?.value || "",
                cedula: document.getElementById("cedula")?.value || "",
                laboratorio: document.getElementById("laboratorio")?.value || "",
                tipoDeConsulta: document.getElementById("tipoDeConsulta")?.value || "",
                descripcion: document.getElementById("descripcion")?.value || ""
            };
            console.log("Formulario guardado:", formularioGuardado);
            const formulario = document.querySelector(".formularioAltaUsuario");
            if (formulario) {
                formulario.style.display = "none";
            }
            const contenedor = document.createElement("div");
            contenedor.classList.add("consultaGuardada");
            contenedor.innerHTML = `
                <h3>Consulta guardada</h3>
                <p><strong>Nombre:</strong> ${formularioGuardado.nombre}</p>
                <p><strong>Apellido:</strong> ${formularioGuardado.apellido}</p>
                <p><strong>Cédula:</strong> ${formularioGuardado.cedula}</p>
                <p><strong>Laboratorio:</strong> ${formularioGuardado.laboratorio}</p>
                <p><strong>Tipo:</strong> ${formularioGuardado.tipoDeConsulta}</p>
                <p><strong>Descripción:</strong> ${formularioGuardado.descripcion}</p>
                <hr>
            `;
            document.body.appendChild(contenedor);
            alert("Formulario guardado correctamente");
        });
    }
=======
document.getElementById("btnAltaUsuario").addEventListener("click", function () {

    document.querySelector(".formularioAltaUsuario").style.display = "block";

});

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

        const formularioGuardado = {

            nombre: nombreIngresado,

            apellido: apellidoIngresado,

            cedula: cedulaIngresada,

            laboratorio: laboratorioIngresado,

            tipoDeConsulta: tipoDeConsulta,

            descripcion: descripcionIngresada

        };

        console.log("Formulario guardado:", formularioGuardado);

        console.log(formularioGuardado).style.display = "none";

        const contenedor = document.createElement("div");

        contenedor.classList.add("consultaGuardada");

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
>>>>>>> 7c0461c50ced143774390e558d4f98d33314457e
