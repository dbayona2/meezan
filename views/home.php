<?php require __DIR__ . '/layout/header.php'; ?>

<!-- 1. HERO -->
<section id="inicio" class="hero d-flex align-items-center">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 text-white" data-aos="fade-right">
        <h1 class="display-4">Debit Cards</h1>
        <p class="fw-semibold">Presentamos la primera tarjeta de débito con tecnología EMV y NFC</p>
        <p>Paga con solo acercar tu tarjeta en todos los comercios del mundo, con la seguridad adicional del chip EMV.</p>
        <a href="#contacto" class="btn-solicitar">Solicitar mi tarjeta <i class="fa-solid fa-arrow-right"></i></a>
      </div>
      <div class="col-lg-6 text-center mt-5 mt-lg-0" data-aos="fade-left">
        <img src="assets/img/tarjeta.svg?v=2" alt="Tarjeta de débito" class="img-fluid flotar">
      </div>
    </div>
  </div>
</section>

<!-- 2. TIPOS DE TARJETA (carrusel Swiper con datos de la BD) -->
<section id="tipos" class="py-5">
  <div class="container">
    <h2 class="titulo text-center" data-aos="fade-up">Tipos de tarjetas de débito</h2>
    <p class="text-center text-muted mb-5">Elige la tarjeta que mejor se adapte a ti. Hay 3 tipos principales.</p>
    <div class="swiper tarjetas-swiper">
      <div class="swiper-wrapper">
        <?php foreach ($tarjetas as $t): ?>
        <div class="swiper-slide pb-5">
          <div class="card tarjeta-card h-100 text-center">
            <div class="tarjeta-top">
              <img src="assets/img/tarjeta-<?= (int)$t['id'] ?>.svg"
                   alt="<?= htmlspecialchars($t['nombre']) ?>" class="card-img">
            </div>
            <div class="card-body">
              <h5><?= htmlspecialchars($t['nombre']) ?></h5>
              <p class="small text-muted"><?= htmlspecialchars($t['descripcion']) ?></p>
              <a href="#contacto" class="leer-mas">Leer más</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

<!-- 3. TARJETAS SUPLEMENTARIAS (imagen con ruta absoluta) -->
<section id="suplementarias" class="py-5 bg-claro">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-6" data-aos="fade-right">
        <h2 class="titulo">Tarjetas suplementarias</h2>
        <p class="fw-semibold">Comparte la comodidad y la alegría</p>
        <p>Con las tarjetas suplementarias puedes delegar la responsabilidad de dar efectivo a tus seres queridos para sus gastos diarios.</p>
        <p>Además, puedes dar independencia y compartir los beneficios de tu tarjeta con tu pareja, hijos, hermanos, padres y amigos.</p>
      </div>
      <div class="col-lg-6 text-center" data-aos="fade-left">
        <img src="https://picsum.photos/id/0/600/420" alt="Tarjetas suplementarias" class="img-fluid rounded-4 shadow hover-zoom">
      </div>
    </div>
  </div>
</section>

