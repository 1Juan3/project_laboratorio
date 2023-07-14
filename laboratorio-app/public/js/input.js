function editCell(cell) {
    // Obtener el texto actual del <td>
    var currentValue = cell.innerHTML;

    // Crear un elemento <input> y establecer su valor inicial
    var input = document.createElement("input");
    input.type = "text";
    input.value = currentValue;

    // Reemplazar el <td> con el <input>
    cell.innerHTML = "";
    cell.appendChild(input);

    // Establecer el foco en el <input>
    input.focus();

    // Agregar un evento de escucha para detectar cuando se presiona la tecla "Enter"
    input.addEventListener("keypress", function(e) {
        if (e.key === "Enter") {
            // Obtener el nuevo valor ingresado en el <input>
            var newValue = input.value;

            // Restaurar el <td> con el nuevo valor
            cell.innerHTML = newValue;
        }
    });
}