const nombre = document.getElementById("nombre");
const apellidoPaterno = document.getElementById("apellidoPaterno");
const apellidoMaterno = document.getElementById("apellidoMaterno");
const username = document.getElementById("nombreUsuario");
const password = document.getElementById("password");
const rpassword = document.getElementById("rpassword");
const operacion = document.getElementById("operacion");

nombre.addEventListener("input", () => {
    if (!validaciones.longitud(nombre.value, 3, 50)) nombre.classList.add("is-invalid");
    else nombre.classList.remove("is-invalid");
});

apellidoPaterno.addEventListener("input", () => {
    if (!validaciones.longitud(apellidoPaterno.value, 3, 50)) apellidoPaterno.classList.add("is-invalid");
    else apellidoPaterno.classList.remove("is-invalid");
});

apellidoMaterno.addEventListener("input", () => {
    if (apellidoMaterno.value == '') apellidoMaterno.classList.remove("is-invalid");
    else if (!validaciones.longitud(apellidoMaterno.value, 3, 50)) apellidoMaterno.classList.add("is-invalid");
    else apellidoMaterno.classList.remove("is-invalid");
});

username.addEventListener("input", () => {
    if (!validaciones.longitud(username.value, 8, 25)) username.classList.add("is-invalid");
    else username.classList.remove("is-invalid");
});

password.addEventListener("input", () => {
    if (!validaciones.longitud(password.value, 8, 25)) password.classList.add("is-invalid");
    else password.classList.remove("is-invalid");
});

rpassword.addEventListener("input", () => {
    if (rpassword.value != password.value) rpassword.classList.add("is-invalid");
    else rpassword.classList.remove("is-invalid");
});

operacion.addEventListener("input", () => {
    if (operacion.value < 0) operacion.classList.add("is-invalid");
    else operacion.classList.remove("is-invalid");
});