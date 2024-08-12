<button class="btn btn-outline-secondary fw-bold d-flex gap-2 justify-content-center align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mascotas-filters" aria-controls="mascotas-filters">
  <?php require(__DIR__."/../../icons/filter.php"); ?>
  Filtros
</button>

<div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="mascotas-filters" aria-labelledby="mascotas-filtersLabel">
  <div class="offcanvas-header" style="background-color: #fcbc73;">
    <h5 class="offcanvas-title fw-bold" id="mascotas-filtersLabel">Filtros</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>

      <h5 class="fw-bold py-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Sexo</h5>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-mascota-sexo-masculino" 
          <?php if (in_array("M", $_GET["filterSexo"])) echo "checked"; ?>
        >
        <label class="form-check-label" for="filter-mascota-sexo-masculino">Masculino</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-mascota-sexo-femenino" 
          <?php if (in_array("F", $_GET["filterSexo"])) echo "checked"; ?>
        >
        <label class="form-check-label" for="filter-mascota-sexo-femenino">Femenino</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-mascota-sexo-otro" 
          <?php if (in_array("O", $_GET["filterSexo"])) echo "checked"; ?>
        >
        <label class="form-check-label" for="filter-mascota-sexo-otro">Otro</label>
      </div>

      <button class="fw-bold btn btn-success mt-3" onclick="chnageParams();">Aplicar filtros</button>
      <button class="fw-bold btn btn-outline-danger mt-3" onclick="resetFilters();">Reiniciar filtros</button>

    </div>
  </div>
</div>

<script>

  const filters = {

    "filterSexo": {
      "M": "filter-mascota-sexo-masculino",
      "F": "filter-mascota-sexo-femenino",
      "O": "filter-mascota-sexo-otro"
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