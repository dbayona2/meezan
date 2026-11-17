<?php
$columnas = [
    'Centro de medios'  => ['Noticias', 'Avisos', 'Resultados financieros'],
    'Banca personal'    => ['Cuentas', 'Depósitos a plazo', 'Remesas'],
    'Banca empresarial' => ['Pequeñas empresas', 'Banca corporativa', 'Banca agrícola'],
    'Red de sucursales' => ['Todas las sucursales', 'Cajeros', 'Sucursales de sábado'],
];
?>
<footer class="footer pt-5 pb-3 text-white">
  <div class="container">
    <div class="row g-4">
      <?php foreach ($columnas as $titulo => $enlaces): ?>
      <div class="col-6 col-md-3">
        <h6><?= $titulo ?></h6>
        <ul class="list-unstyled small">
          <?php foreach ($enlaces as $enlace): ?>
          <li class="mb-1"><a href="#"><?= $enlace ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endforeach; ?>
      <div class="col-12">
        <h6>Conéctate con nosotros</h6>
        <a href="#" class="me-3 fs-5"><i class="fa-brands fa-facebook"></i></a>
        <a href="#" class="me-3 fs-5"><i class="fa-brands fa-x-twitter"></i></a>
        <a href="#" class="me-3 fs-5"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" class="me-3 fs-5"><i class="fa-brands fa-linkedin"></i></a>
      </div>
    </div>
    <hr class="border-light">
    <p class="text-center small mb-0">&copy; 2026 Proyecto de práctica. Todos los derechos reservados.</p>
  </div>
</footer>

<!-- Botón flotante de WhatsApp -->
<a href="https://wa.me/573143879917?text=Hola%2C%20quiero%20informaci%C3%B3n%20sobre%20las%20tarjetas"
   class="whatsapp" target="_blank" rel="noopener" aria-label="WhatsApp">
  <i class="fa-brands fa-whatsapp"></i>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>