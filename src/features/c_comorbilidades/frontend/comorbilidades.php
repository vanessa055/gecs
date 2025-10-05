<?php
include(__DIR__ . '../../../../../database/conexion.php');
include(__DIR__ . '../../backend/ver_comorbilidades.php');


?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../../src/shared/styles/estructura.css">

  <title>Document</title>
  <script src="../../../shared/jquery/jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../../shared/datatables/datatables.min.css">
  <script type="text/javascript" src="../../../shared/datatables/datatables.min.js"></script>
  <link rel="stylesheet" href="../../c_diagnosticos/frontend/styles/diagnos.css">
</head>

<body>
  <div class="container">
    <div class="header"><?php include(__DIR__ . '../../../../shared/header.php') ?></div>
    <div class="content">

      <h2 class="titulo">Comorbilidades</h2>

      <!-- //////////////////////////////////////////-------Formulario nuevo diagnóstico----/////////////////////////////////////// -->
      <section class="nueva-comorbilidad">
        <div class="header-form">Nueva Comorbilidad</div>
        <form id="formulario" class="formulario" method="POST" action="../backend/guardar_comorbilidad.php">

          <div id="grupo__Nombre_Comorbilidad" class="formulario__grupo">
            <input type="text" name="Comorbilidad" placeholder="Escriba la comorbilidad" minlength="3" maxlength="50" required>
            <p class="formulario__input-error">El diagnóstico debe tener entre 3 y 50 letras y no contener números.</p>
          </div>
          <div class="formulario__grupo">
            <button type="submit" class="btn-guardar">Guardar</button>
          </div>
        </form>

      </section>


      <!-- ///////////////////////////////////////-------Tabla para mostrar diagnósticos----//////////////////////////////////// -->

      <div class="contenedor-tabla">
        <div class="editar" style="margin-bottom:10px;">
          <button id="btnEditar" disabled>Editar</button>
        </div>
        <table id="tabla-comorbilidad" class="display">

          <thead>

            <tr>
              <th>Comorbilidad</th>
              <th>Estado</th>
            </tr>

          </thead>
          <tbody>
            <?php foreach ($diagnosticos as $diag): ?>
              <tr data-id="<?= $diag['Id_Comorbilidad'] ?>"
                data-nombre="<?= htmlspecialchars($diag['Comorbilidad'], ENT_QUOTES) ?>"
                data-estado="<?= $diag['Estado'] ?>">
                <td><?= htmlspecialchars($diag['Comorbilidad']) ?></td>
                <td><?= $diag['Estado'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <script>
        $(document).ready(function() {
          $('#tabla-comorbilidad').DataTable({
            pageLength: 5,
            lengthChange: false,
            language: {
              url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
          });
        });
      </script>

      <!-- //////////////////////////////////////////-------Modal de edición----/////////////////////////////////////// -->

      <div id="modalEdicion" style="display:none;">
        <form id="formEdicion" class="formulario" action="../backend/editar_diagnostico.php" method="POST">
          <div id="mensajeRespuesta" class="mensaje" style="display:none;"></div>

          <h2>Editar Diagnóstico</h2>
          <input type="hidden" id="idComorbilidad" name="idComorbilidad">

          <!-- Grupo: Nombre Diagnóstico -->
          <div class="formulario__grupo" id="grupo__nombreComorbilidad">
            <label for="nombreDiagnostico">Nombre del diagnóstico:</label>
            <input type="text" id="nombreComorbilidad" name="nombreComorbilidad" minlength="3" maxlength="50" require>
            <p class="formulario__input-error">Debe tener entre 3 y 50 letras (solo texto).</p>
          </div>

          <!-- Grupo: Estado -->
          <div  id="grupo__estadoComorbilidad">
            <label for="estadoComorbilidad">Estado:</label>
            <select id="estadoComorbilidad" name="estadComorbilidad">
              <option value="">Seleccione...</option>
              <option value="activo">Activo</option>
              <option value="inactivo">Inactivo</option>
            </select>
            <p class="formulario__input-error">Debe seleccionar un estado válido.</p>
          </div>

          <div class="modal-buttons">
            <button type="submit" class="modalGuardar">Guardar</button>
            <button type="button" id="btnCerrarModal">Cancelar</button>
          </div>
        </form>

      </div>


      <div id="modalEmergente" class="modal">
        <div class="modal-contenido">
          <h2 id="modalTitulo"></h2>
          <p id="modalMensaje"></p>
          <button id="cerrarModal">Aceptar</button>
        </div>
      </div>


    </div>
    <div class="footer"><?php include(__DIR__ . '../../../../shared/footer.php') ?></div>
    <div class="menu"><?php include(__DIR__ . '../../../../shared/menunavegacion.php') ?></div>

  </div>

  <script src='../../c_diagnosticos/frontend/scripts/script.js'></script>
  <script src="../../c_diagnosticos/frontend/scripts/datoexistente_form.js"></script>

</body>

</html>