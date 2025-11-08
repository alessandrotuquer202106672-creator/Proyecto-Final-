<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ver Programación</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <a href="<?= site_url('programaciones') ?>" class="btn btn-secondary mb-3">Volver</a>
  <div class="card">
    <div class="card-body">
      <?php if (empty($programacion)): ?>
        <p>No se encontró la programación solicitada.</p>
      <?php else: ?>
        <form>
          <div class="mb-3"><label>ID</label><input class="form-control" value="<?= esc($programacion['programacion_id']) ?>" readonly></div>
          <div class="mb-3"><label>Estilo</label><input class="form-control" value="<?= esc($programacion['estilo']) ?>" readonly></div>
          <div class="mb-3"><label>Color</label><input class="form-control" value="<?= esc($programacion['color']) ?>" readonly></div>
          <div class="mb-3"><label>Talla</label><input class="form-control" value="<?= esc($programacion['talla']) ?>" readonly></div>
          <div class="mb-3"><label>Fecha de Inicio</label><input class="form-control" value="<?= esc($programacion['fecha_inicio']) ?>" readonly></div>
          <div class="mb-3"><label>Fecha de Entrega</label><input class="form-control" value="<?= esc($programacion['fecha_entrega']) ?>" readonly></div>
          <div class="mb-3"><label>Estado</label><input class="form-control" value="<?= esc($programacion['estado']) ?>" readonly></div>
        </form>
      <?php endif; ?>
    </div>
  </div>
</div>
</body>
</html>
