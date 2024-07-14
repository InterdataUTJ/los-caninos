
const username = document.querySelector("input#username");
const usernameBtn = document.querySelector("button#username-btn");
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
  const nombre = document.querySelector("input#nombre");
  const apellidoPaterno = document.querySelector("input#apellidoPaterno");
  const apellidoMaterno = document.querySelector("input#apellidoMaterno");
  const telefono = document.querySelectorAll("input[name='telefono[]']");
  const email = document.querySelectorAll("input[name='email[]']");
  const fechaNac = document.querySelector("input#fechaNac");

  if (!validaciones.longitud(nombre.value, 3, 50)) {
    showErrorToast("El campo 'nombre' debe de tener una longitud de entre 3 y 50 caracteres.");
    event.preventDefault();
  }

  if (!validaciones.longitud(apellidoPaterno.value, 3, 50)) {
    showErrorToast("El campo 'Apellido Paterno' debe de tener una longitud de entre 3 y 50 caracteres.");
    event.preventDefault();
  }

  if (!validaciones.longitud(apellidoMaterno.value, 3, 50)) {
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