<!-- 4. CARACTERÍSTICAS Y BENEFICIOS (datos de la BD) -->
<section id="beneficios" class="py-5">
  <div class="container">
    <h2 class="titulo text-center" data-aos="fade-up">Características y beneficios</h2>
    <p class="text-center text-muted mb-5">Estas son algunas de las ventajas de nuestras tarjetas de débito.</p>
    <div class="row g-4 justify-content-center">
      <?php foreach ($beneficios as $i => $b): ?>
      <div class="col-6 col-md-4 col-lg" data-aos="zoom-in" data-aos-delay="<?= $i * 100 ?>">
        <div class="beneficio text-center">
          <div class="icono"><i class="fa-solid <?= htmlspecialchars($b['icono']) ?>"></i></div>
          <h6><?= htmlspecialchars($b['titulo']) ?></h6>
          <p class="small text-muted"><?= htmlspecialchars($b['descripcion']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- 5. PAYPAK (imagen con ruta absoluta) -->
<section id="paypak" class="py-5 bg-claro">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-6 text-center" data-aos="fade-right">
        <img src="https://picsum.photos/id/180/600/400" alt="Tarjeta PayPak" class="img-fluid rounded-4 shadow hover-zoom">
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <h2 class="titulo">PayPak Debit Card</h2>
        <p class="fw-semibold">Sé local, paga local</p>
        <p>Tarjeta con PIN que ofrece máxima seguridad en cajeros y en comercios de todo el país.</p>
        <ul class="list-unstyled row">
          <li class="col-6 mb-2"><i class="fa-solid fa-check text-morado"></i> Retiro de efectivo</li>
          <li class="col-6 mb-2"><i class="fa-solid fa-check text-morado"></i> Pagos en POS</li>
          <li class="col-6 mb-2"><i class="fa-solid fa-check text-morado"></i> Consulta de saldo</li>
          <li class="col-6 mb-2"><i class="fa-solid fa-check text-morado"></i> Pago de facturas</li>
        </ul>
        <a href="#contacto" class="leer-mas">Leer más</a>
      </div>
    </div>
  </div>
</section>

<!-- 6. ACTIVACIÓN (pasos de la BD) -->
<section id="activacion" class="py-5">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-6" data-aos="fade-right">
        <h2 class="titulo">La activación de tarjeta más rápida</h2>
        <p class="fw-semibold">Es simple. Es rápido.</p>
        <ol class="list-unstyled mt-4">
          <?php foreach ($pasos as $i => $p): ?>
          <li class="paso <?= $i === 0 ? 'activo' : '' ?>">
            <span class="num"><?= (int)$p['numero'] ?></span>
            <div>
              <h6 class="mb-0"><?= htmlspecialchars($p['titulo']) ?></h6>
              <small class="text-muted"><?= htmlspecialchars($p['descripcion']) ?></small>
            </div>
          </li>
          <?php endforeach; ?>
        </ol>
        <button type="button" id="siguiente" class="btn btn-morado btn-hover">Siguiente paso <i class="fa-solid fa-arrow-right"></i></button>
      </div>
      <div class="col-lg-6 text-center" data-aos="fade-left">
        <i class="fa-solid fa-mobile-screen-button fa-10x text-morado flotar"></i>
      </div>
    </div>
  </div>
</section>

<!-- 7. CONTACTO: formulario POST que guarda en la BD y lleva a "gracias" -->
<section id="contacto" class="py-5 bg-claro">
  <div class="container">
    <div class="contacto-card row g-0" data-aos="fade-up">

      <!-- Panel morado informativo -->
      <div class="col-lg-5 contacto-info">
        <h2 class="titulo">Solicita tu tarjeta</h2>
        <p>Déjanos tus datos y un asesor se pondrá en contacto contigo muy pronto.</p>
        <ul class="list-unstyled my-3">
          <li><i class="fa-solid fa-bolt"></i> Respuesta rápida</li>
          <li><i class="fa-solid fa-shield-halved"></i> Tus datos están protegidos</li>
          <li><i class="fa-solid fa-credit-card"></i> Elige entre 3 tipos de tarjeta</li>
        </ul>
        <img src="assets/img/tarjeta.svg" alt="Tarjeta Meezan Bank" class="img-fluid flotar contacto-img">
      </div>

      <!-- Formulario -->
      <div class="col-lg-7 contacto-form">
        <h5 class="mb-4">Tus datos</h5>
        <form action="index.php?page=guardar" method="post">
          <div class="row g-3">
            <div class="col-md-6">
              <div class="input-group campo">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input name="nombre" class="form-control" placeholder="Nombre completo" maxlength="100" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group campo">
                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                <input name="correo" type="email" class="form-control" placeholder="Correo" maxlength="100" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group campo">
                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                <input name="telefono" class="form-control" placeholder="Teléfono" maxlength="30" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group campo">
                <span class="input-group-text"><i class="fa-solid fa-credit-card"></i></span>
                <select name="tarjeta_id" class="form-select" required>
                  <option value="">Tipo de tarjeta</option>
                  <?php foreach ($tarjetas as $t): ?>
                  <option value="<?= (int)$t['id'] ?>"><?= htmlspecialchars($t['nombre']) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="input-group campo">
                <span class="input-group-text"><i class="fa-solid fa-message"></i></span>
                <textarea name="mensaje" class="form-control" rows="3" maxlength="255" placeholder="Mensaje (opcional)"></textarea>
              </div>
            </div>
            <div class="col-12 d-grid">
              <button class="btn-enviar">Enviar solicitud <i class="fa-solid fa-paper-plane ms-1"></i></button>
            </div>
            <p class="small text-muted text-center mb-0">
              <i class="fa-solid fa-lock"></i> Tu información es confidencial.
            </p>
          </div>
        </form>
      </div>

    </div>
  </div>
</section>

<?php require __DIR__ . '/layout/footer.php'; ?>