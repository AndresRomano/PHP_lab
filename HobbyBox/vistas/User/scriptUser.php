<script>
  // Obtenemos los enlaces del navbar por su id
  const enlaceBiblioteca = document.getElementById('enlace-bibliotecas');
  const enlaceBuscados = document.getElementById('enlace-buscados');
  const enlaceAmigos = document.getElementById('enlace-amigos');
  

  // Obtenemos los elementos del main por su id
  const seccionBiblioteca = document.getElementById('bibliotecas');
  const seccionBuscados = document.getElementById('buscados');
  const seccionAmigos = document.getElementById('amigos');
  

  // Función para mostrar la sección correspondiente
  function mostrarSeccion(seccion) {
    // Ocultamos todas las secciones del main
    seccionBiblioteca.style.display = 'none';
    seccionBuscados.style.display = 'none';
    seccionAmigos.style.display = 'none';
   

    // Mostramos la sección seleccionada
    seccion.style.display = 'block';
  }

  // Agregamos eventos de clic a los enlaces del navbar
  enlaceBiblioteca.addEventListener('click', function() {
    mostrarSeccion(seccionBiblioteca);
  });
  enlaceBuscados.addEventListener('click', function() {
    mostrarSeccion(seccionBuscados);
  });
  enlaceAmigos.addEventListener('click', function() {
    mostrarSeccion(seccionAmigos);
  });

  // Mostramos la sección inicialmente seleccionada
  mostrarSeccion(seccionAmigos);
</script>