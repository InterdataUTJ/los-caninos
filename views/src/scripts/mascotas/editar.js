const nombre = document.querySelector("input#nombre");
const raza = document.querySelector("input#raza");
const tipoMascota = document.querySelector("input#tipoMascota");
const fechaNac = document.querySelector("input#fechaNac");
const peso = document.querySelector("input#peso");

nombre.addEventListener("input", (e) => {
  if (nombre.value === "") return nombre.classList.remove("is-invalid");
  if (!validaciones.longitud(nombre.value, 3, 50)) nombre.classList.add("is-invalid");
  else nombre.classList.remove("is-invalid");
});

raza.addEventListener("input", (e) => {
  if (raza.value === "") return raza.classList.remove("is-invalid");
  if (!validaciones.longitud(raza.value, 3, 50)) raza.classList.add("is-invalid");
  else raza.classList.remove("is-invalid");
});

tipoMascota.addEventListener("input", (e) => {
  if (tipoMascota.value === "") return tipoMascota.classList.remove("is-invalid");
  if (!validaciones.longitud(tipoMascota.value, 3, 50)) tipoMascota.classList.add("is-invalid");
  else tipoMascota.classList.remove("is-invalid");
});

fechaNac.addEventListener("input", (e) => {
  if (!validaciones.date(fechaNac.value)) fechaNac.classList.add("is-invalid");
  else fechaNac.classList.remove("is-invalid");
});

peso.addEventListener("input", (e) => {
  if (peso.validity.badInput) return peso.classList.add("is-invalid");
  if (peso.value === "") return peso.classList.remove("is-invalid");
  if (!validaciones.numeroMin(peso.value, 0.0001)) peso.classList.add("is-invalid");
  else peso.classList.remove("is-invalid");
});




function enviarDatos(event) {
  if (!validaciones.longitud(nombre.value, 3, 50)) {
    showErrorToast("El campo 'nombre' debe de tener una longitud de entre 3 y 50 caracteres.");
    event.preventDefault();
  }

  if (!validaciones.longitud(raza.value, 3, 50)) {
    showErrorToast("El campo 'raza' debe de tener una longitud de entre 3 y 50 caracteres.");
    event.preventDefault();
  }

  if (!validaciones.longitud(tipoMascota.value, 3, 50)) {
    showErrorToast("El campo 'tipo de mascota' debe de tener una longitud de entre 3 y 50 caracteres.");
    event.preventDefault();
  }

  if (!validaciones.date(fechaNac.value)) {
    showErrorToast("El campo 'Fecha de Nacimiento' debe ser una fecha valida.");
    event.preventDefault();
  }

  if (!validaciones.numeroMin(peso.value, 0)) {
    showErrorToast("El campo 'peso' debe ser un numero mayor a 0.");
    event.preventDefault();
  }
}