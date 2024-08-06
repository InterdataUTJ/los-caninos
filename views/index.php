<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Los caninos</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/landing.css">

  <link rel="preload" as="image" href="/src/images/perro.webp">
  <link rel="preload" as="image" href="/src/images/perros.webp">
</head>

<body class="container-fluid m-0 p-0">
  <?php require(__DIR__ . "/../components/header.php"); ?>

  <section class="container-fluid landing-page-background p-0">
    <section class="d-flex p-5 gap-5 mx-auto resume-container" style="max-width: 1100px;">
      <div style="flex: 1;" class="d-flex flex-column gap-3 justify-content-center">
        <h1 class="fw-bold">Veterinaria: Los caninos</h1>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt error quasi dolore explicabo consequatur rerum voluptatum iusto impedit voluptate quidem expedita ut, vitae hic unde quia repellat aliquam officiis asperiores.
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis dignissimos, quia nihil repudiandae obcaecati hic recusandae perspiciatis ut voluptate omnis praesentium, quas, exercitationem nostrum quos blanditiis mollitia assumenda tempore illo.
        </p>
      </div>
      <div style="flex: 1;" class="image-perro-landing">
        <img class="lg" loading="lazy" src="/src/images/perro.webp" alt="Caninos" class="img-fluid">
        <img class="sm" loading="lazy" src="/src/images/perros.webp" alt="Caninos" class="img-fluid">
      </div>
    </section>

    <div class="landing-divider-svg-container">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
      </svg>
    </div>
  </section>

  <main class="container p-5 mt-5 d-flex flex-column gap-5">
    <section class="landig-content-container">
      <div class="landing-content">
        <h2 class="fw-bold">Nuestros Servicios</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus dolor ab ipsam magni! Maiores, impedit iure harum inventore quaerat, quam perspiciatis sequi ratione ullam dolorum nulla pariatur ab nihil esse.</p>

        <h5 class="fw-bold">Consulta</h5>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus dolor ab ipsam magni! Maiores, impedit iure harum inventore quaerat, quam perspiciatis sequi ratione ullam dolorum nulla pariatur ab nihil esse.</p>

        <h5 class="fw-bold">Vacuna</h5>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus dolor ab ipsam magni! Maiores, impedit iure harum inventore quaerat, quam perspiciatis sequi ratione ullam dolorum nulla pariatur ab nihil esse.</p>

        <h5 class="fw-bold">Desparacitación</h5>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus dolor ab ipsam magni! Maiores, impedit iure harum inventore quaerat, quam perspiciatis sequi ratione ullam dolorum nulla pariatur ab nihil esse.</p>

        <h5 class="fw-bold">Cirugia</h5>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus dolor ab ipsam magni! Maiores, impedit iure harum inventore quaerat, quam perspiciatis sequi ratione ullam dolorum nulla pariatur ab nihil esse.</p>

        <h5 class="fw-bold">Estetica</h5>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus dolor ab ipsam magni! Maiores, impedit iure harum inventore quaerat, quam perspiciatis sequi ratione ullam dolorum nulla pariatur ab nihil esse.</p>

        <h5 class="fw-bold">Estadia</h5>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus dolor ab ipsam magni! Maiores, impedit iure harum inventore quaerat, quam perspiciatis sequi ratione ullam dolorum nulla pariatur ab nihil esse.</p>
      </div>
      <!-- <img src="/src/images/perro.webp" alt="image"> -->
    </section>

    <section>
      <h2 class="fw-bold">Nuestro Equipo</h2>
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur laborum tenetur dolores, maiores non rem facilis, amet dignissimos repellat deserunt dicta quia commodi fuga ratione ullam eius quaerat mollitia id!
      </p>
    </section>
  </main>

  <?php require(__DIR__ . "/../components/footer.php") ?>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../components/error.php") ?>
</body>

</html>