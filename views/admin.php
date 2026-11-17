<?php require __DIR__ . '/layout/header.php'; ?>

<section class="container py-5 admin">
  <h2 class="titulo mb-4">Solicitudes recibidas</h2>

  <!-- Buscar: formulario con GET -->
  <form method="get" class="row g-2 mb-4">
    <input type="hidden" name="page" value="admin">
    <div class="col-md-6">
      <input name="buscar" class="form-control" placeholder="Buscar por nombre o correo"
             value="<?= htmlspecialchars($buscar) ?>">
    </div>
    <div class="col-auto"><button class="btn btn-morado">Buscar</button></div>
  </form>

  
  <?php if ($editando): ?>
  <form action="index.php?page=admin" method="post" class="card p-3 mb-4 border-0 shadow">
    <h5>Editar solicitud #<?= (int)$editando['id'] ?></h5>
    <input type="hidden" name="accion" value="actualizar">
    <input type="hidden" name="id" value="<?= (int)$editando['id'] ?>">
    <div class="row g-2">
      <div class="col-md-4"><input name="nombre" class="form-control" required value="<?= htmlspecialchars($editando['nombre']) ?>"></div>
      <div class="col-md-4"><input name="correo" type="email" class="form-control" required value="<?= htmlspecialchars($editando['correo']) ?>"></div>
      <div class="col-md-4"><input name="telefono" class="form-control" required value="<?= htmlspecialchars($editando['telefono']) ?>"></div>
      <div class="col-md-4">
        <select name="tarjeta_id" class="form-select">
          <?php foreach ($tarjetas as $t): ?>
          <option value="<?= (int)$t['id'] ?>" <?= $t['id'] == $editando['tarjeta_id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($t['nombre']) ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-8"><input name="mensaje" class="form-control" value="<?= htmlspecialchars($editando['mensaje'] ?? '') ?>"></div>
      <div class="col-12">
        <button class="btn btn-morado">Actualizar</button>
        <a href="index.php?page=admin" class="btn btn-outline-secondary">Cancelar</a>
      </div>
    </div>
  </form>
  <?php endif; ?>

  <!-- Lista -->
  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead>
        <tr><th>#</th><th>Nombre</th><th>Correo</th><th>Teléfono</th><th>Tarjeta</th><th>Fecha</th><th>Acciones</th></tr>
      </thead>
      <tbody>
        <?php foreach ($solicitudes as $s): ?>
        <tr>
          <td><?= (int)$s['id'] ?></td>
          <td><?= htmlspecialchars($s['nombre']) ?></td>
          <td><?= htmlspecialchars($s['correo']) ?></td>
          <td><?= htmlspecialchars($s['telefono']) ?></td>
          <td><?= htmlspecialchars($s['tarjeta']) ?></td>
          <td><?= htmlspecialchars($s['creado_en']) ?></td>
          <td>
            <a href="index.php?page=admin&editar=<?= (int)$s['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
            <form action="index.php?page=admin" method="post" class="d-inline"
                  onsubmit="return confirm('¿Eliminar esta solicitud?')">
              <input type="hidden" name="accion" value="eliminar">
              <input type="hidden" name="id" value="<?= (int)$s['id'] ?>">
              <button class="btn btn-sm btn-outline-danger">Eliminar</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<?php require __DIR__ . '/layout/footer.php'; ?>