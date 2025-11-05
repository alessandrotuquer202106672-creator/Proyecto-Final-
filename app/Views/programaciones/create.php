<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Crear programación</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
  <h2>Nueva programación</h2>

  <?php if(session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
      <?php foreach(session()->getFlashdata('errors') as $e) echo "<div>$e</div>"; ?>
    </div>
  <?php endif; ?>

  <form action="<?= site_url('programaciones/store') ?>" method="post">
    <?= csrf_field() /* añade esto si CSRF está activado */ ?>

    <div class="mb-3">
      <label>Estilo</label>
      <input name="estilo" class="form-control" required value="<?= old('estilo') ?>">
    </div>

    <div class="row mb-3">
      <div class="col">
        <label>Cantidad total</label>
        <input name="cantidad_total" class="form-control" type="number" required value="<?= old('cantidad_total') ?>">
      </div>
      <div class="col">
        <label>Pares por folio</label>
        <input name="pares_por_folio" id="pares_por_folio" class="form-control" type="number" required value="<?= old('pares_por_folio',10) ?>">
      </div>
      <div class="col">
        <label>Fecha inicio</label>
        <input name="fecha_inicio" class="form-control" type="date" required value="<?= old('fecha_inicio') ?>">
      </div>
    </div>

    <hr>
    <h5>Folios (puedes agregar varios)</h5>
    <div id="folios_container"></div>
    <button type="button" id="add_folio" class="btn btn-secondary mb-3">Agregar folio</button>

    <div>
      <button class="btn btn-primary">Guardar</button>
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
  addRow(); // una fila inicial
});
</script>
</body>
</html>
