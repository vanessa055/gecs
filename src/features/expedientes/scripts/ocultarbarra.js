document.addEventListener('DOMContentLoaded', () => {
  const toggleBtn = document.getElementById('toggle-btn');
  const barraPacientes = document.querySelector('.barra-pacientes');

  // Solo ejecutar si estamos en la página pacientes
  if(toggleBtn && barraPacientes){
    toggleBtn.addEventListener('click', () => {
      barraPacientes.classList.toggle('activa');
    });
  }
});
