<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Editar programación</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
  <h2>Editar programación #<?= $program['programacion_id'] ?></h2>

  <form action="<?= site_url('programaciones/update/'.$program['programacion_id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
      <label>Estilo</label>
      <input name="estilo" class="form-control" required value="<?= esc($program['estilo']) ?>">
    </div>

    <div class="row mb-3">
      <div class="col">
        <label>Cantidad total</label>
        <input name="cantidad_total" class="form-control" type="number" required value="<?= esc($program['cantidad_total']) ?>">
      </div>
      <div class="col">
        <label>Pares por folio</label>
        <input name="pares_por_folio" id="pares_por_folio" class="form-control" type="number" required value="<?= esc($program['pares_por_folio']) ?>">
      </div>
      <div class="col">
        <label>Fecha inicio</label>
        <input name="fecha_inicio" class="form-control" type="date" required value="<?= esc($program['fecha_inicio']) ?>">
      </div>
    </div>

    <hr>
    <h5>Folios</h5>
    <div id="folios_container">
      <?php if(!empty($folios)): ?>
        <?php foreach($folios as $f): ?>
          <div class="row mb-2">
            <div class="col-5"><input name="folio_numero[]" class="form-control" value="<?= esc($f['numero_folio']) ?>"></div>
            <div class="col-3"><input name="folio_cantidad[]" class="form-control" type="number" value="<?= esc($f['cantidad_pares']) ?>"></div>
            <div class="col-3">
              <select name="folio_estado[]" class="form-control">
                <option value="en_proceso"<?= $f['estado']=='en_proceso'?' selected':'' ?>>en_proceso</option>
                <option value="finalizado"<?= $f['estado']=='finalizado'?' selected':'' ?>>finalizado</option>
                <option value="reparacion"<?= $f['estado']=='reparacion'?' selected':'' ?>>reparacion</option>
              </select>
            </div>
            <div class="col-1"><button type="button" class="btn btn-danger remove">X</button></div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <button type="button" id="add_folio" class="btn btn-secondary mb-3">Agregar folio</button>

    <div>
      <button class="btn btn-primary">Actualizar</button>
      <a class="btn btn-light" href="<?= site_url('programaciones') ?>">Cancelar</a>
    </div>
  </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
  const container = document.getElementById('folios_container');
  const addBtn = document.getElementById('add_folio');

  function addRow(numero='', cantidad='', estado='en_proceso'){
    const row = document.createElement('div');
    row.className = 'row mb-2';
    row.innerHTML = `
      <div class="col-5"><input name="folio_numero[]" class="form-control" placeholder="Número folio" value="${numero}"></div>
      <div class="col-3"><input name="folio_cantidad[]" class="form-control" type="number" value="${cantidad || document.getElementById('pares_por_folio').value}"></div>
      <div class="col-3">
        <select name="folio_estado[]" class="form-control">
          <option value="en_proceso"${estado=='en_proceso'?' selected':''}>en_proceso</option>
          <option value="finalizado"${estado=='finalizado'?' selected':''}>finalizado</option>
          <option value="reparacion"${estado=='reparacion'?' selected':''}>reparacion</option>
        </select>
      </div>
      <div class="col-1"><button type="button" class="btn btn-danger remove">X</button></div>
    `;
    container.appendChild(row);
    row.querySelector('.remove').addEventListener('click', ()=> row.remove());
  }

  addBtn.addEventListener('click', ()=> addRow());
  document.querySelectorAll('.remove').forEach(btn => btn.addEventListener('click', e => e.target.closest('.row').remove()));
});
</script>
</body>
</html>
