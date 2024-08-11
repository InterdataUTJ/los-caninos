<footer class="d-flex flex-column">
  <section class="d-flex gap-4 p-3 justify-content-center align-items-center footer-socialmedia">
    <a href="https://www.instagram.com/utj_oficial/" class="d-flex justify-content-center align-items-center" target="_blank" rel="noopener noreferrer">
      <?php require(__DIR__ . "/icons/instagram.php") ?>
    </a>
    <a href="https://www.facebook.com/UTJ.CCD/" class="d-flex justify-content-center align-items-center" target="_blank" rel="noopener noreferrer">
      <?php require(__DIR__ . "/icons/facebook.php") ?>
    </a>
    <a href="https://x.com/utj_oficial" class="d-flex justify-content-center align-items-center" target="_blank" rel="noopener noreferrer">
      <?php require(__DIR__ . "/icons/x.php") ?>
    </a>
    <a href="https://www.youtube.com/channel/UCinB55QzkZv9-cWf6GGkD5w" class="d-flex justify-content-center align-items-center" target="_blank" rel="noopener noreferrer">
      <?php require(__DIR__ . "/icons/youtube.php") ?>
    </a>
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

  .footer-socialmedia a svg {
    width: 30px;
    height: 30px;
    cursor: pointer;
    transition: transform 0.2s ease-in-out;
  }

  .footer-socialmedia a svg:hover {
    transform: scale(1.1);
  }

  .footer-socialmedia a {
    color: black;
    padding: 0;
  }
</style>