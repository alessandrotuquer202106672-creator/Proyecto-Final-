<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Folio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <a href="<?= site_url('folios') ?>" class="btn btn-secondary mb-3">Volver</a>

  <div class="card">
    <div class="card-body">
      <?php if (empty($folio)): ?>
        <p>No se encontró el folio solicitado.</p>
      <?php else: ?>
        <form>
          <div class="mb-3"><label class="form-label">ID Folio</label><input class="form-control" value="<?= esc($folio['folio_id']) ?>" readonly></div>
          <div class="mb-3"><label class="form-label">Número Folio</label><input class="form-control" value="<?= esc($folio['numero_folio']) ?>" readonly></div>
          <div class="mb-3"><label class="form-label">Programación</label><input class="form-control" value="<?= esc($folio['estilo'] ?: $folio['programacion_id']) ?>" readonly></div>
          <div class="mb-3"><label class="form-label">Cantidad Pares</label><input class="form-control" value="<?= esc($folio['cantidad_pares']) ?>" readonly></div>
          <div class="mb-3"><label class="form-label">Estado</label><input class="form-control" value="<?= esc($folio['estado']) ?>" readonly></div>
        </form>
      <?php endif; ?>
    </div>
  </div>
</div>
</body>
</html>
