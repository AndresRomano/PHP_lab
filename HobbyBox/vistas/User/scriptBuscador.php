<script>
    $(document).ready(function() {
      // Función para realizar la búsqueda de amigos
      function buscarAmigos(searchTerm) {
        // Realizar la solicitud AJAX
        $.ajax({
          type: 'POST',
          url: 'buscarAmigos.php',
          data: { fSearch2: searchTerm },
          dataType: 'json', // Especificar el tipo de datos que esperamos recibir
          success: function(response) {
  // Limpiar el div de amigos antes de mostrar los nuevos resultados
  $('#amigos').empty();

  if (response.results.length > 0) {
    // Si hay resultados, agregar cada amigo al div
    var html = '<div class="row justify-content-between mr-auto">';

    response.results.forEach(function(amigo) {
      html +=
        '<div class="col-6 col-md-3 col-lg-2 mb-4 mr-auto">' +
          '<div class="card h-100" style="width: 10rem; align-items: center; color: white; background-color: rgb(61, 61, 61);">' +
            '<img src="' + amigo.imagen + '" class="card-img-top rounded-circle" alt="Avatar" style="width: 150px; height: 150px;">' +
            '<div class="card-body">' +
              '<h5 class="card-title">' + amigo.nombre + '</h5>' +
              '<button class="btn btn-primary seguir-btn" data-amigo-id="' + amigo.id + '"' + (amigo.siguiendo ? ' disabled' : '') + '>' +
                (amigo.siguiendo ? 'Siguiendo' : 'Seguir') +
              '</button>' +
            '</div>' +
          '</div>' +
        '</div>';
    });

    html += '</div>';

    $('#amigos').html(html);
  } else {
    // Si no hay resultados, mostrar un mensaje
    $('#amigos').html('<p>No se encontraron resultados.</p>');
  }
},
          error: function() {
            alert('Error en la solicitud AJAX');
          }
        });
      }

      // Manejo del evento de envío del formulario de búsqueda
      $('#searchForm').submit(function(event) {
        event.preventDefault(); // Evitar la recarga de la página

        var searchTerm = $(this).find('input[name="fSearch2"]').val(); // Obtener el término de búsqueda

        if (searchTerm.trim() !== '') {
          buscarAmigos(searchTerm); // Realizar la búsqueda de amigos
        } else {
          $('#amigos').html('<p>Ingresaun término de búsqueda válido.</p>');
        }
      });

      // Manejo del evento de clic en el botón "Seguir"
      $('#amigos').on('click', '.seguir-btn', function() {
        var amigoId = $(this).data('amigo-id');

        // Realizar la solicitud AJAX para seguir/dejar de seguir al amigo
        $.ajax({
          type: 'POST',
          url: 'seguir.php',
          data: { friendId: amigoId },
          dataType: 'json',
          success: function(response) {
            if (response.success) {
              // Actualizar el estado del botón y mostrar un mensaje
              var btn = $('.seguir-btn[data-amigo-id="' + amigoId + '"]');
              btn.attr('disabled', response.isFollowing);
              btn.text(response.isFollowing ? 'Siguiendo' : 'Seguir');
              alert(response.message);
            } else {
              alert('Error al seguir al amigo.');
            }
          },
          error: function() {
            alert('Error en la solicitud AJAX');
          }
        });
      });
    });
  </script>