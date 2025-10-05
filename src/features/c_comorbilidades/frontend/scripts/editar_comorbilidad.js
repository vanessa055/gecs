$(document).ready(function() {
    inicializarModuloEdicion({
        tablaSelector: '#tabla-catalogo',
        botonEditarSelector: '#btnEditar',
        modalSelector: '#modalEdicion',
        formSelector: '#formEdicion',
        urlEdicion: '../backend/editar_comorbilidad.php',
        campos: [
            { nombre: 'idComorbilidad', dataAttr: 'id' },
            { nombre: 'comorbilidad', dataAttr: 'nombre' },
            { nombre: 'estado', dataAttr: 'estado' }
        ],
        onSuccess: function(response) {
            $('#tabla-catalogo').DataTable().ajax.reload(null, false);
        }
    });
});