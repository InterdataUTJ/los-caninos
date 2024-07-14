const password = document.getElementById("change-currentPassword");
const newPassword = document.getElementById("change-newPassword");
const newPasswordR = document.getElementById("change-newPasswordR");
const changePasswordBtn = document.getElementById("changePassword-btn");

newPassword.addEventListener("input", () => {
    if (!validaciones.longitud(newPassword.value, 8, 25)) newPassword.classList.add("is-invalid");
    else newPassword.classList.remove("is-invalid");
});

newPasswordR.addEventListener("input", () => {
    if (newPasswordR.value != newPassword.value) newPasswordR.classList.add("is-invalid");
    else newPasswordR.classList.remove("is-invalid");
});

changePasswordBtn.addEventListener("click", async () => {
    if (password.value == newPassword.value) return showErrorToast("La nueva contraseña debe de ser diferente a la actual.");

    if (!validaciones.longitud(newPassword.value, 8, 25)) return showErrorToast("La nueva contraseña debe tener una longitud de entre 8 y 25 caracteres alfanumericos.");

    if (newPasswordR.value != newPassword.value) return showErrorToast("Las contraseñas deben de ser iguales.");

    await fetch("/controllers/perfil/editar/", {
        method: "POST",
        mode: 'same-origin',
        credentials: 'include',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },    
        body: new URLSearchParams({ contrasena: password.value, nuevaContrasena: newPassword.value })
      })
        .then(res => res.text())
        .then(data => {
          console.log(data);
          if (data == "Igual") return showErrorToast("Las contraseñas son iguales.");
          if (data == "Exito") return showErrorToast("Contraseña actualizada.");
          showErrorToast("Error al actualizar la contraseña. Verifica que la contraseña actual sea correcta.");
        })
        .catch(err => {
          console.log(err);
          showErrorToast("Error al actualizar la contraseña");
        });

    showErrorToast("Contraseña cambiada con éxito");
    changePasswordModal.hide();
    password.value = "";
    newPassword.value = "";
    newPasswordR.value = "";
});