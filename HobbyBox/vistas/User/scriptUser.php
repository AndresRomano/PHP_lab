<script>
  // Obtenemos los enlaces del navbar por su id
  const enlaceBuscados = document.getElementById('enlace-buscados');
  const enlaceNovedades = document.getElementById('enlace-novedades');
  const enlaceAmigos = document.getElementById('enlace-amigos');

  // Obtenemos los elementos del main por su id
  const seccionBuscados = document.getElementById('buscados');
  const seccionNovedades = document.getElementById('novedades');
  const seccionAmigos = document.getElementById('amigos');

  // Función para mostrar la sección correspondiente
  function mostrarSeccion(seccion) {
    // Ocultamos todas las secciones del main
    seccionBuscados.style.display = 'none';
    seccionNovedades.style.display = 'none';
    seccionAmigos.style.display = 'none';

    // Mostramos la sección seleccionada
    seccion.style.display = 'block';
  }

  // Agregamos eventos de clic a los enlaces del navbar
  enlaceBuscados.addEventListener('click', function() {
    mostrarSeccion(seccionBuscados);
  });

  enlaceNovedades.addEventListener('click', function() {
    mostrarSeccion(seccionNovedades);
  });

  enlaceAmigos.addEventListener('click', function() {
    mostrarSeccion(seccionAmigos);
  });

  // Mostramos la sección inicialmente seleccionada
  mostrarSeccion(seccionBuscados);
</script>