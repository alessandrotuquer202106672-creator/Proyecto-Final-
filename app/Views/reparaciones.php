<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reparaciones</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">
  <h1 class="text-center mb-4">Gestión de Reparaciones</h1>

  <!-- Botón para abrir modal -->
  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAgregar">
    Agregar Reparación
  </button>

  <!-- Modal Agregar -->
  <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalAgregarLabel">Nueva Reparación</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <form action="<?= base_url('reparaciones/agregarReparacion') ?>" method="post">
          <div class="modal-body">
            <!-- 🔹 Los campos del formulario -->
            <div class="mb-3">
              <label for="txt_movimiento_id" class="form-label">Movimiento</label>
              <input type="text" name="txt_movimiento_id" id="txt_movimiento_id" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="txt_motivo" class="form-label">Motivo</label>
              <input type="text" name="txt_motivo" id="txt_motivo" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="txt_cantidad" class="form-label">Cantidad</label>
              <input type="number" name="txt_cantidad" id="txt_cantidad" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="txt_fecha" class="form-label">Fecha</label>
              <input type="date" name="txt_fecha" id="txt_fecha" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="txt_usuario_id" class="form-label">Usuario ID</label>
              <input type="number" name="txt_usuario_id" id="txt_usuario_id" class="form-control" required>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- Tabla de reparaciones -->
  <table class="table table-striped table-bordered align-middle">
    <thead class="table-dark text-center">
      <tr>
        <th>ID Reparación</th>
        <th>Movimiento</th>
        <th>Motivo</th>
        <th>Cantidad</th>
        <th>Fecha</th>
        <th>Usuario ID</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php if (!empty($datos)) : ?>
        <?php foreach ($datos as $reparacion) : ?>
          <tr>
            <td><?= esc($reparacion['reparacion_id']); ?></td>
            <td><?= esc($reparacion['movimiento_id']); ?></td>
            <td><?= esc($reparacion['motivo']); ?></td>
            <td><?= esc($reparacion['cantidad']); ?></td>
            <td><?= esc($reparacion['fecha']); ?></td>
            <td><?= esc($reparacion['usuario_id']); ?></td>
            <td>
              <!-- Botones de acción -->
              <a href="<?= base_url('reparaciones/buscar/' . $reparacion['reparacion_id']); ?>" 
   class="btn btn-success btn-sm">Editar</a>
              <a href="<?= base_url('reparaciones/eliminarReparaciones/' . $reparacion['reparacion_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta reparación?');">Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td colspan="7">No hay reparaciones registradas.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
