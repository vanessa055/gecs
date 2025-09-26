
 
const toggleBtn = document.getElementById('toggle-btn');
const barraPrincipal = document.querySelector('.barra-principal');
const barraLateral = document.querySelector('.barra-lateral');

toggleBtn.addEventListener('click', () => {
  barraLateral.classList.toggle('activa');
  barraPrincipal.classList.toggle('oculta');
});

