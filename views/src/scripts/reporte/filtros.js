function filtroServicios() {
  const fechaInicio = document.getElementById('fechaInicio')?.value;
  const fechaFin = document.getElementById('fechaFin')?.value;

  if (!validaciones.date(fechaInicio) || !validaciones.date(fechaFin)) {
    return showErrorToast('Las fechas no son válidas.');
  }

  window.location.replace("/reporte/servicios/?fechaInicio=" + fechaInicio + "&fechaFin=" + fechaFin);
}