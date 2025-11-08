<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Programaciones</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
  <h1>Programaciones</h1>

  <a class="btn btn-primary mb-3" href="<?= site_url('programaciones/create') ?>">Nueva programación</a>

  <?php if(session()->getFlashdata('message')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
  <?php endif; ?>

  <table class="table table-striped">
    <thead>
      <tr><th>ID</th><th>Estilo</th><th>Cantidad</th><th>Fecha inicio</th><th>Acciones</th></tr>
    </thead>
    <tbody>
      <?php if(!empty($programaciones)): ?>
        <?php foreach($programaciones as $p): ?>
        <tr>
          <td><?= $p['programacion_id'] ?></td>
          <td><?= esc($p['estilo']) ?></td>
          <td><?= $p['cantidad_total'] ?></td>
          <td><?= $p['fecha_inicio'] ?></td>
          <td>
            <a class="btn btn-sm btn-info" href="<?= site_url('programaciones/show/'.$p['programacion_id']) ?>">Ver</a>
            <a class="btn btn-sm btn-warning" href="<?= site_url('programaciones/edit/'.$p['programacion_id']) ?>">Editar</a>
            <a class="btn btn-sm btn-danger" href="<?= site_url('programaciones/delete/'.$p['programacion_id']) ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="5">No hay programaciones aún.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</body>
</html>
