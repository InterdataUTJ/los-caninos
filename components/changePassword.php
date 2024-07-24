<div class="modal fade" id="changePasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Cambiar contraseña</h1>
      </div>
      <div class="modal-body">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label fw-bold">Contraseña actual *</label>
          <div class="input-group mb-3">
            <input type="password" name="password" id="change-currentPassword" class="form-control" placeholder="Contraseña actual">
            <button type="button" class="btn btn-orange-primary password-toggle"><?php include(__DIR__."/../components/icons/eye.php"); ?></button>
            <div class="invalid-feedback">
              La contraseña actual debe tener una longitud de entre 8 y 25 caracteres alfanumericos.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label fw-bold">Nueva contraseña *</label>
          <div class="input-group mb-3">
            <input type="password" name="password" id="change-newPassword" class="form-control" placeholder="Nueva contraseña">
            <button type="button" class="btn btn-orange-primary password-toggle"><?php include(__DIR__."/../components/icons/eye.php"); ?></button>
            <div class="invalid-feedback">
              La contraseña debe tener una longitud de entre 8 y 25 caracteres alfanumericos.
            </div>
          </div>
        </div>
        
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label fw-bold">Repita la nueva contraseña *</label>
          <div class="input-group mb-3">
            <input type="password" name="password" id="change-newPasswordR" class="form-control" placeholder="Nueva contraseña">
            <button type="button" class="btn btn-orange-primary password-toggle"><?php include(__DIR__."/../components/icons/eye.php"); ?></button>     
            <div class="invalid-feedback">
              Las contraseñas deben de ser iguales.
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="changePassword-btn" class="btn btn-primary">Cambiar</button>
      </div>
    </div>
  </div>
</div>

<script>
  const changePasswordModal = new bootstrap.Modal(document.getElementById("changePasswordModal"), {});
</script>

<script src="/src/scripts/password.js"></script>