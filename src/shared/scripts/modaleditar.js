/**
 * Inicializa un módulo de edición reutilizable para tablas DataTables.
 *
 * @param {Object} config - Configuración del módulo.
 * @param {string} config.tablaSelector - Selector CSS de la tabla (ej. '#tabla-catalogo').
 * @param {string} config.botonEditarSelector - Selector del botón de edición.
 * @param {string} config.modalSelector - Selector del modal de edición.
 * @param {string} config.formSelector - Selector del formulario de edición.
 * @param {string} config.urlEdicion - URL del backend para guardar cambios vía AJAX.
 * @param {Array} [config.campos=[]] - Campos a mapear { nombre: 'idDiagnostico', dataAttr: 'id' }.
 * @param {Function} [config.onSuccess] - Callback después de guardar con éxito.
 */
function inicializarModuloEdicion(config) {
    const {
        tablaSelector,
        botonEditarSelector,
        modalSelector,
        formSelector,
        urlEdicion,
        campos = [],
        onSuccess = null
    } = config;

    const $tabla = $(tablaSelector);
    const $botonEditar = $(botonEditarSelector);
    const $modal = $(modalSelector);
    const $form = $(formSelector);

    const table = $tabla.DataTable();
    let filaSeleccionada = null;

    // ---- 🔸 Toast reutilizable ----
    function showToast(message, color = '#333') {
        let $toast = $('#toast');
        if ($toast.length === 0) {
            $toast = $('<div id="toast"></div>').appendTo('body');
        }
        $toast.text(message);
        $toast.css({
            'background-color': color,
            'color': '#fff',
            'padding': '10px 20px',
            'border-radius': '6px',
            'position': 'fixed',
            'bottom': '20px',
            'right': '20px',
            'display': 'none',
            'z-index': '9999'
        });
        $toast.fadeIn(400);
        setTimeout(() => $toast.fadeOut(400), 3000);
    }

    // ---- 🔸 Selección de fila ----
    $tabla.find('tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $botonEditar.prop('disabled', true);
            filaSeleccionada = null;
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            $botonEditar.prop('disabled', false);

            // Extraer datos de atributos personalizados
            filaSeleccionada = {};
            campos.forEach(campo => {
                filaSeleccionada[campo.dataAttr] = $(this).data(campo.dataAttr);
            });
        }
    });

    // Deseleccionar si se hace clic fuera
    $(document).on('click', function (event) {
        if (
            !$(event.target).closest($tabla).length &&
            !$(event.target).closest($modal).length &&
            !$(event.target).is($botonEditar)
        ) {
            const fila = $tabla.find('tr.selected');
            if (fila.length > 0) {
                fila.removeClass('selected');
                $botonEditar.prop('disabled', true);
                filaSeleccionada = null;
            }
        }
    });

    // ---- 🔸 Abrir modal con datos ----
    $botonEditar.on('click', function () {
        if (filaSeleccionada) {
            campos.forEach(campo => {
                $('#' + campo.nombre).val(filaSeleccionada[campo.dataAttr]);
            });
            $modal.show();
        }
    });

    // ----  Cerrar modal ----
    $modal.find('#btnCerrarModal').on('click', function () {
        $modal.hide();
    });

    // ----  Guardar cambios AJAX ----
    $form.on('submit', function (e) {
        e.preventDefault();

        // Recolectar datos dinámicamente
        const data = {};
        campos.forEach(campo => {
            data[campo.nombre] = $('#' + campo.nombre).val();
        });

        $.ajax({
            url: urlEdicion,
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    $modal.hide();
                    $botonEditar.prop('disabled', true);
                    filaSeleccionada = null;
                    showToast(response.message || 'Guardado correctamente', 'green');

                    if (typeof onSuccess === 'function') {
                        onSuccess(response);
                    } else {
                        table.ajax.reload(null, false);
                    }
                } else if (response.status === 'exists') {
                    showToast(response.message || 'Ya existe este elemento', 'orange');
                } else {
                    showToast(response.message || 'Error al guardar', 'red');
                }
            },
            error: function () {
                showToast('Error al guardar los cambios.', 'red');
            }
        });
    });
}

/*$(document).ready(function () {
    var table = $('#tabla-catalogo').DataTable();
    var filaSeleccionada = null;


    // Contenedor de mensajes
    function showToast(message, color = '#333') {
        var toast = $('#toast');
        toast.text(message);
        toast.css('background-color', color);
        toast.fadeIn(400);

        setTimeout(function () {
            toast.fadeOut(400);
        }, 3000); // dura 3 segundos
    }


    // Selección de fila
    $('#tabla-catalogo tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $('#btnEditar').prop('disabled', true);
            filaSeleccionada = null;
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            $('#btnEditar').prop('disabled', false);

            filaSeleccionada = {
                id: $(this).data('id'),
                nombre: $(this).data('nombre'),
                estado: $(this).data('estado')
            };
        }
        $(document).on('click', function (event) {
            const tabla = $('#tabla-catalogo');
            const botonEditar = $('#btnEditar');
            const modal = $('#modalEdicion');

            // Si el clic fue fuera de la tabla, del botón y del modal
            if (
                !$(event.target).closest(tabla).length &&
                !$(event.target).closest(modal).length &&
                !$(event.target).is(botonEditar)
            ) {
                const fila = tabla.find('tr.selected');
                if (fila.length > 0) {
                    fila.removeClass('selected');
                    botonEditar.prop('disabled', true);
                    filaSeleccionada = null;
                }
            }
        });
    });


    // Abrir modal
    $('#btnEditar').on('click', function () {
        if (filaSeleccionada) {
            $('#idComorbilidad').val(filaSeleccionada.id);
            $('#comorbilidad').val(filaSeleccionada.nombre);
            $('#estado').val(filaSeleccionada.estado);
            $('#modalEdicion').show();
        }
    });


    // Cerrar modal
    $('#btnCerrarModal').on('click', function () {
        $('#modalEdicion').hide();
    });


    // Guardar cambios con AJAX
    $('#formEdicion').on('submit', function (e) {
        e.preventDefault();

        var id = $('#idComorbilidad').val();
        var nombre = $('#comorbilidad').val();
        var estado = $('#estado').val();

        $.ajax({
            url: '../backend/editar_comorbilidad.php',
            method: 'POST',
            data: {
                idComorbilidad: id,
                comorbilidad: nombre,
                estado: estado
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    var fila = table.row('tr.selected');
                    fila.data([nombre,  estado]).draw(false);
                    $('#modalEdicion').hide();
                    $('#btnEditar').prop('disabled', true);
                    filaSeleccionada = null;
                    showToast(response.message, 'green');
                } else if (response.status === 'exists') {
                    showToast(response.message, 'orange');
                } else {
                    showToast(response.message || 'Error al guardar', 'red');
                }
            },
            error: function () {
                showToast('Error al guardar los cambios.', 'red');
            }
        });
    });
});*/