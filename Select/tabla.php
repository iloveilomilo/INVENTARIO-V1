<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edificio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="diseño.css" rel="stylesheet">
</head>
<body>
    <div class="header">
        <div class="header-left">
            <img src="images/Universidad.png" alt="Logo" class="logo">
        </div>
        <div class="header-right">
            <button type="button" class="btn btn-danger" onclick="goBack('pagina0.html')">Regresar</button>
            <img src="profile.png" alt="Perfil" class="profile-img">
        </div>
    </div>
    <div class="select-container">
        <form method="post" action="">
            <select id="lab-select" name="lab-select" class="form-control expanded">
                <option selected disabled>Categorias</option>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "proyecto";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }
                $sql = "SELECT DISTINCT Nombre_inmueble FROM alta_inmueble";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['Nombre_inmueble'] . "'>" . $row['Nombre_inmueble'] . "</option>";
                    }
                }
                $conn->close();
                ?>
            </select>
            <button type="submit" class="btn btn-primary mt-2">Consultar</button>
            <button type="submit" name="reset" value="1" class="btn btn-secondary mt-2">Resetear</button>
        </form>
    </div>
    <div class="container">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
        $selectedLab = isset($_POST['lab-select']) && !isset($_POST['reset']) ? $_POST['lab-select'] : '';
        $sql = "SELECT Id_inmueble, Nombre_inmueble, Descripcion, Fecha_adquisicion, Costo FROM alta_inmueble";
        if (!empty($selectedLab)) {
            $sql .= " WHERE Nombre_inmueble = '$selectedLab'";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table class='table' id='inmuebles-table'>";
            echo "<thead><tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Fecha de Adquisición</th><th>Costo</th></tr></thead>";
            echo "<tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr data-laboratorio='" . $row["Nombre_inmueble"] . "'><td>" . $row["Id_inmueble"]. "</td><td>" . $row["Nombre_inmueble"]. "</td><td>" . $row["Descripcion"]. "</td><td>" . $row["Fecha_adquisicion"]. "</td><td>" . $row["Costo"]. "</td></tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "0 resultados";
        }
        $conn->close();
        ?>
    </div>
    <div class="footer">
        <button type="button" class="btn btn-primary" onclick="goNext('pagina2.html')">Entrar</button>
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
    <script src="navigation.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

