document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('dataForm').addEventListener('submit', agregar);
});

function agregar(event) {
    event.preventDefault();

    var id = document.getElementById('validationCustom01').value;
    var usuario = document.getElementById('validationCustom02').value;
    var contraseña = document.getElementById('validationCustom03').value;

    if (!id || !usuario || !contraseña) {
        alert('Todos los campos son obligatorios.');
        return;
    }

    var tableBody = document.querySelector('#tabla tbody');
    var newRow = tableBody.insertRow();
    newRow.innerHTML = `
        <td>${id}</td>
        <td>${usuario}</td>
        <td>${contraseña}</td>
        <td>
            <form method="POST" action="eliminarusuario.php" class="d-inline">
                <input type="hidden" name="id" value="${id}">
                 <a class="btn btn-lg btn-primary" href="eliminarusuario.php" role="button"><h6>Eliminar usuario</h6></a>
            </form>
        </td>
    `;

    document.getElementById('dataForm').reset();
}
