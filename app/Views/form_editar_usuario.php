<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Editar Usuario</h1>
            <div class="col-4 offset-4">
                <form action="<?=base_url('modificar_usuario')?>" method="post">
                    <label for="txt_id" class="form-label">Usuario ID</label>
                    <input type="number" name="txt_id" id="txt_id" class="form-control"
                        value="<?=$datos['usuario_id'];?>" readonly>
                    <label for="txt_nombre" class="form-label">Nombre</label>
                    <input type="text" name="txt_nombre" id="txt_nombre" class="form-control"
                        value="<?php echo $datos['nombre'];?>">
                    <label for="txt_usuario" class="form-label">Usuario</label>
                    <input type="text" name="txt_usuario" id="txt_usuario" class="form-control"
                        value="<?php echo $datos['usuario'];?>">
                    <label for="txt_contraseña" class="form-label">Contraseña</label>
                    <input type="password" name="txt_contraseña" id="txt_contraseña" class="form-control"
                        value="<?php echo $datos['contraseña'];?>">
                    <label for="txt_rol" class="form-label">Rol</label>
                    <select name="txt_rol" id="txt_rol" class="form-control">
                        <option value="admin" <?php if ($datos['rol'] == 'admin') echo 'selected'; ?>>Administrador
                        </option>
                        <option value="supervisor" <?php if ($datos['rol'] == 'supervisor') echo 'selected'; ?>>Usuario
                        </option>
                        <option value="operador" <?php if ($datos['rol'] == 'operador') echo 'selected'; ?>>Invitado
                        </option>
                    </select>
                    <label for="txt_area" class="form-label">Area ID</label>
                    <input type="number" name="txt_area" id="txt_area" class="form-control"
                        value="<?php echo $datos['area_id'];?>">
                    <button type="submit" class="form-control btn btn-primary mt-2">GUARDAR CAMBIOS</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>