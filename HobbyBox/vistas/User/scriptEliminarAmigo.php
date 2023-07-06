<script>
        // Obtener todos los botones de eliminar
        var eliminarBotones = document.querySelectorAll('.eliminar-btn');

        // Iterar sobre cada botón y agregar el controlador de eventos
        eliminarBotones.forEach(function (boton) {
            boton.addEventListener('click', function () {
                // Obtener el ID del amigo del atributo de datos
                var amigoID = this.getAttribute('data-amigo-id');

                // Realizar la solicitud de eliminación al servidor
                eliminarAmigo(amigoID);
            });
        });

        // Función para enviar la solicitud de eliminación al servidor
        function eliminarAmigo(amigoID) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', './eliminarAmigo.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // La eliminación se realizó correctamente
                    console.log(xhr.responseText);
                    var response = JSON.parse(xhr.responseText);

                    if (response.success) {
                        // Mostrar el mensaje de éxito
                        console.log(response.message);

                        // Actualizar la lista de amigos en la interfaz
                        actualizarListaAmigos(response.amigos);
                    }
                }
            };
            xhr.send('amigo_id=' + amigoID);
        }

        // Función para actualizar la lista de amigos en la interfaz
        function actualizarListaAmigos(listaAmigos) {
            var listaAmigosContainer = document.getElementById('lista-amigos');

            // Limpiar la lista de amigos actual
            listaAmigosContainer.innerHTML = '';

            // Verificar si la lista de amigos está vacía
            if (listaAmigos.length === 0) {
                var mensajeVacio = document.createElement('li');
                mensajeVacio.textContent = 'No hay amigos para mostrar';
                listaAmigosContainer.appendChild(mensajeVacio);
            } else {
                // Iterar sobre la lista de amigos y agregarlos al contenedor
                listaAmigos.forEach(function (amigo) {
                    // Crear un elemento de lista para cada amigo
                    var amigoItem = document.createElement('li');
                    amigoItem.textContent = amigo.idAmigo; // Cambia el campo "nombre" según tus necesidades

                    // Agregar el elemento de lista al contenedor
                    listaAmigosContainer.appendChild(amigoItem);
                });
            }
        }
    </script>


