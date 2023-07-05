<script>
// Función para manejar el cambio de pestaña y ocultar/mostrar las secciones
function cambiarPestana(seccion) {
  // Ocultar todas las secciones del main
  $('.content').hide();

  // Mostrar la sección seleccionada
  seccion.show();

  // Activar la pestaña correspondiente en el navbar
  $('#navbar a').removeClass('active');
  $('#enlace-' + seccion.attr('id')).addClass('active');
}

// Manejo del evento de clic en el enlace del navbar
$('#navbar a').click(function(event) {
  event.preventDefault();

  // Obtener el id de la sección a mostrar
  var seccionId = $(this).attr('href');

  // Ocultar las otras secciones del main
  $('.content').hide();

  // Mostrar la sección correspondiente
  $(seccionId).show();

  // Activar la pestaña correspondiente en el navbar
  $('#navbar a').removeClass('active');
  $(this).addClass('active');
});

$(document).ready(function() {
  // ...

  $('form').submit(function(event) {
    event.preventDefault(); // Evitar la recarga de la página
    var formData = $(this).serialize(); // Obtener los datos del formulario

    // Realizar la solicitud AJAX
    $.ajax({
      type: 'POST',
      url: './buscarAmigos.php',
      data: formData,
      success: function(response) {
        $('#amigos').html(response); // Actualizar el contenido del div "amigos"

        // Ocultar las otras secciones del main
        $('#bibliotecas, #buscados').hide();

        // Cambiar a la pestaña de "amigos" y mostrar la sección correspondiente
        cambiarPestana($('#amigos'));

        // Resto del código de éxito...
      },
      error: function() {
        alert('Error en la solicitud AJAX');
      }
    });
  });

  // ...

  // Al cargar la página, activar la pestaña inicialmente seleccionada en el navbar
  var seccionInicial = $('.content:visible');
  $('#navbar a').removeClass('active');
  $('#enlace-' + seccionInicial.attr('id')).addClass('active');
});

</script>