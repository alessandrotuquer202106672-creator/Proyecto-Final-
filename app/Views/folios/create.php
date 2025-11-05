<h2>Agregar Folio</h2>

<?php $errors = session('errors') ?? []; ?>

<form action="<?= site_url('folios/create') ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label>Programación ID</label>
        <input type="number" name="programacion_id" class="form-control" value="<?= set_value('programacion_id') ?>">
        <?php if(isset($errors['programacion_id'])) echo '<small class="text-danger">'.$errors['programacion_id'].'</small>'; ?>
    </div>

    <div class="form-group">
        <label>Número Folio</label>
        <input type="text" name="numero_folio" class="form-control" value="<?= set_value('numero_folio') ?>">
        <?php if(isset($errors['numero_folio'])) echo '<small class="text-danger">'.$errors['numero_folio'].'</small>'; ?>
    </div>

    <div class="form-group">
        <label>Cantidad Pares</label>
        <input type="number" name="cantidad_pares" class="form-control" value="<?= set_value('cantidad_pares', 10) ?>">
        <?php if(isset($errors['cantidad_pares'])) echo '<small class="text-danger">'.$errors['cantidad_pares'].'</small>'; ?>
    </div>

    <div class="form-group">
        <label>Estado</label>
        <select name="estado" class="form-control">
            <option value="en_proceso" <?= set_select('estado', 'en_proceso', true) ?>>En proceso</option>
            <option value="finalizado" <?= set_select('estado', 'finalizado') ?>>Finalizado</option>
            <option value="reparacion" <?= set_select('estado', 'reparacion') ?>>Reparación</option>
        </select>
        <?php if(isset($errors['estado'])) echo '<small class="text-danger">'.$errors['estado'].'</small>'; ?>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="<?= site_url('folios') ?>" class="btn btn-secondary">Cancelar</a>
</form>
