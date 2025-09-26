const tbody = document.querySelector('#tabla tbody');
let datos = [];

function cargarDatos() {
    fetch('obtener_diagnosticos.php')
        .then(res => res.json())
        .then(data => {
            datos = data;
            mostrarDatos(data);
        });
}

function mostrarDatos(lista) {
    tbody.innerHTML = "";
    lista.forEach(d => {
        tbody.innerHTML += `<tr>
            <td>${d.nombre}</td>
            <td>${d.estado}</td>
        </tr>`;
    });
}

function ordenar(direccion) {
    let ordenados = [...datos];
    ordenados.sort((a, b) => {
        if (direccion === "asc") return a.nombre.localeCompare(b.nombre);
        else return b.nombre.localeCompare(a.nombre);
    });
    mostrarDatos(ordenados);
}

document.getElementById('formulario').addEventListener('submit', e => {
    e.preventDefault();
    const formData = new FormData(e.target);

    fetch('guardar_diagnostico.php', {
        method: 'POST',
        body: formData
    }).then(() => {
        e.target.reset();
        cargarDatos();
    });
});

document.getElementById('buscar').addEventListener('input', e => {
    const filtro = e.target.value.toLowerCase();
    const filtrados = datos.filter(d => d.nombre.toLowerCase().includes(filtro));
    mostrarDatos(filtrados);
});

window.onload = cargarDatos;
