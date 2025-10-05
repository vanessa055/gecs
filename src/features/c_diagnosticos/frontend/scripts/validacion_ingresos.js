// Selecciona todos los formularios que quieres validar
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


}






/*
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input, #formulario select');

const expresiones = {
    Nombre_Diagnostico: /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,50}$/ // entre 3 y 50 caracteres
};

const campos = {
    Nombre_Diagnostico: false,
    parametro: true
};

const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
    }
};

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "Nombre_Diagnostico":
            validarCampo(expresiones.Nombre_Diagnostico, e.target, 'Nombre_Diagnostico');
            break;
        case "parametro":
            if (e.target.value === "Si" || e.target.value === "No") {
                document.getElementById(`grupo__parametro`).classList.remove('formulario__grupo-incorrecto');
                document.getElementById(`grupo__parametro`).classList.add('formulario__grupo-correcto');
                document.querySelector(`#grupo__parametro .formulario__input-error`).classList.remove('formulario__input-error-activo');
                campos['parametro'] = true;
            } else {
                document.getElementById(`grupo__parametro`).classList.add('formulario__grupo-incorrecto');
                document.getElementById(`grupo__parametro`).classList.remove('formulario__grupo-correcto');
                document.querySelector(`#grupo__parametro .formulario__input-error`).classList.add('formulario__input-error-activo');
                campos['parametro'] = false;
            }
            break;
    }
};

inputs.forEach(input => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
    input.addEventListener('change', validarFormulario); // para el select
});

formulario.addEventListener('submit', (e) => {
    const todosValidos = Object.values(campos).every(v => v === true);
    if (!todosValidos) {
        e.preventDefault();
        alert("Por favor corrija los campos señalados antes de enviar.");
    }
});
*/