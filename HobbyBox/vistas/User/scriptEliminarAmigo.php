<script>
$(document).ready(function() {
    $('.eliminar-btn').click(function() {
        var amigoID = $(this).data('amigo-id');
        
        if (confirm("¿Estás seguro de que quieres dejar de seguir a este amigo?")) {
            var btn = $(this); // Guardamos una referencia al botón
            
            $.ajax({
                url: 'eliminarAmigo.php',
                type: 'POST',
                data: { amigoID: amigoID },
                success: function(response) {
                    // Eliminar el elemento del amigo eliminado
                    btn.closest('.list-group-item').remove();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});


</script>


