document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("formIncidencia");

    form.addEventListener("submit", function (e) {

        let errores = [];

        const nombre = form.nombre.value.trim();
        const apellido = form.apellido.value.trim();
        const cedula = form.cedula.value.trim();
        const laboratorio = form.laboratorio.value;
        const tipo = form.tipo.value;
        const descripcion = form.descripcion.value.trim();

        if (nombre.length < 2) {
            errores.push("El nombre debe tener al menos 2 caracteres.");
        }

        if (apellido.length < 2) {
            errores.push("El apellido debe tener al menos 2 caracteres.");
        }

        if (!/^[0-9]{7,8}$/.test(cedula)) {
            errores.push("La cédula debe tener entre 7 y 8 números.");
        }

        if (laboratorio === "") {
            errores.push("Debes seleccionar un laboratorio.");
        }

        if (tipo === "") {
            errores.push("Debes seleccionar un tipo de problema.");
        }

        if (descripcion.length < 10) {
            errores.push("La descripción debe tener al menos 10 caracteres.");
        }

        if (errores.length > 0) {
            e.preventDefault();

            alert("Errores:\n\n" + errores.join("\n"));
        }

    });

});