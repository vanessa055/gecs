
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
