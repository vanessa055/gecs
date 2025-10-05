// Selecciona todos los formularios que quieres validar
const formularios = document.querySelectorAll('.formulario');


// Expresiones generales
const expresiones = {
    Nombre_Diagnostico: /^(?!\d+$)(?=.{3,50}$)(?:[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]{3,}|[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]{2}\s+[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+)(?:\s+[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+)*$/,
    nombreDiagnostico: /^(?!\d+$)(?=.{3,50}$)(?:[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]{3,}|[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]{2}\s+[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+)(?:\s+[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+)*$/,
    Comorbilidad:/^(?!\d+$)(?=.{3,50}$)(?:[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]{3,}|[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]{2}\s+[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+)(?:\s+[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+)*$/,
    comorbilidad:/^(?!\d+$)(?=.{3,50}$)(?:[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]{3,}|[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]{2}\s+[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+)(?:\s+[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+)*$/,
    Departamento:/^(?!\d+$)(?=.{3,50}$)(?:[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]{3,}|[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]{2}\s+[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+)(?:\s+[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+)*$/,
    departamento:/^(?!\d+$)(?=.{3,50}$)(?:[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]{3,}|[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]{2}\s+[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+)(?:\s+[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+)*$/
};

// Función para validar un campo
const validarCampo = (expresion, input, grupo) => {
    if (expresion.test(input.value)) {
        grupo.classList.add('formulario__grupo-correcto');
        grupo.classList.remove('formulario__grupo-incorrecto');
        grupo.querySelector('.formulario__input-error').classList.remove('formulario__input-error-activo');
        return true;
    } else {
        grupo.classList.remove('formulario__grupo-correcto');
        grupo.classList.add('formulario__grupo-incorrecto');
        grupo.querySelector('.formulario__input-error').classList.add('formulario__input-error-activo');
        return false;
    }
};

// Función para validar campos de select
const validarSelect = (input, grupo) => {
    if (["Si", "No", "SI", "NO"].includes(input.value)) {
        grupo.classList.remove('formulario__grupo-incorrecto');
        grupo.classList.add('formulario__grupo-correcto');
        grupo.querySelector('.formulario__input-error').classList.remove('formulario__input-error-activo');
        return true;
    } else {
        grupo.classList.add('formulario__grupo-incorrecto');
        grupo.classList.remove('formulario__grupo-correcto');
        grupo.querySelector('.formulario__input-error').classList.add('formulario__input-error-activo');
        return false;
    }
};

// Recorrer todos los formularios
formularios.forEach(formulario => {

    // Escuchar eventos en tiempo real
    formulario.querySelectorAll('.formulario__grupo').forEach(grupo => {
        const input = grupo.querySelector('input, select');
        if (input) {
            input.addEventListener('input', e => validarFormulario(e, formulario));
            input.addEventListener('blur', e => validarFormulario(e, formulario));
            input.addEventListener('change', e => validarFormulario(e, formulario));
            input.addEventListener('focus', e => validarFormulario(e, formulario, true)); // <- nuevo
        }
    });

    // Validación al enviar
    formulario.addEventListener('submit', e => {
        let todosValidos = true;

        formulario.querySelectorAll('.formulario__grupo').forEach(grupo => {
            const input = grupo.querySelector('input, select');
            if (input) {
                if (input.name === "Nombre_Diagnostico") {
                    if (!validarCampo(expresiones.Nombre_Diagnostico, input, grupo)) todosValidos = false;
                }
                if (["parametro", "parametroDiagnostico", "estadoDiagnostico"].includes(input.name)) {
                    if (!validarSelect(input, grupo)) todosValidos = false;
                }
                if (input.name === "nombreDiagnostico") {
                    if (!validarCampo(expresiones.nombreDiagnostico, input, grupo)) todosValidos = false;
                }
                if (input.name === "Comorbilidad") {
                    if (!validarCampo(expresiones.Comorbilidad, input, grupo)) todosValidos = false;
                }
                if (input.name === "comorbilidad") {
                    if (!validarCampo(expresiones.comorbilidad, input, grupo)) todosValidos = false;
                }
                if (input.name === "Departamento") {
                    if (!validarCampo(expresiones.Departamento, input, grupo)) todosValidos = false;
                }
                if (input.name === "departamento") {
                    if (!validarCampo(expresiones.departamento, input, grupo)) todosValidos = false;
                }
            }
        });

        if (!todosValidos) {
            e.preventDefault();
            alert("Por favor corrija los campos señalados antes de enviar.");
        }
    });

});

// Función que valida un input específico al escribir
function validarFormulario(e, formulario, mostrarError = false) {
    const input = e.target;
    const grupo = input.closest('.formulario__grupo');

    if (!grupo) return;

    const valor = input.value.trim();

    // Validación Nombre
    if (["Nombre_Diagnostico", "nombreDiagnostico","Comorbilidad", "comorbilidad", "Departamento","departamento"].includes(input.name)) {
        // Si es foco y está vacío, mostrar error
        if (mostrarError && valor === "") {
            grupo.classList.add('formulario__grupo-incorrecto');
            grupo.classList.remove('formulario__grupo-correcto');
            grupo.querySelector('.formulario__input-error')?.classList.add('formulario__input-error-activo');
        } else {
            validarCampo(expresiones.Nombre_Diagnostico, {value: valor}, grupo);
        }
    }

    // Validación select
    if (["parametro", "parametroDiagnostico", "estadoDiagnostico"].includes(input.name)) {
        if (mostrarError && valor === "") {
            grupo.classList.add('formulario__grupo-incorrecto');
            grupo.classList.remove('formulario__grupo-correcto');
            grupo.querySelector('.formulario__input-error')?.classList.add('formulario__input-error-activo');
        } else {
            validarSelect(input, grupo);
        }
    
}


}






/*// Selecciona todos los formularios que quieres validar
const formularios = document.querySelectorAll('.formulario');


// Expresiones generales
const expresiones = {
    Nombre_Diagnostico: /^[A-Za-zÁÉÍÓÚáéíóúÑñ]{3,50}(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]{1,50})*$/
};

// Función para validar un campo
const validarCampo = (expresion, input, grupo) => {
    if (expresion.test(input.value)) {
        grupo.classList.add('formulario__grupo-correcto');
        grupo.classList.remove('formulario__grupo-incorrecto');
        grupo.querySelector('.formulario__input-error').classList.remove('formulario__input-error-activo');
        return true;
    } else {
        grupo.classList.remove('formulario__grupo-correcto');
        grupo.classList.add('formulario__grupo-incorrecto');
        grupo.querySelector('.formulario__input-error').classList.add('formulario__input-error-activo');
        return false;
    }
};

// Función para validar campos de select
const validarSelect = (input, grupo) => {
    if (["Si", "No", "SI", "NO"].includes(input.value)) {
        grupo.classList.remove('formulario__grupo-incorrecto');
        grupo.classList.add('formulario__grupo-correcto');
        grupo.querySelector('.formulario__input-error').classList.remove('formulario__input-error-activo');
        return true;
    } else {
        grupo.classList.add('formulario__grupo-incorrecto');
        grupo.classList.remove('formulario__grupo-correcto');
        grupo.querySelector('.formulario__input-error').classList.add('formulario__input-error-activo');
        return false;
    }
};

// Recorrer todos los formularios
formularios.forEach(formulario => {

    // Escuchar eventos en tiempo real
    formulario.querySelectorAll('.formulario__grupo').forEach(grupo => {
        const input = grupo.querySelector('input, select');
        if (input) {
            input.addEventListener('input', e => validarFormulario(e, formulario));
            input.addEventListener('blur', e => validarFormulario(e, formulario));
            input.addEventListener('change', e => validarFormulario(e, formulario));
            input.addEventListener('focus', e => validarFormulario(e, formulario, true)); // <- nuevo
        }
    });

    // Validación al enviar
    formulario.addEventListener('submit', e => {
        let todosValidos = true;

        formulario.querySelectorAll('.formulario__grupo').forEach(grupo => {
            const input = grupo.querySelector('input, select');
            if (input) {
                if (input.name === "Nombre_Diagnostico") {
                    if (!validarCampo(expresiones.Nombre_Diagnostico, input, grupo)) todosValidos = false;
                }
                if (["parametro", "parametroDiagnostico", "estadoDiagnostico"].includes(input.name)) {
                    if (!validarSelect(input, grupo)) todosValidos = false;
                }
            }
        });

        if (!todosValidos) {
            e.preventDefault();
            alert("Por favor corrija los campos señalados antes de enviar.");
        }
    });

});

// Función que valida un input específico al escribir
function validarFormulario(e, formulario, mostrarError = false) {
    const input = e.target;
    const grupo = input.closest('.formulario__grupo');

    if (!grupo) return;

    const valor = input.value.trim();

    // Validación Nombre
    if (["Nombre_Diagnostico", "nombreDiagnostico"].includes(input.name)) {
        // Si es foco y está vacío, mostrar error
        if (mostrarError && valor === "") {
            grupo.classList.add('formulario__grupo-incorrecto');
            grupo.classList.remove('formulario__grupo-correcto');
            grupo.querySelector('.formulario__input-error')?.classList.add('formulario__input-error-activo');
        } else {
            validarCampo(expresiones.Nombre_Diagnostico, {value: valor}, grupo);
        }
    }

    // Validación select
    if (["parametro", "parametroDiagnostico", "estadoDiagnostico"].includes(input.name)) {
        if (mostrarError && valor === "") {
            grupo.classList.add('formulario__grupo-incorrecto');
            grupo.classList.remove('formulario__grupo-correcto');
            grupo.querySelector('.formulario__input-error')?.classList.add('formulario__input-error-activo');
        } else {
            validarSelect(input, grupo);
        }   
}
}*/