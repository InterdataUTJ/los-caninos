<button class="btn btn-outline-secondary fw-bold d-flex gap-2 justify-content-center align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mascotas-filters" aria-controls="mascotas-filters">
  <?php require(__DIR__ . "/../../icons/filter.php"); ?>
  Filtros
</button>

<div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="mascotas-filters" aria-labelledby="mascotas-filtersLabel">
  <div class="offcanvas-header" style="background-color: #fcbc73;">
    <h5 class="offcanvas-title fw-bold" id="mascotas-filtersLabel">Filtros</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      <h5 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Descuento</h5>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-servicios-descuento-0"
          <?php if (in_array("0", $_GET["filterDescuento"])) echo "checked"; ?>>
        <label class="form-check-label" for="filter-servicios-descuento-0">0%</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-servicios-descuento-15"
          <?php if (in_array("15", $_GET["filterDescuento"])) echo "checked"; ?>>
        <label class="form-check-label" for="filter-servicios-descuento-15">15%</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-servicios-descuento-25"
          <?php if (in_array("25", $_GET["filterDescuento"])) echo "checked"; ?>>
        <label class="form-check-label" for="filter-servicios-descuento-25">25%</label>
      </div>


      <h5 class="fw-bold py-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Estatus</h5>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-servicios-estatus-completado"
          <?php if (in_array("COMPLETADO", $_GET["filterEstatus"])) echo "checked"; ?>>
        <label class="form-check-label" for="filter-servicios-estatus-completado">Completado</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-servicios-estatus-enproceso"
          <?php if (in_array("EN PROCESO", $_GET["filterEstatus"])) echo "checked"; ?>>
        <label class="form-check-label" for="filter-servicios-estatus-enproceso">En Proceso</label>
      </div>


      <h5 class="fw-bold py-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Tipo de Servicio</h5>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-servicios-tipo-consulta"
          <?php if (in_array("CONSULTA", $_GET["filterTipo"])) echo "checked"; ?>>
        <label class="form-check-label" for="filter-servicios-tipo-consulta">Consulta</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-servicios-tipo-vacuna"
          <?php if (in_array("VACUNA", $_GET["filterTipo"])) echo "checked"; ?>>
        <label class="form-check-label" for="filter-servicios-tipo-vacuna">Vacuna</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-servicios-tipo-desparasitacion"
          <?php if (in_array("DESPARASITACION", $_GET["filterTipo"])) echo "checked"; ?>>
        <label class="form-check-label" for="filter-servicios-tipo-desparasitacion">Desparasitacion</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-servicios-tipo-cirugia"
          <?php if (in_array("CIRUGIA", $_GET["filterTipo"])) echo "checked"; ?>>
        <label class="form-check-label" for="filter-servicios-tipo-cirugia">Cirugia</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-servicios-tipo-estetica"
          <?php if (in_array("ESTETICA", $_GET["filterTipo"])) echo "checked"; ?>>
        <label class="form-check-label" for="filter-servicios-tipo-estetica">Estetica</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-servicios-tipo-estadia"
          <?php if (in_array("ESTADIA", $_GET["filterTipo"])) echo "checked"; ?>>
        <label class="form-check-label" for="filter-servicios-tipo-estadia">Estadia</label>
      </div>

      <button class="fw-bold btn btn-success mt-3" onclick="chnageParams();">Aplicar filtros</button>
      <button class="fw-bold btn btn-outline-danger mt-3" onclick="resetFilters();">Reiniciar filtros</button>

    </div>
  </div>
</div>

<script>
  const filters = {
    "filterDescuento": {
      "0": "filter-servicios-descuento-0",
      "15": "filter-servicios-descuento-15",
      "25": "filter-servicios-descuento-25"
    },

    "filterEstatus": {
      "COMPLETADO": "filter-servicios-estatus-completado",
      "EN PROCESO": "filter-servicios-estatus-enproceso"
    },

    "filterTipo": {
      "CONSULTA": 'filter-servicios-tipo-consulta',
      "VACUNA": 'filter-servicios-tipo-vacuna',
      "DESPARASITACION": 'filter-servicios-tipo-desparasitacion',
      "CIRUGIA": 'filter-servicios-tipo-cirugia',
      "ESTETICA": 'filter-servicios-tipo-estetica',
      "ESTADIA": 'filter-servicios-tipo-estadia'
    }
  };

  function resetFilters() {
    const newUrl = new URL(location.href);

    Object.keys(filters).forEach(filter => {
      newUrl.searchParams.delete(filter);
    });

    const offCanvasElement = document.querySelector('#mascotas-filters');
    const offCanvasObject = bootstrap.Offcanvas.getInstance(offCanvasElement);
    offCanvasObject.hide();

    if (newUrl.toString() != window.location.href) window.location.replace(newUrl.toString());
  }

  function chnageParams() {

    const newUrl = new URL(location.href);

    Object.keys(filters).forEach(filter => {

      filter_checked_values = [];

      Object.keys(filters[filter]).forEach(value => {
        const element = document.getElementById(filters[filter][value]);
        if (element.checked) filter_checked_values.push(value);
      });

      newUrl.searchParams.set(filter, filter_checked_values.join(","));
      const filter_length = Object.keys(filters[filter]).length;
      if (filter_checked_values.length == filter_length) newUrl.searchParams.delete(filter);

    });

    const offCanvasElement = document.querySelector('#mascotas-filters');
    const offCanvasObject = bootstrap.Offcanvas.getInstance(offCanvasElement);
    offCanvasObject.hide();

    if (newUrl.toString() != window.location.href) window.location.replace(newUrl.toString());
  }
</script>