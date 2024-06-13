<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link rel="icon" href="images/Universidad.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
</head>
<body>

<div class="header">
    <div class="header-left">
        <img src="images/Universidad.png" alt="Logo" class="logo">
    </div>
    <div class="header-center">
        <h3> Listado de Usuarios </h3>
    </div>
    <div class="header-right">
        <button type="button" class="btn btn-danger" onclick="goBack()">Regresar</button>
        <img src="profile.png" alt="Perfil" class="profile-img">
    </div>
</div>

<div class="container mt-4">
    <?php
        $miconexion = new mysqli("localhost", "desarrollador", "", "usuarios");
        if ($miconexion->connect_errno) {
            echo "Fallo al conectar con MySQL: " . $miconexion->connect_error;
        }

        $resultado = $miconexion->query("SELECT * FROM colaboradores ORDER BY id ASC");

        echo '<table class="table" id="tabla">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Usuario</th>';
        echo '<th>Contraseña</th>';
        echo '<th>Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Generar las filas de la tabla con los datos de la consulta
        while ($fila = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $fila["Id"] . '</td>';
            echo '<td>' . $fila["Usuario"] . '</td>';
            echo '<td>' . $fila["Contraseña"] . '</td>';
            echo '<td>';
            echo '<button type="button" class="btn btn-warning btn-sm editar-btn">Editar</button>';
            echo '<button type="button" class="btn btn-danger btn-sm eliminar-btn">Eliminar</button>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';

        // Liberar el resultado
        $resultado->free();

        // Cerrar la conexión
        $miconexion->close();
    ?>
</div>

<div class="new-footer">
    <div class="footer-text">
        <p>© 2024 Universidad Tecnológica de Puebla. Todos los derechos reservados.</p>
    </div>
    <div class="footer-social">
        <div class="container"><h6>Síguenos en nuestras redes sociales</h6></div>
        <a href="https://www.facebook.com/OficialUTP" target="_blank">
            <img src="images/facebook.png" alt="Facebook" class="social-icon">
        </a>
        <a href="https://x.com/OficialUTP" target="_blank">
            <img src="images/x (2).png" alt="Twitter" class="social-icon">
        </a>
        <a href="https://www.instagram.com/utpueblaoficial/" target="_blank">
            <img src="images/instagram.png" alt="Instagram" class="social-icon">
        </a>
    </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="conductatablaboton.js" type="text/javascript"></script>
<script>
    // Aquí se debe agregar el código JavaScript para manejar la funcionalidad de editar y eliminar
    $(document).ready(function() {
        // Evento para botón eliminar
        $('.eliminar-btn').click(function() {
            $(this).closest('tr').remove();
        });

        // Evento para botón editar (puedes implementar la lógica necesaria para editar)
        $('.editar-btn').click(function() {
            // Aquí puedes implementar el código para abrir un modal o realizar alguna acción de edición
            alert('Funcionalidad de editar aún no implementada');
        });
    });
</script>

<script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>
