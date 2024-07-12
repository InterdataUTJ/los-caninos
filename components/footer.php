<footer class="d-flex flex-column">
  <section class="d-flex gap-4 p-3 justify-content-center align-items-center footer-socialmedia">
    <?php require(__DIR__ . "/icons/instagram.php") ?>
    <?php require(__DIR__ . "/icons/facebook.php") ?>
    <?php require(__DIR__ . "/icons/x.php") ?>
    <?php require(__DIR__ . "/icons/youtube.php") ?>
  </section>
  <section class="text-center p-3 fw-bold footer-copyright">
    © 2024 Copyright: Veterinaria: Los caninos S.A. de C.V.
  </section>
</footer>

<style>
  .footer-copyright {
    background-color: #fcbc73;
  }

  .footer-socialmedia {
    background-color: #f9d6af;
  }

  .footer-socialmedia svg {
    width: 30px;
    height: 30px;
    cursor: pointer;
    transition: transform 0.2s ease-in-out;
  }

  .footer-socialmedia svg:hover {
    transform: scale(1.1);
  }
</style>