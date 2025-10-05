function showToast(message, color = '#333') {
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
    var ajaxUrl = '../backend/guardar_diagnostico.php';

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
});
