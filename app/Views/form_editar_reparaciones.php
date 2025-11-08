<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar reparación</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2>Editar reparación</h2>

  <form action="<?= base_url('reparaciones/modificar') ?>" method="post">

    <input type="hidden" name="txt_reparacion_id" value="<?= $datos['reparacion_id'] ?>">

    <label class="form-label">Movimiento ID</label>
    <input type="text" class="form-control" name="txt_movimiento_id" value="<?= $datos['movimiento_id'] ?>">

    <label class="form-label">Motivo</label>
    <input type="text" class="form-control" name="txt_motivo" value="<?= $datos['motivo'] ?>">

    <label class="form-label">Cantidad</label>
    <input type="text" class="form-control" name="txt_cantidad" value="<?= $datos['cantidad'] ?>">

    <label class="form-label">Fecha</label>
    <input type="text" class="form-control" name="txt_fecha" value="<?= $datos['fecha'] ?>">

    <label class="form-label">Usuario ID</label>
    <input type="text" class="form-control" name="txt_usuario_id" value="<?= $datos['usuario_id'] ?>">

    <button type="submit" class="btn btn-success mt-3">Guardar cambios</button>
    <a href="<?= base_url('reparaciones') ?>" class="btn btn-secondary mt-3">Cancelar</a>
  </form>
</body>
</html>
