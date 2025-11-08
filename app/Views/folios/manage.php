<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestión de Folios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Gestión de Folios</h4>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">Agregar Folio</button>
  </div>

  <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-info"><?= session()->getFlashdata('msg') ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body p-0">
      <table class="table mb-0">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Número Folio</th>
            <th>Programación</th>
            <th>Cantidad Pares</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($folios)): ?>
            <tr><td colspan="6" class="text-center py-3">Sin registros</td></tr>
          <?php else: foreach ($folios as $f): ?>
            <tr>
              <td><?= $f['folio_id'] ?></td>
              <td><?= esc($f['numero_folio']) ?></td>
              <td><?= esc($f['estilo'] ?: $f['programacion_id']) ?></td>
              <td><?= esc($f['cantidad_pares']) ?></td>
              <td><?= esc($f['estado']) ?></td>
              <td>
                <a href="<?= site_url('folios/formulario/'.$f['folio_id']) ?>" class="btn btn-sm btn-success">Ver</a>
                <a href="<?= site_url('folios/eliminar/'.$f['folio_id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar folio?')">Eliminar</a>
              </td>
            </tr>
          <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Agregar -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="<?= site_url('folios/agregar') ?>" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Folio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <!-- No pedimos numero_folio: se genera automáticamente -->
        <div class="mb-3">
          <label class="form-label">ID Programación</label>
          <input type="number" name="programacion_id" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Cantidad de Pares</label>
          <input type="number" name="cantidad_pares" class="form-control" required min="1">
        </div>
        <div class="mb-3">
          <label class="form-label">Estado</label>
          <select name="estado" class="form-select">
            <option value="en_proceso">en_proceso</option>
            <option value="finalizado">finalizado</option>
            <option value="reparacion">reparacion</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

