<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<h2>Folios</h2>
<p><a href="<?= site_url('folios/create') ?>" class="btn btn-primary">Agregar Folio</a></p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Programación ID</th>
            <th>Número Folio</th>
            <th>Cantidad Pares</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($folios)): foreach($folios as $f): ?>
        <tr>
            <td><?= esc($f['folio_id']) ?></td>
            <td><?= esc($f['programacion_id']) ?></td>
            <td><?= esc($f['numero_folio']) ?></td>
            <td><?= esc($f['cantidad_pares']) ?></td>
            <td><?= esc($f['estado']) ?></td>
            <td>
                <a href="<?= site_url('folios/confirmDelete/'.$f['folio_id']) ?>" class="btn btn-sm btn-danger">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; else: ?>
        <tr><td colspan="6">No hay folios.</td></tr>
    <?php endif; ?>
    </tbody>
</table>

