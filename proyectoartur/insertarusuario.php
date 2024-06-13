<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uso de tablas</title>
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
            <h3> Creación de usuarios </h3>
        </div>
        <div class="header-right">
            
            <button type="button" class="btn btn-danger" onclick="goBack()">Regresar</button>
            <img src="profile.png" alt="Perfil" class="profile-img">
        </div>
    </div>
  




<?php
$miConexion = new mysqli("localhost","desarrollador","","usuarios");
if($miConexion ->connect_errno)
{
    echo"Fallo al conectar con MySql";
}

$id = $_POST["id"];
$elusuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];

if(!$miConexion->query("INSERT INTO colaboradores VALUES ('$id','$elusuario','$contraseña')"))
{
    echo "Fallo en la creacion de la tabla";
}
if($miConexion) {
    echo "Usuario agregado correctamente";
} else {
    echo "Error al eliminar al agregar usuario.";
}
?>
<div class="col-md-4"> <button type="button" class="btn btn-danger" onclick="goBack()">Regresar</button></div>

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
        <script>
    function goBack() {
        window.history.back();
    }
</script>
</html>