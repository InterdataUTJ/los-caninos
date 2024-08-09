const nombre = document.querySelector("input#nombre");
const apellidoPaterno = document.querySelector("input#apellidoPaterno");
const apellidoMaterno = document.querySelector("input#apellidoMaterno");
const fechaNac = document.querySelector("input#fechaNac");
const salario = document.querySelector("input#salario");

nombre.addEventListener("input", (e) => {
  if (!validaciones.longitud(nombre.value, 3, 50)) nombre.classList.add("is-invalid");
  else nombre.classList.remove("is-invalid");
});

apellidoPaterno.addEventListener("input", (e) => {
  if (!validaciones.longitud(apellidoPaterno.value, 3, 50)) apellidoPaterno.classList.add("is-invalid");
  else apellidoPaterno.classList.remove("is-invalid");
});

apellidoMaterno.addEventListener("input", (e) => {
  if (!apellidoMaterno.value) return apellidoMaterno.classList.remove("is-invalid");
  if (!validaciones.longitud(apellidoMaterno.value, 3, 50)) apellidoMaterno.classList.add("is-invalid");
  else apellidoMaterno.classList.remove("is-invalid");
});

salario.addEventListener("input", (e) => {
  if (!validaciones.numeroMin(salario.value, 0)) salario.classList.add("is-invalid");
  else salario.classList.remove("is-invalid");
});



function enviarDatos(event) {
  if (!validaciones.longitud(nombre.value, 3, 50)) {
    showErrorToast("El campo 'nombre' debe de tener una longitud de entre 3 y 50 caracteres.");
    event.preventDefault();
  }

  if (!validaciones.longitud(apellidoPaterno.value, 3, 50)) {
    showErrorToast("El campo 'Apellido Paterno' debe de tener una longitud de entre 3 y 50 caracteres.");
    event.preventDefault();
  }

  if (apellidoMaterno.value != '' && !validaciones.longitud(apellidoMaterno.value, 3, 50)) {
    showErrorToast("El campo 'Apellido Materno' debe de tener una longitud de entre 3 y 50 caracteres.");
    event.preventDefault();
  }

  if (!validaciones.date(fechaNac.value)) {
    showErrorToast("El campo 'Fecha de Nacimiento' debe ser una fecha valida.");
    event.preventDefault();
  }
}