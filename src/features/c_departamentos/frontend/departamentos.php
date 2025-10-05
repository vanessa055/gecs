<?php
include(__DIR__ . '../../../../../database/conexion.php');
include(__DIR__ . '../../backend/ver_departamento.php');
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
  <link rel="stylesheet" href="../../../shared/styles/catalogos.css">
  <script src="../../../shared/datatables/datatables.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="header"><?php include(__DIR__ . '../../../../shared/header.php') ?></div>
    <div class="content">

      <h2 class="titulo">DEPARTAMENTOS</h2>
      <!-- Formulario nueva comorbilidad -->
      <section class="nuevo-registro">
        <div class="header-form">Nuevo Departamento</div>
        <form id="formulario" class="formulario ajax-form" method="POST" data-url="../backend/guardar_departamento.php">

          <div id="grupo__Departamento" class="formulario__grupo">
            <input type="text" id="Departamento" name="Departamento" placeholder="Ej:Alta Verapaz" minlength="3" maxlength="50" required>
            <p class="formulario__input-error">El departamento debe tener entre 3 y 50 letras y no contener números.</p>
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
        <table id="tabla-catalogo" class="display">

          <thead>

            <tr>
              <th>Comorbilidad</th>
              <th>Estado</th>
            </tr>

          </thead>
          <tbody>
            <?php foreach ($departamentos as $reg): ?>
              <tr data-id="<?= $reg['Id_Departamento'] ?>"
                data-nombre="<?= htmlspecialchars($reg['Departamento'], ENT_QUOTES) ?>"
                data-estado="<?= $reg['Estado'] ?>">
                <td><?= htmlspecialchars($reg['Departamento']) ?></td>
                <td><?= $reg['Estado'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <script>
        $(document).ready(function() {
          $('#tabla-catalogo').DataTable({
            pageLength: 5,
            lengthChange: false,
            language: {
              url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
          });
        });
      </script>

      <div id="modalEdicion" style="display:none;">
        <form id="formEdicion" class="formulario">
          <h2>Editar departamento</h2>
          <input type="hidden" id="idDepartamento" name="idDepartamento">

          <div id="grupo__Departamento" class="formulario__grupo">
            <label>Nombre de departamento:</label>
            <input type="text" id="departamento" name="departamento" minlength="3" maxlength="50" required>
            <p class="formulario__input-error">La departamento debe tener entre 3 y 50 letras y no contener números.</p>
          </div>
          <div id="grupo__Departamento" class="formulario__grupo">
            <label>Estado:</label>
            <select id="estado" name="estado">
              <option value="activo">activo</option>
              <option value="inactivo">inactivo</option>
            </select>
          </div>
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

  <div id="toast" style="display:none; position: fixed; bottom: 20px; right: 20px; 
                        background-color: #333; color: #fff; padding: 15px 20px; 
                        border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.3); 
                        z-index: 9999; font-family: sans-serif;"></div>

  <script src="scripts/editar_departamentos.js"></script>
  <script src="../../../shared/scripts/modaleditar.js"></script>
  <script src="../../../shared/scripts/validacion_ingresos.js"></script>
  <script src="../../../shared/scripts/mensajes_informativos.js"></script>
</body>

</html>