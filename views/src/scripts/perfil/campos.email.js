function Email() {
  const id = `${Date.now()}-${Math.floor(Math.random() * 100)}-email-id`;
  const contenedor = document.createElement("div");
  const input = document.createElement("input");
  const button = document.createElement("button");
  contenedor.setAttribute("class", "input-group mb-3");
  contenedor.setAttribute("id", id);
  input.setAttribute("type", "text");
  input.setAttribute("class", "form-control");
  input.setAttribute("placeholder", "Correo");
  input.setAttribute("name", "email[]");
  button.setAttribute("class", "btn btn-outline-danger");
  button.setAttribute("type", "button");
  button.setAttribute("onclick", `removeEmail('${id}');`);
  button.appendChild(Trash());
  contenedor.appendChild(input);
  contenedor.appendChild(button);
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