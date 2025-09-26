<?php
include(__DIR__ . '../../../../../database/conexion.php');
include(__DIR__ . '../../backend/ver_diagnos.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../shared/styles/estructura.css">
    <link rel="stylesheet" href="../frontend/styles.css/diagnos.css">
    <title>Document</title>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../frontend/styles.css/">

    <!-- jQuery y DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="header"><?php include(__DIR__ . '../../../../shared/header.php') ?></div>
        <div class="content">

            <h2 class="titulo">DIAGNÓSTICOS</h2>

            <!-- Formulario nuevo diagnóstico -->
            <section class="nuevo-diagnostico">
                <div class="header-form">Nuevo Diagnóstico</div>
                <form id="formulario" class="formulario" method="POST" action="../backend/guardar_diagnostico.php">

                    <div id="grupo__Nombre_Diagnostico" class="formulario__grupo">
                        <input type="text" name="Nombre_Diagnostico" placeholder="Escriba el diagnóstico" maxlength="50" required>
                        <p class="formulario__input-error">El diagnóstico debe tener entre 3 y 50 letras y no contener números.</p>
                    </div>

                    <div id="grupo__parametro" class="formulario__grupo">
                        <label for="parametro">¿Necesita parámetros?</label>
                        <select id="parametro" name="parametro" class="formulario__input" required>
                            <option value="No">No</option>
                            <option value="Si">Sí</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-guardar">Guardar</button>
                </form>
                <script src="scripts/validacion_ingresos.js"></script>
            </section>

            <div class="contenedor-tabla">

                <table id="tabla-diagnosticos" class="display">
                    <thead>
                        <tr>
                            <th>Diagnóstico</th>
                            <th>¿Necesita Parámetro?</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($diagnosticos as $d): ?>
                            <tr>
                                <td><?= htmlspecialchars($d['Nombre_Diagnostico']) ?></td>
                                <td><?= htmlspecialchars($d['Necesita_Parametro']) ?></td>
                                <td><?= htmlspecialchars($d['Estado']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <script>
                $(document).ready(function() {
                    $('#tabla-diagnosticos').DataTable({
                        "pageLength": 5, // Muestra 5 registros por página
                        "lengthChange": false, // Oculta el combo para cambiar número de registros
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                        }
                    });
                });
            </script>


        </div>
        <div class="footer"><?php include(__DIR__ . '../../../../shared/footer.php') ?></div>
        <div class="menu"><?php include(__DIR__ . '../../../../shared/menunavegacion.php') ?></div>

    </div>
</body>

</html>