<!DOCTYPE html>
<html lang="es">
<head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="header">
     
        <div class="header-left">
            <img src="images/Universidad.png" alt="Logo" class="logo">
            
        </div>
        <div class="header-center">
            <h3> Eliminar usuarios </h3>
        </div>
        <div class="header-right">
            
            <button type="button" class="btn btn-danger" onclick="goBack('pagina0.html')">Regresar</button>
            <img src="profile.png" alt="Perfil" class="profile-img">
        </div>
    </div>
  


<?php
    $miconexion = new mysqli("localhost", "desarrollador", "", "usuarios");
    if ($miconexion->connect_errno) {
        echo "Fallo al conectar con MySQL";
    }

    // Verificar si se ha enviado un formulario para borrar datos
    if(isset($_POST['id_borrar'])){
        // Obtener el ID del cliente a borrar
        $idBorrar = $_POST['id_borrar'];

        // Eliminar el cliente de la base de datos
        $eliminar = $miconexion->prepare("DELETE FROM colaboradores WHERE id=?");
        $eliminar->bind_param("i", $idBorrar);
        $resultado = $eliminar->execute();

        if($resultado) {
            echo "Cliente eliminado correctamente.";
        } else {
            echo "Error al eliminar el cliente.";
        }

        $eliminar->close();
    }
?>

<form action="" method="POST">
    <label>ID del cliente a borrar:</label><br>
    <input type="text" name="id_borrar"><br>
    <input type="submit" value="Borrar cliente">
</form>
<div class="new-footer">
        <div class="footer-text">
            <p>© 2024 Universidad Tecnológica de Puebla. Todos los derechos reservados.</p>
        </div>
        <div class="footer-social">
            <div class="container"><h6>Siguenos en nuestras redes sociales</h6></div>
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
</html>