$(document).ready(function() {
    var table = $('#tabla-diagnosticos').DataTable();
    var filaSeleccionada = null;


    // Contenedor de mensajes
    function showToast(message, color = '#333') {
        var toast = $('#toast');
        toast.text(message);
        toast.css('background-color', color);
        toast.fadeIn(400);

        setTimeout(function(){
            toast.fadeOut(400);
        }, 3000); // dura 3 segundos
    }


    // Selección de fila
    $('#tabla-diagnosticos tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $('#btnEditar').prop('disabled', true);
            filaSeleccionada = null;
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            $('#btnEditar').prop('disabled', false);

            filaSeleccionada = {
                id: $(this).data('id'),                 // Id_Diagnostico
                nombre: $(this).data('nombre'),         // Nombre_Diagnostico
                parametro: $(this).data('parametro'),   // Necesita_Parametro
                estado: $(this).data('estado')          // Id_Estado
            };
        }
        $(document).on('click', function (event) {
        const tabla = $('#tabla-diagnosticos');
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
    $('#btnEditar').on('click', function() {
        if(filaSeleccionada){
            $('#idDiagnostico').val(filaSeleccionada.id);
            $('#nombreDiagnostico').val(filaSeleccionada.nombre);
            $('#parametroDiagnostico').val(filaSeleccionada.parametro);
            $('#estadoDiagnostico').val(filaSeleccionada.estado); 
            $('#modalEdicion').show();
        }
    });


    // Cerrar modal
    $('#btnCerrarModal').on('click', function(){
        $('#modalEdicion').hide();
    });


    // Guardar cambios con AJAX
    $('#formEdicion').on('submit', function(e){
        e.preventDefault();

        var id = $('#idDiagnostico').val();
        var nombre = $('#nombreDiagnostico').val();
        var parametro = $('#parametroDiagnostico').val();
        var estado = $('#estadoDiagnostico').val();

        $.ajax({
            url: '../backend/editar_diagnostico.php',
            method: 'POST',
            data: {
                Id_Diagnostico: id,
                Nombre_Diagnostico: nombre,
                Parametro_Diagnostico: parametro,
                Estado: estado
            },
            dataType: 'json',
            success: function(response){
                if(response.status === 'success'){
                    var fila = table.row('tr.selected');
                    fila.data([nombre, parametro, estado]).draw(false);
                    $('#modalEdicion').hide();
                    $('#btnEditar').prop('disabled', true);
                    filaSeleccionada = null;
                    showToast(response.message, 'green');
                } else if(response.status === 'exists'){
                    showToast(response.message, 'orange');
                } else {
                    showToast(response.message || 'Error al guardar', 'red');
                }
            },
            error: function() {
                showToast('Error al guardar los cambios.', 'red');
            }
        });
    });
});