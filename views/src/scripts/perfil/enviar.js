const nombre = document.querySelector("input#nombre");
const apellidoPaterno = document.querySelector("input#apellidoPaterno");
const apellidoMaterno = document.querySelector("input#apellidoMaterno");
const telefono = document.querySelectorAll("input[name='telefono[]']");
const email = document.querySelectorAll("input[name='email[]']");
const fechaNac = document.querySelector("input#fechaNac");
const username = document.querySelector("input#username");
const usernameBtn = document.querySelector("button#username-btn");

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
  if (!validaciones.longitudMax(apellidoMaterno.value, 50)) apellidoMaterno.classList.add("is-invalid");
  else apellidoMaterno.classList.remove("is-invalid");
});

telefono.forEach(elemento => {
  elemento.addEventListener("input", () => {
    if (!validaciones.telefono(elemento.value)) elemento.classList.add("is-invalid");
    else elemento.classList.remove("is-invalid");
  });
});

email.forEach(elemento => {
  elemento.addEventListener("input", () => {
    if (!validaciones.email(elemento.value)) elemento.classList.add("is-invalid");
    else elemento.classList.remove("is-invalid");
  });
});

username.addEventListener("input", (e) => {
  if (!validaciones.longitud(username.value, 8, 25)) username.classList.add("is-invalid");
  else username.classList.remove("is-invalid");
});

usernameBtn.addEventListener("click", async () => {
  if (!validaciones.longitud(username.value, 8, 25)) {
    showErrorToast("El campo 'Nombre de usuario' debe de tener una longitud de entre 8 y 25 caracteres.");
    return;
  }

  await fetch("/controllers/perfil/editar/", {
    method: "POST",
    mode: 'same-origin',
    credentials: 'include',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },    
    body: new URLSearchParams({ username: username.value })
  })
    .then(res => res.text())
    .then(data => {
      console.log(data);
      if (data == "Igual") return showErrorToast("El nombre de usuario debe de ser diferente al actual");
      if (data == "Exito") return showErrorToast("Nombre de usuario actualizado");
      showErrorToast("Error al actualizar el nombre de usuario");
    })
    .catch(err => {
      console.log(err);
      showErrorToast("Error al actualizar el nombre de usuario");
    });
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

  telefono.forEach(elemento => {
    if (!validaciones.telefono(elemento.value)) {
      showErrorToast("Los campos 'Telefono' deben de tener una longitud de entre 7 y 15 digitos.");
      event.preventDefault();
    }
  });

  email.forEach(elemento => {
    if (!validaciones.email(elemento.value)) {
      showErrorToast("Los campos 'Email' deben de ser un correo valido.");
      event.preventDefault();
    }
  });

}