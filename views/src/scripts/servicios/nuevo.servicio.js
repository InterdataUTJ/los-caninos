const SERVICIOS_PRECIO = {
  "CONSULTA": 100, 
  "VACUNA": 250, 
  "DESPARASITACION": 400, 
  "CIRUGIA": 2500, 
  "ESTETICA": 200, 
  "ESTADIA": 5000
};

let numeroServicios = 1;
let descuentoPorcentaje = 0;
let subtotalValor = 1000;
const descuentoInputServicio = document.getElementById("descuento");
const totalInputServicio = document.getElementById("total");
const subtotalInputServicio = document.getElementById("subtotal");


function actualizarDatos() {
  eventosServicios();
  numeroServicios = document.querySelectorAll("details").length;
  if (numeroServicios == 1) descuentoPorcentaje = 0;
  else if (numeroServicios == 2) descuentoPorcentaje = 15;
  else if (numeroServicios >= 3) descuentoPorcentaje = 25;

  subtotalValor = 0;
  serviciosElementos = document.querySelectorAll("select[name=tipoServicio]");
  serviciosElementos.forEach((servicio) => {
    subtotalValor += SERVICIOS_PRECIO[servicio.value];
  });

  descuentoInputServicio.value = `${descuentoPorcentaje}%`;
  subtotalInputServicio.value = `$${subtotalValor} MXN`;
  if (descuentoPorcentaje == 0) totalInputServicio.value = `$${subtotalValor} MXN`;
  else totalInputServicio.value = `$${subtotalValor - (subtotalValor * (descuentoPorcentaje / 100))} MXN`;
}

function parse(html) {
  return new DOMParser().parseFromString(html, "text/html").body.firstElementChild;
}

function Empleado() {
  const id = `${Date.now()}-${Math.floor(Math.random() * 100)}`;
  return parse(`
  <div class="input-group mb-3" id="${id}-empleado-id">
    <select class="form-select" id="idEmpleado" aria-label="idEmpleado" name="idEmpleado">
      ${empleadosHTMLData}
    </select>
    <button class="btn btn-outline-danger" type="button" onclick="document.getElementById('${id}-empleado-id').remove();">
      ${trashHTMLDataIcon}
    </button>
  </div>`);
}

function nuevoEmpleado(empleadoRandId) {
  const contenedor = document.getElementById(`${empleadoRandId}-container-id`);
  const newBoton = document.getElementById(`${empleadoRandId}-nuevo-empleado`);
  contenedor.insertBefore(Empleado(), newBoton);
}

function nuevoServicio() {
  const contenedor = document.querySelector("form");
  const newBoton = document.getElementById("agregar-servicio-btn");
  const servicioRandId = `${Date.now()}-${Math.floor(Math.random() * 100)}`;
  contenedor.insertBefore(Servicio(servicioRandId), newBoton);
  document.getElementById(`${servicioRandId}-servicio-id`).querySelector("input[name=fechaIngreso]").valueAsDate = new Date();
  document.getElementById(`${servicioRandId}-servicio-id`).querySelector("input[name=fechaSalida]").valueAsDate = new Date();
  actualizarDatos();
}

function eliminarServicio(servicioRandId) {
  document.getElementById(`${servicioRandId}-servicio-id`).remove();
  actualizarDatos();
}


function Servicio(servicioRandId) {
  const empleadoRandId = `${servicioRandId}-${Math.floor(Math.random() * 100)}`;

  return parse(`
    <details id='${servicioRandId}-servicio-id' class="mb-4 mx-3 p-3 rounded border nuevo-servicio" style="background-color: #fcfcfc;">
      <summary>
        <span class="fw-bold pb-2 mb-3 d-inline-block w-75" style="border-bottom: 3px solid #fcbc73;">Nuevo servicio</span>
      </summary>

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="idPaciente">Paciente</label>
        <select class="form-select" id="idPaciente" aria-label="idPaciente" name="idPaciente">
          ${mascotasHTMLData}
        </select>
        </div>

      <div data-mdb-input-init class="form-outline mb-3" id="${empleadoRandId}-container-id">
        <label class="form-label fw-bold" for="idEmpleado">Empleados</label>
        <div class="input-group mb-3" id="${empleadoRandId}-empleado-id">
          <select class="form-select" id="idEmpleado" aria-label="idEmpleado" name="idEmpleado">
            ${empleadosHTMLData}
          </select>
          <button class="btn btn-outline-danger" type="button" onclick="document.getElementById('${empleadoRandId}-empleado-id').remove();">
            ${trashHTMLDataIcon}
          </button>
        </div>

        <a id="${empleadoRandId}-nuevo-empleado" onclick="nuevoEmpleado('${empleadoRandId}');" class="fw-bold btn btn-primary w-100 d-flex gap-2 justify-content-center align-items-center">
          ${newHTMLDataIcon}
          Añadir empleado
        </a>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" for="diagnostico">Diagnóstico</label>
        <input type="text" class="form-control" name="diagnostico" id="diagnostico" placeholder="Diagnóstico">
        <div class="form-text invalid-feedback">El diagnóstico debe tener una longitud entre 5 y 400 caracteres.</div>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" for="tratamiento">Tratamiento</label>
        <input type="text" class="form-control" name="tratamiento" id="tratamiento" placeholder="Tratamiento">
        <div class="form-text invalid-feedback">El tratamiento debe tener una longitud entre 5 y 300 caracteres.</div>
      </div>

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="tipoServicio">Tipo de servicio</label>
        <select class="form-select" id="tipoServicio" aria-label="tipoServicio" name="tipoServicio" onchange="actualizarDatos()">
          <option value="CONSULTA">Consulta</option>
          <option value="VACUNA">Vacuna</option>
          <option value="DESPARASITACION">Desparasitación</option>
          <option value="CIRUGIA">Cirugía</option>
          <option value="ESTETICA">Estética</option>
          <option value="ESTADIA">Estadía</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" for="fechaIngreso">Fecha de ingreso</label>
        <input type="date" class="form-control" name="fechaIngreso" id="fechaIngreso">
        <div class="form-text invalid-feedback">La fecha de ingreso debe de ser una fecha valida.</div>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" for="fechaSalida">Fecha de salida</label>
        <input type="date" class="form-control" name="fechaSalida" id="fechaSalida">
        <div class="form-text invalid-feedback">La fecha de salida debe de ser una fecha valida.</div>
      </div>

      <a onclick="eliminarServicio('${servicioRandId}')" class="btn btn-danger fw-bold d-flex w-100 mb-3 justify-content-center align-items-center gap-3">
        ${trashHTMLDataIcon}
        Eliminar servicio
      </a>
    </details>`);
}

actualizarDatos();