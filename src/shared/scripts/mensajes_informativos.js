// ✅ Función reutilizable para mensajes tipo toast
function showToast(message, color = '#333') {
    let toast = $('#toast');
    if (toast.length === 0) {
        // Si no existe, lo creamos dinámicamente
        toast = $('<div id="toast"></div>').appendTo('body').css({
            position: 'fixed',
            bottom: '20px',
            right: '20px',
            background: color,
            color: '#fff',
            padding: '10px 15px',
            borderRadius: '8px',
            display: 'none',
            zIndex: 9999
        });
    }
    toast.text(message).css('background-color', color).fadeIn(400);
    setTimeout(() => toast.fadeOut(400), 2000);
}


// 📝 Capturar envío de múltiples formularios genéricamente
$(document).on('submit', '.ajax-form', function(e) {
    e.preventDefault();
    var $form = $(this);
    var url = $form.data('url');
    if (!url) return console.error('Falta data-url en el formulario');

    var data = {};
    $form.find('input, select, textarea').each(function() {
        var name = $(this).attr('name');
        if (name) data[name] = $(this).val();
    });

    $.ajax({
        url: url,
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                showToast(response.message, 'green');
                $form[0].reset();
            } else if (response.status === 'exists') {
                showToast(response.message, 'orange');
            } else {
                showToast(response.message || 'Error al guardar', 'red');
            }
        },
        error: function() {
            showToast('Error al procesar el formulario.', 'red');
        }
    });
});
/*function showToast(message, color = '#333') {
    var toast = $('#toast');
    toast.text(message);
    toast.css('background-color', color);
    toast.fadeIn(400);

    setTimeout(function(){
        toast.fadeOut(400);
    }, 2000);
}

$('#formulario').on('submit', function(e) {
    e.preventDefault();

    var $form = $(this);

    // Construir objeto con todos los datos del formulario
    var data = {};
    $form.find('input, select, textarea').each(function() {
        var name = $(this).attr('name');
        if(name) data[name] = $(this).val();
    });

    // Determinar URL según si es nuevo o edición
    var ajaxUrl = Id ? '../../features/c_diagnosticos/backend/guarda_diagnostico.php' : '../../features/c_comorbilidades/backend/guarda_comorbilidad.php';

    $.ajax({
        url: ajaxUrl,
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function(response){
            if(response.status === 'success'){
                showToast(response.message, 'green');
                $form[0].reset();
                // actualizar tabla si quieres
            } else if(response.status === 'exists'){
                showToast(response.message, 'orange');
            } else {
                showToast(response.message || 'Error al guardar', 'red');
            }
        },
        error: function(){
            showToast('Error al procesar el formulario.', 'red');
        }
    });
});*/
