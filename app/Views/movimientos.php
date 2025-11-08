<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Movimientos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
  <h1 class="mb-4">Movimientos</h1>

  <!-- Botón para abrir el modal -->
  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalMovimiento">
    Agregar movimiento
  </button>

  <!-- Modal -->
  <div class="modal fade" id="modalMovimiento" tabindex="-1" aria-labelledby="modalMovimientoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMovimientoLabel">Nuevo Movimiento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">

          <form action="<?= base_url('agregar_movimiento') ?>" method="post">
            <!-- No incluyas movimiento_id porque es autoincremental -->

            <div class="mb-2">
              <label for="folio_id" class="form-label">Folio</label>
              <input type="text" name="folio_id" id="folio_id" class="form-control" required>
            </div>

            <div class="mb-2">
              <label for="area_origen_id" class="form-label">Área origen</label>
              <input type="text" name="area_origen_id" id="area_origen_id" class="form-control" required>
            </div>

            <div class="mb-2">
              <label for="area_destino_id" class="form-label">Área destino</label>
              <input type="text" name="area_destino_id" id="area_destino_id" class="form-control" required>
            </div>

            <div class="mb-2">
              <label for="cantidad" class="form-label">Cantidad</label>
              <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>

            <div class="mb-2">
              <label for="fecha" class="form-label">Fecha</label>
              <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>

            <div class="mb-2">
              <label for="usuario_id" class="form-label">Usuario</label>
              <input type="text" name="usuario_id" id="usuario_id" class="form-control" required>
            </div>

            <div class="mb-2">
              <label for="tipo" class="form-label">Tipo</label>
              <input type="text" name="tipo" id="tipo" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Guardar</button>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- Tabla de movimientos -->
  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Folio</th>
          <th>Área origen</th>
          <th>Área destino</th>
          <th>Cantidad</th>
          <th>Fecha</th>
          <th>Usuario</th>
          <th>Tipo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($datos)) : ?>
          <?php foreach ($datos as $movimiento) : ?>
            <tr>
              <td><?= esc($movimiento['movimiento_id']) ?></td>
              <td><?= esc($movimiento['folio_id']) ?></td>
              <td><?= esc($movimiento['area_origen_id']) ?></td>
              <td><?= esc($movimiento['area_destino_id']) ?></td>
              <td><?= esc($movimiento['cantidad']) ?></td>
              <td><?= esc($movimiento['fecha']) ?></td>
              <td><?= esc($movimiento['usuario_id']) ?></td>
              <td><?= esc($movimiento['tipo']) ?></td>
              <td>
                <a href="<?= base_url('eliminar_movimiento/' . $movimiento['movimiento_id']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                <a href="<?= base_url('editar_movimiento/' . $movimiento['movimiento_id']) ?>" class="btn btn-info btn-sm">Editar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="9" class="text-center text-muted">No hay movimientos registrados</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
