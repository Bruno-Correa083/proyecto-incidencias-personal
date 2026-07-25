<?php
date_default_timezone_set('UTC');
$msg = '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Incidencia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="bg-dark text-white p-3">
    <div class="container d-flex justify-content-between">
        <h1 class="h4">Sistema de Incidencias</h1>
    </div>
</header>

<nav class="bg-light border-bottom">
    <div class="container py-2">
        <a href="index.php" class="me-3">Inicio</a>
        <a href="incidencia.php" class="me-3">Incidencia</a>
        <a href="tecnicos.php" class="me-3">Técnicos</a>
        <a href="dashboard.php">Dashboard</a>
    </div>
</nav>

<main class="container my-4">

    <section class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <div class="card shadow">
                <div class="card-body">

                    <h2 class="text-center mb-4">Registro de Incidencia</h2>

                    <?php if ($msg): ?>
                        <div class="alert alert-info">
                            <?php echo htmlspecialchars($msg); ?>
                        </div>
                    <?php endif; ?>

                    <form id="formIncidencia" action="../controlador/procesarIncidencia.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required
                            value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text" name="apellido" class="form-control" required
                            value="<?php echo htmlspecialchars($_POST['apellido'] ?? ''); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cédula</label>
                            <input type="text" name="cedula" class="form-control"
                                pattern="[0-9]{7,8}" required
                                oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                                value="<?php echo htmlspecialchars($_POST['cedula'] ?? ''); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Laboratorio</label>
                            <select name="laboratorio" class="form-select" required>
                                <option value="">Seleccionar</option>
                                <?php
                                $labs = ["Laboratorio 1","Laboratorio 2","Laboratorio 3","Laboratorio 4","Laboratorio 5","Laboratorio 6"];
                                foreach ($labs as $lab) {
                                    $selected = (($_POST['laboratorio'] ?? '') === $lab) ? 'selected' : '';
                                    echo "<option $selected>$lab</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Problema</label>
                            <select name="tipo" class="form-select" required>
                                <option value="">Seleccionar</option>
                                <?php
                                $tipos = [
                                    "No prende",
                                    "No funcionan los periféricos",
                                    "Error en pantalla",
                                    "Internet no funciona",
                                    "Equipo lento",
                                    "Software no abre",
                                    "Otro"
                                ];
                                foreach ($tipos as $t) {
                                    $selected = (($_POST['tipo'] ?? '') === $t) ? 'selected' : '';
                                    echo "<option $selected>$t</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="4" required></textarea>
                        </div>

                        <?php if (isset($_GET['ok'])): ?>
                            <div class="alert alert-success">
                                Incidencia enviada correctamente
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger">
                                Error al enviar la incidencia
                            </div>
                        <?php endif; ?>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Enviar Incidencia
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </section>

</main>

<footer class="bg-dark text-white text-center p-3 mt-5">
    © 2026 YoAyudo - Plataforma de Gestión y Seguimiento de Solicitudes e Incidencias
</footer>

<script src="js php/validaciones.js"></script>
</body>
</html>