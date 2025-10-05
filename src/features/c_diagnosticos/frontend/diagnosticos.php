<?php
include(__DIR__ . '../../../../../database/conexion.php');
include(__DIR__ . '../../backend/ver_diagnos.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>
  <script src="../../../shared/jquery/jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" href="../../../shared/datatables/datatables.min.css">
  <link rel="stylesheet" href="../../../shared/styles/estructura.css">
  <link rel="stylesheet" href="../frontend/styles/diagnos.css">
  <script src="../../../shared/datatables/datatables.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="header"><?php include(__DIR__ . '../../../../shared/header.php') ?></div>
    <div class="content">

      <h2 class="titulo">DIAGNÓSTICOS</h2>

      <div id="mensajeExitoGlobal"
        style="display:none; background:#4caf50; color:white; padding:10px; text-align:center; border-radius:4px; margin-bottom:10px;">
      </div>


      <!-- Formulario nuevo diagnóstico -->
      <section class="nuevo-diagnostico">
        <div class="header-form">Nuevo Diagnóstico</div>
        <form id="formulario" class="formulario" method="POST" action="../backend/guardar_diagnostico.php">

          <div id="grupo__Nombre_Diagnostico" class="formulario__grupo">
            <input type="text" id="Nombre_Diagnostico" name="Nombre_Diagnostico" placeholder="Escriba el diagnóstico" minlength="3" maxlength="50" required>
            <p class="formulario__input-error">El diagnóstico debe tener entre 3 y 50 letras y no contener números.</p>
          </div>
          <label for="Parametro_Diagnostico">¿Necesita parámetros?</label>
          <div id="grupo__parametro" class="formulario__grupo">

            <select id="Parametro_Diagnostico" name="Parametro_Diagnostico" class="formulario__input" required>
              <option value="No">No</option>
              <option value="Si">Sí</option>
            </select>
          </div>
          <div class="formulario__grupo">
            <button type="submit" class="btn-guardar">Guardar</button>
          </div>
        </form>

      </section>


      <div class="contenedor-tabla">
        <div style="margin-bottom:10px;">
          <button id="btnEditar" disabled>Editar</button>
        </div>
        <table id="tabla-diagnosticos" class="display">

          <thead>

            <tr>
              <th>Diagnóstico</th>
              <th>¿Necesita Parámetro?</th>
              <th>Estado</th>
            </tr>

          </thead>
          <tbody>
            <?php foreach ($diagnosticos as $diag): ?>
              <tr data-id="<?= $diag['Id_Diagnostico'] ?>"
                data-nombre="<?= htmlspecialchars($diag['Nombre_Diagnostico'], ENT_QUOTES) ?>"
                data-parametro="<?= $diag['Necesita_Parametro'] ?>"
                data-estado="<?= $diag['Estado'] ?>">
                <td><?= htmlspecialchars($diag['Nombre_Diagnostico']) ?></td>
                <td><?= $diag['Necesita_Parametro'] ?></td>
                <td><?= $diag['Estado'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <script>
        $(document).ready(function() {
          $('#tabla-diagnosticos').DataTable({
            pageLength: 5,
            lengthChange: false,
            language: {
              url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
          });
        });
      </script>

      <div id="modalEdicion" style="display:none;">
        <form id="formEdicion">
          <h2>Editar Diagnóstico</h2>
          <input type="hidden" id="idDiagnostico" name="idDiagnostico">

          <label>Nombre del diagnóstico:</label>
          <input type="text" id="nombreDiagnostico" name="nombreDiagnostico" minlength="3" maxlength="50" required>

          <label>Necesita parámetro:</label>
          <select id="parametroDiagnostico" name="parametroDiagnostico">
            <option value="NO">No</option>
            <option value="SI">Sí</option>
          </select>

          <label>Estado:</label>
          <select id="estadoDiagnostico" name="estadoDiagnostico">
            <option value="activo">activo</option>
            <option value="inactivo">inactivo</option>
          </select>

          <div class="modal-buttons">
          <button type="submit" id="modalGuardar">Guardar</button>
          <button type="button" id="btnCerrarModal">Cancelar</button>
          </div>
        </form>
      </div>


    </div>
    <div class="footer"><?php include(__DIR__ . '../../../../shared/footer.php') ?></div>
    <div class="menu"><?php include(__DIR__ . '../../../../shared/menunavegacion.php') ?></div>

  </div>

  <script src='scripts/editar_diagnostico.js'></script>
  <script src="scripts/mensajes_informativos.js"></script>
  <script src="scripts/validacion_ingresos.js"></script>
                        
  <div id="toast" style="display:none; position: fixed; bottom: 20px; right: 20px; 
                        background-color: #333; color: #fff; padding: 15px 20px; 
                        border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.3); 
                        z-index: 9999; font-family: sans-serif;"></div>
</body>

</html>