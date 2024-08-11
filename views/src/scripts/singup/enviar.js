function enviarSingup(event) {
    if (!validaciones.longitud(nombre.value, 3, 50)) {
        event.preventDefault();
        showErrorToast("El campo 'nombre' debe de tener una longitud de entre 3 y 50 caracteres.");
    }

    if (!validaciones.longitud(apellidoPaterno.value, 3, 50)) {
        showErrorToast("El campo 'Apellido Paterno' debe de tener una longitud de entre 3 y 50 caracteres.");
        event.preventDefault();
    }

    if (apellidoMaterno.value != '' && !validaciones.longitud(apellidoMaterno.value, 3, 50)) {
        showErrorToast("El campo 'Apellido Materno' debe de tener una longitud de entre 3 y 50 caracteres.");
        event.preventDefault();
    }

    if (!validaciones.longitud(username.value, 8, 25)) {
        showErrorToast("El nombre de usuario debe de tener una longitud de entre 8 y 25 caracteres.");
        event.preventDefault();
    }

    if (!validaciones.longitud(password.value, 8, 25)) {
        showErrorToast("La contraseña debe de tener una longitud de entre 8 y 25 caracteres.");
        event.preventDefault();
    }

    if (rpassword.value != password.value) {
        showErrorToast("Las contraseñas deben de coincidir.");
        event.preventDefault();
    }
}

document.querySelector("form[action='/controllers/singup/']").addEventListener("submit", enviarSingup);