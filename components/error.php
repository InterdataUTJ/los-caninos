<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="error-component-liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header" style="background-color: #fcbc73 !important;">
      <strong class="me-auto">Los Caninos</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body fw-medium">
      <?php if (isset($_GET["error"])) echo htmlspecialchars($_GET["error"]) ?>
    </div>
  </div>
</div>

<script>
  function showErrorToast(msg) {
    document.getElementById("error-component-liveToast").querySelector("div.toast-body").innerHTML = msg;
    bootstrap.Toast.getOrCreateInstance(document.getElementById('error-component-liveToast')).show()
  }
</script>

<?php
  if (isset($_GET["error"])) echo "<script>bootstrap.Toast.getOrCreateInstance(document.getElementById('error-component-liveToast')).show()</script>";
?>