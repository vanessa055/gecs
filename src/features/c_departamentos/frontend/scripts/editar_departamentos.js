$(document).ready(function() {
    inicializarModuloEdicion({
        tablaSelector: '#tabla-catalogo',
        botonEditarSelector: '#btnEditar',
        modalSelector: '#modalEdicion',
        formSelector: '#formEdicion',
        urlEdicion: '../backend/editar_departamento.php',
        campos: [
            { nombre: 'idDepartamento', dataAttr: 'id' },
            { nombre: 'departamento', dataAttr: 'nombre' },
            { nombre: 'estado', dataAttr: 'estado' }
        ],
        onSuccess: function(response) {
            $('#tabla-catalogo').DataTable().ajax.reload(null, false);
        }
    });
});
