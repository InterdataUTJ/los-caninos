function Trash() {
  return `
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
    <path d="M4 7l16 0"></path>
    <path d="M10 11l0 6"></path>
    <path d="M14 11l0 6"></path>
    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
  </svg>`;
}

function Telefono() {
  const id = `${Date.now()}-${Math.floor(Math.random() * 100)}-phone-id`;
  const contenedor = document.createElement("div");
  contenedor.setAttribute("class", "input-group mb-3");
  contenedor.setAttribute("id", id);
  contenedor.innerHTML = `
    <input type="text" class="form-control" placeholder="Telefono">
    <button class="btn btn-outline-danger" type="button" onclick="removeTelefono('${id}');">
      ${Trash()}
    </button>`;

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