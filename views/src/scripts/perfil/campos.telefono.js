function Trash() {
  const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
  svg.setAttribute("width", "24");
  svg.setAttribute("height", "24");
  svg.setAttribute("viewBox", "0 0 24 24");
  svg.setAttribute("fill", "none");
  svg.setAttribute("stroke", "currentColor");
  svg.setAttribute("stroke-width", "2");
  svg.setAttribute("stroke-linecap", "round");
  svg.setAttribute("stroke-linejoin", "round");
  svg.classList.add("icon", "icon-tabler", "icons-tabler-outline", "icon-tabler-trash");

  // Crea los elementos <path> dentro del <svg>
  const paths = [
    "M4 7l16 0",
    "M10 11l0 6",
    "M14 11l0 6",
    "M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12",
    "M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"
  ];

  paths.forEach(pathData => {
    const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
    path.setAttribute("d", pathData);
    svg.appendChild(path);
  });

  return svg;
}




function Telefono() {
  const id = `${Date.now()}-${Math.floor(Math.random() * 100)}-phone-id`;
  const contenedor = document.createElement("div");
  const input = document.createElement("input");
  const button = document.createElement("button");
  const feedback = document.createElement("div");
  contenedor.setAttribute("class", "input-group mb-3");
  contenedor.setAttribute("id", id);
  input.setAttribute("type", "text");
  input.setAttribute("class", "form-control");
  input.setAttribute("placeholder", "Teléfono");
  input.setAttribute("name", "telefono[]");
  input.addEventListener("input", () => {
    if (!validaciones.telefono(input.value)) input.classList.add("is-invalid");
    else input.classList.remove("is-invalid");
  });
  button.setAttribute("class", "btn btn-outline-danger");
  button.setAttribute("type", "button");
  button.setAttribute("onclick", `removeTelefono('${id}');`);
  button.appendChild(Trash());
  feedback.setAttribute("class", "invalid-feedback");
  feedback.innerText = "Teléfono debe de tener entre 7 y 15 dígitos.";
  contenedor.appendChild(input);
  contenedor.appendChild(button);
  contenedor.appendChild(feedback);
  return contenedor;
}



function nuevoTelefono() {
  const contenedor = document.getElementById("container-phone");
  const newBoton = document.getElementById("new-phone");
  contenedor.insertBefore(Telefono(), newBoton);
}



function removeTelefono(phoneId) {
  document.getElementById(phoneId).remove();
}