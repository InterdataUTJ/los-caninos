const fechaNac = document.querySelector("input#fechaNac");
const salario = document.querySelector("input#salario");

salario.addEventListener("input", (e) => {
  if (!validaciones.numeroMin(salario.value, 0)) salario.classList.add("is-invalid");
  else salario.classList.remove("is-invalid");
});



function enviarDatos(event) {
  if (!validaciones.numeroMin(salario.value, 0)) {
    showErrorToast("El campo 'Salario' debe ser un número mayor o igual a 0.");
    event.preventDefault();
  }

  if (!validaciones.date(fechaNac.value)) {
    showErrorToast("El campo 'Fecha de Nacimiento' debe ser una fecha válida.");
    event.preventDefault();
  }
}