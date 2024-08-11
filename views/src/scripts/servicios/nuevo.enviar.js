function enviarDatos(event) {
  event.preventDefault();
  if (!validarDatos()) return;

  const datos = {
    descuento: descuentoPorcentaje,
    subtotal: subtotalValor,
    metodoPago: metodoPago.value,
    fechaPago: fechaPago.value,
    servicios: []
  };

  const servicioContainer = document.querySelectorAll("details");
  servicioContainer.forEach((servicio) => {
    const selectEmpleados = document.querySelectorAll("details")[0].querySelectorAll("select[name=idEmpleado]");
    const empleados = Array.from(selectEmpleados).map(empleado => empleado.value);

    const servicioData = {
      idPaciente: servicio.querySelector("select[name=idPaciente]").value,
      idEmpleado: empleados,
      diagnostico: servicio.querySelector("input[name=diagnostico]").value,
      tratamiento: servicio.querySelector("input[name=tratamiento]").value,
      tipoServicio: servicio.querySelector("select[name=tipoServicio]").value,
      fechaIngreso: servicio.querySelector("input[name=fechaIngreso]").value,
      fechaSalida: servicio.querySelector("input[name=fechaSalida]").value,
      estatus: "COMPLETADO",
    };
    datos.servicios.push(servicioData);
  });

  fetch("/controllers/servicios/nuevo/", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(datos),
    credentials: "same-origin",
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.error) return showErrorToast(data.error);
      window.location.replace(`/servicios/nuevo/?error=${data.message}.`);
    })
    .catch((err) => {
      showErrorToast("Ocurrió un error al registrar el servicio.");
    });
}