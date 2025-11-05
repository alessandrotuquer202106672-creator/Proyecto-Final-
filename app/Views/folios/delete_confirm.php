<h2>Confirmar eliminación</h2>

<p>¿Seguro que deseas eliminar el folio <strong><?= esc($folio['numero_folio']) ?></strong> (ID <?= esc($folio['folio_id']) ?>)?</p>

<form action="<?= site_url('folios/delete/'.$folio['folio_id']) ?>" method="post">
    <?= csrf_field() ?>
    <button type="submit" class="btn btn-danger">Sí, eliminar</button>
    <a href="<?= site_url('folios') ?>" class="btn btn-secondary">Cancelar</a>
</form>
