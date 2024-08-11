function Email() {
  const id = `${Date.now()}-${Math.floor(Math.random() * 100)}-email-id`;
  const contenedor = document.createElement("div");
  const input = document.createElement("input");
  const button = document.createElement("button");
  const feedback = document.createElement("div");
  contenedor.setAttribute("class", "input-group mb-3");
  contenedor.setAttribute("id", id);
  input.setAttribute("type", "text");
  input.setAttribute("class", "form-control");
  input.setAttribute("placeholder", "Correo");
  input.setAttribute("name", "email[]");
  input.addEventListener("input", () => {
    if (!validaciones.email(input.value)) input.classList.add("is-invalid");
    else input.classList.remove("is-invalid");
  });
  button.setAttribute("class", "btn btn-outline-danger");
  button.setAttribute("type", "button");
  button.setAttribute("onclick", `removeEmail('${id}');`);
  button.appendChild(Trash());
  feedback.setAttribute("class", "invalid-feedback");
  feedback.innerText = "Email debe de ser un correo válido.";
  contenedor.appendChild(input);
  contenedor.appendChild(button);
  contenedor.appendChild(feedback);
  return contenedor;
}



function nuevoEmail() {
  const contenedor = document.getElementById("container-email");
  const newBoton = document.getElementById("new-email");
  contenedor.insertBefore(Email(), newBoton);
}



function removeEmail(emailId) {
  document.getElementById(emailId).remove();
}