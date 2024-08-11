<?php

require_once(__DIR__ . "/../middlewares/session_start.php");

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
        <div>
          <p class="fw-semibold fst-italic fs-5">
            Cuidado integral y amor incondicional para tu mascota.
          </p>
          <p>
            En Los Caninos, nos dedicamos a brindar el mejor cuidado para tu mascota con servicios de consulta, desparasitación, cirugía, estética y estadía. Nuestro equipo de expertos y nuestro innovador software aseguran que tanto clientes como empleados puedan gestionar toda la información y operaciones de manera eficiente, garantizando la salud y felicidad de tu compañero peludo. ¡Confía en nosotros para cuidar a quienes más amas!
          </p>
        </div>
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

  <main class="container my-4 d-flex flex-column gap-5">

    <section>
      <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Nuestras Instalaciones</h2>
      <p class="mb-3">En Los Caninos, contamos con instalaciones modernas y totalmente equipadas para proporcionar el mejor cuidado a tu mascota. Nuestro espacio ha sido diseñado pensando en la comodidad y seguridad de tus compañeros peludos, creando un ambiente acogedor y libre de estrés.</p>
      <div id="carouselInstalaciones" class="carousel slide rounded overflow-hidden" style="aspect-ratio: 5/3;">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselInstalaciones" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselInstalaciones" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselInstalaciones" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselInstalaciones" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselInstalaciones" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" style="aspect-ratio: 5/3;">
            <img src="/src/images/instalaciones/1.png" class="d-block w-100 object-fit-cover" style="aspect-ratio: 5/3;">
          </div>
          <div class="carousel-item" style="aspect-ratio: 5/3;">
            <img src="/src/images/instalaciones/2.png" class="d-block w-100 object-fit-cover" style="aspect-ratio: 5/3;">
          </div>
          <div class="carousel-item" style="aspect-ratio: 5/3;">
            <img src="/src/images/instalaciones/3.png" class="d-block w-100 object-fit-cover" style="aspect-ratio: 5/3;">
          </div>
          <div class="carousel-item" style="aspect-ratio: 5/3;">
            <img src="/src/images/instalaciones/4.png" class="d-block w-100 object-fit-cover" style="aspect-ratio: 5/3;">
          </div>
          <div class="carousel-item" style="aspect-ratio: 5/3;">
            <img src="/src/images/instalaciones/5.png" class="d-block w-100 object-fit-cover" style="aspect-ratio: 5/3;">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselInstalaciones" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselInstalaciones" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>
    </section>

    <section class="landig-content-container">
      <div class="landing-content d-flex flex-column gap-4">
        <h2 class="fw-bold pb-2" style="border-bottom: 2px solid #fcbc73;">Nuestros Servicios</h2>
        <p>En Los Caninos, nos dedicamos a ofrecer una atención veterinaria integral y de alta calidad para tu mascota. Contamos con un equipo de profesionales altamente capacitados y comprometidos con el bienestar de tus compañeros peludos. A continuación, te presentamos nuestros servicios, diseñados para cubrir todas las necesidades de salud y cuidado de tu mascota.</p>

        <section class="servicio-contenedor border shadow rounded p-4 mb-3 d-flex gap-4 align-items-center">
          <?php require(__DIR__."/../components/icons/heart-search.php"); ?>
          <article class="flex-grow-1">
            <h5 class="fw-bold pb-1" style="border-bottom: 2px solid #fcbc73;">Consulta</h5>
            <p>En Los Caninos, ofrecemos consultas veterinarias completas para asegurar la salud y bienestar de tu mascota. Nuestro equipo de veterinarios calificados realiza exámenes exhaustivos, diagnostica condiciones y te proporciona el mejor plan de tratamiento. Ya sea para una revisión de rutina o una consulta especializada, estamos aquí para ayudarte.</p>
          </article>
        </section>
        
        <section class="servicio-contenedor border shadow rounded p-4 mb-3 d-flex gap-4 align-items-center">
          <?php require(__DIR__."/../components/icons/vaccine.php"); ?>
          <article>
            <h5 class="fw-bold pb-1" style="border-bottom: 2px solid #fcbc73;">Vacuna</h5>
            <p>La vacunación es fundamental para proteger a tu mascota contra diversas enfermedades. En Los Caninos, ofrecemos un programa de vacunación completo y personalizado, adaptado a las necesidades específicas de cada animal. Nuestro equipo de veterinarios administra vacunas seguras y efectivas, asegurándose de mantener al día el calendario de vacunación de tu mascota. Confía en nosotros para mantener a tu compañero sano y protegido.</p>
          </article>
        </section>
        
        <section class="servicio-contenedor border shadow rounded p-4 mb-3 d-flex gap-4 align-items-center">
          <?php require(__DIR__."/../components/icons/vaccine-bottle.php"); ?>
          <article>
            <h5 class="fw-bold pb-1" style="border-bottom: 2px solid #fcbc73;">Desparasitación</h5>
            <p>La desparasitación regular es crucial para la salud de tu mascota. En Los Caninos, utilizamos métodos seguros y eficaces para eliminar parásitos internos y externos. Nuestro personal te guiará en el mantenimiento de un programa de desparasitación adecuado para prevenir futuras infestaciones y garantizar una vida saludable para tu compañero.</p>
          </article>
        </section>
        
        <section class="servicio-contenedor border shadow rounded p-4 mb-3 d-flex gap-4 align-items-center">
          <?php require(__DIR__."/../components/icons/ambulance.php"); ?>
          <article>
            <h5 class="fw-bold pb-1" style="border-bottom: 2px solid #fcbc73;">Cirugía</h5>
            <p>Nuestro equipo de cirujanos veterinarios está altamente capacitado para realizar una amplia gama de procedimientos quirúrgicos. Desde cirugías de rutina hasta intervenciones más complejas, en Los Caninos utilizamos equipos modernos y técnicas avanzadas para asegurar la recuperación y el bienestar de tu mascota. Nos comprometemos a brindarte la mejor atención pre y postoperatoria.</p>
          </article>
        </section>
        
        <section class="servicio-contenedor border shadow rounded p-4 mb-3 d-flex gap-4 align-items-center">
          <?php require(__DIR__."/../components/icons/scissors.php"); ?>
          <article>
            <h5 class="fw-bold pb-1" style="border-bottom: 2px solid #fcbc73;">Estética</h5>
            <p>El cuidado estético es esencial para la salud y la felicidad de tu mascota. Ofrecemos servicios de grooming profesional que incluyen baños, cortes de pelo, limpieza de oídos y cuidado de uñas. En Los Caninos, nos aseguramos de que tu mascota se vea y se sienta genial, utilizando productos de alta calidad y técnicas suaves.</p>
          </article>
        </section>
        
        <section class="servicio-contenedor border shadow rounded p-4 mb-3 d-flex gap-4 align-items-center">
          <?php require(__DIR__."/../components/icons/shield.php"); ?>
          <article>
            <h5 class="fw-bold pb-1" style="border-bottom: 2px solid #fcbc73;">Estadía</h5>
            <p>Si necesitas ausentarte y no puedes llevar a tu mascota contigo, Los Caninos ofrece un servicio de estadía cómodo y seguro. Nuestras instalaciones están diseñadas para proporcionar un ambiente acogedor y divertido, con atención personalizada para cada huésped. Nos aseguramos de que tu mascota reciba el amor y cuidado que merece mientras tú estás fuera.</p>
          </article>
        </section>
      </div>
    </section>
  </main>

  <?php require(__DIR__ . "/../components/footer.php") ?>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../components/error.php") ?>
</body>

</html>