<button class="btn btn-outline-secondary fw-bold d-flex gap-2 justify-content-center align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#empleados-filters" aria-controls="empleados-filters">
  <?php require(__DIR__."/../../icons/filter.php"); ?>
  Filtros
</button>

<div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="empleados-filters" aria-labelledby="empleados-filtersLabel">
  <div class="offcanvas-header" style="background-color: #fcbc73;">
    <h5 class="offcanvas-title fw-bold" id="empleados-filtersLabel">Filtros</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      <h5 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Rol</h5>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-empleado-rol-gerente" 
          <?php if (in_array("GERENTE", $_GET["filterRol"])) echo "checked"; ?>
        >
        <label class="form-check-label" for="filter-empleado-rol-gerente">Gerente</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-empleado-rol-veterinario" 
          <?php if (in_array("VETERINARIO", $_GET["filterRol"])) echo "checked"; ?>
        >
        <label class="form-check-label" for="filter-empleado-rol-veterinario">Veterinario</label>
      </div>


      <h5 class="fw-bold py-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Estado</h5>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-empleado-estado-activo" 
          <?php if (in_array("ACTIVO", $_GET["filterEstado"])) echo "checked"; ?>
        >
        <label class="form-check-label" for="filter-empleado-estado-activo">Activo</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-empleado-estado-inactivo" 
          <?php if (in_array("INACTIVO", $_GET["filterEstado"])) echo "checked"; ?>
        >
        <label class="form-check-label" for="filter-empleado-estado-inactivo">Inactivo</label>
      </div>


      <h5 class="fw-bold py-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Sexo</h5>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-empleado-sexo-masculino" 
          <?php if (in_array("M", $_GET["filterSexo"])) echo "checked"; ?>
        >
        <label class="form-check-label" for="filter-empleado-sexo-masculino">Masculino</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-empleado-sexo-femenino" 
          <?php if (in_array("F", $_GET["filterSexo"])) echo "checked"; ?>
        >
        <label class="form-check-label" for="filter-empleado-sexo-femenino">Femenino</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="filter-empleado-sexo-otro" 
          <?php if (in_array("O", $_GET["filterSexo"])) echo "checked"; ?>
        >
        <label class="form-check-label" for="filter-empleado-sexo-otro">Otro</label>
      </div>

      <button class="fw-bold btn btn-success mt-3" onclick="chnageParams();">Aplicar filtros</button>
      <button class="fw-bold btn btn-outline-danger mt-3" onclick="resetFilters();">Reiniciar filtros</button>

    </div>
  </div>
</div>

<script>

  const empleado_filter_rol_gerente = document.querySelector("#filter-empleado-rol-gerente");
  const empleado_filter_rol_veterinario = document.querySelector("#filter-empleado-rol-veterinario");
  const empleado_filter_estado_activo = document.querySelector("#filter-empleado-estado-activo");
  const empleado_filter_estado_inactivo = document.querySelector("#filter-empleado-estado-inactivo");
  const empleado_filter_sexo_femenino = document.querySelector("#filter-empleado-sexo-femenino");
  const empleado_filter_sexo_masculino = document.querySelector("#filter-empleado-sexo-masculino");
  const empleado_filter_sexo_otro = document.querySelector("#filter-empleado-sexo-otro");

  function resetFilters() {
    const newUrl = new URL(location.href);
    newUrl.searchParams.delete("filterSexo");
    newUrl.searchParams.delete("filterEstado");
    newUrl.searchParams.delete("filterRol");

    const offCanvasElement = document.querySelector('#empleados-filters');
    const offCanvasObject = bootstrap.Offcanvas.getInstance(offCanvasElement);
    offCanvasObject.hide();

    if (newUrl.toString() != window.location.href) window.location.replace(newUrl.toString());
  }

  function chnageParams() {
    empleado_rol_filter = [];
    if (empleado_filter_rol_gerente.checked) empleado_rol_filter.push("GERENTE");
    if (empleado_filter_rol_veterinario.checked) empleado_rol_filter.push("VETERINARIO");
    
    empleado_estado_filter = [];
    if (empleado_filter_estado_activo.checked) empleado_estado_filter.push("ACTIVO");
    if (empleado_filter_estado_inactivo.checked) empleado_estado_filter.push("INACTIVO");
    
    empleado_sexo_filter = [];
    if (empleado_filter_sexo_masculino.checked) empleado_sexo_filter.push("M");
    if (empleado_filter_sexo_femenino.checked) empleado_sexo_filter.push("F");
    if (empleado_filter_sexo_otro.checked) empleado_sexo_filter.push("O");
    
    const newUrl = new URL(location.href);
    newUrl.searchParams.set("filterRol", empleado_rol_filter.join(","));
    newUrl.searchParams.set("filterEstado", empleado_estado_filter.join(","));
    newUrl.searchParams.set("filterSexo", empleado_sexo_filter.join(","));

    if (empleado_rol_filter.length == 2) newUrl.searchParams.delete("filterRol");
    if (empleado_estado_filter.length == 2) newUrl.searchParams.delete("filterEstado");
    if (empleado_sexo_filter.length == 3) newUrl.searchParams.delete("filterSexo");
    
    const offCanvasElement = document.querySelector('#empleados-filters');
    const offCanvasObject = bootstrap.Offcanvas.getInstance(offCanvasElement);
    offCanvasObject.hide();

    if (newUrl.toString() != window.location.href) window.location.replace(newUrl.toString());
  }
</script>