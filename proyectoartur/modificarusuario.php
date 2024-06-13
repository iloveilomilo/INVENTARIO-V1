<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar usuarios</title>
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
            <h3> Modificación de usuarios </h3>
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

    // Verificar si se ha enviado un formulario para actualizar datos
    if(isset($_POST['id']) && isset($_POST['usuario']) && isset($_POST['contraseña'])){
        // Obtener los valores enviados por el formulario
        $id = $_POST["id"];
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        
        // Actualizar los datos en la base de datos
        $actualizar = $miconexion->prepare("UPDATE colaboradores SET Usuario=?, contraseña=? WHERE id=?");
        $actualizar->bind_param("ssi", $usuario, $contraseña, $id);
        $resultado = $actualizar->execute();

        if($resultado) {
            echo "Datos actualizados correctamente.";
        } else {
            echo "Error al actualizar los datos.";
        }

        $actualizar->close();
    }
    $miconexion->close();
?>

<form action="" method="POST">
    <label>ID del cliente a modificar:</label><br>
    <input type="text" name="id"><br>
    <label>Nuevo usuario:</label><br>
    <input type="text" name="usuario"><br>
    <label>Nueva contraseña</label><br>
    <input type="text" name="contraseña"><br>
    
    <input type="submit" value="Actualizar datos">
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