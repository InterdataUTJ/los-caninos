const descuento = document.getElementById("descuento");
const subtotal = document.getElementById("subtotal");
const metodoPago = document.getElementById("metodoPago");
const fechaPago = document.getElementById("fechaPago");

fechaPago.addEventListener("input", (e) => {
  if (!validaciones.date(fechaPago.value)) fechaPago.classList.add("is-invalid");
  else fechaPago.classList.remove("is-invalid");
});

function eventosServicios() {
  document.querySelectorAll("details").forEach((servicio) => {
    const diagnostico = servicio.querySelector("input[name=diagnostico]");
    const tratamiento = servicio.querySelector("input[name=tratamiento]");
    const fechaIngreso = servicio.querySelector("input[name=fechaIngreso]");
    const fechaSalida = servicio.querySelector("input[name=fechaSalida]");

    diagnostico.addEventListener("input", (e) => {
      if (diagnostico.value === "") diagnostico.classList.remove("is-invalid");
      else if (!validaciones.longitud(diagnostico.value, 5, 400)) diagnostico.classList.add("is-invalid");
      else diagnostico.classList.remove("is-invalid");
    });

    tratamiento.addEventListener("input", (e) => {
      if (tratamiento.value === "") tratamiento.classList.remove("is-invalid");
      else if (!validaciones.longitud(tratamiento.value, 5, 300)) tratamiento.classList.add("is-invalid");
      else tratamiento.classList.remove("is-invalid");
    });

    fechaSalida.addEventListener("input", (e) => {
      if (!validaciones.date(fechaIngreso.value)) fechaIngreso.classList.add("is-invalid");
      else fechaIngreso.classList.remove("is-invalid");
    });

    fechaSalida.addEventListener("input", (e) => {
      if (!validaciones.date(fechaSalida.value)) fechaSalida.classList.add("is-invalid");
      else fechaSalida.classList.remove("is-invalid");
    });
  });
}


function validarDatos() {
  if (!validaciones.date(fechaPago.value)) {
    showErrorToast("El campo 'Fecha de Pago' debe ser una fecha válida.");
    return false;
  }

  let datosInvalidos = false;

  document.querySelectorAll("details").forEach((servicio) => {
    const diagnostico = servicio.querySelector("input[name=diagnostico]");
    const tratamiento = servicio.querySelector("input[name=tratamiento]");
    const fechaIngreso = servicio.querySelector("input[name=fechaIngreso]");
    const fechaSalida = servicio.querySelector("input[name=fechaSalida]");

    if (!validaciones.longitud(diagnostico.value, 5, 400)) {
      showErrorToast("El campo 'Diagnóstico' debe tener una longitud entre 5 y 400 caracteres.");
      return datosInvalidos = true;
    }

    if (!validaciones.longitud(tratamiento.value, 5, 300)) {
      showErrorToast("El campo 'Tratamiento' debe tener una longitud entre 5 y 300 caracteres.");
      return datosInvalidos = true;
    }

    if (!validaciones.date(fechaIngreso.value)) {
      showErrorToast("El campo 'Fecha de Ingreso' debe ser una fecha válida.");
      return datosInvalidos = true;
    }

    if (!validaciones.date(fechaSalida.value)) {
      showErrorToast("El campo 'Fecha de Salida' debe ser una fecha válida.");
      return datosInvalidos = true;
    }
  });

  return !datosInvalidos;
}