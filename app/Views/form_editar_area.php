<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Area</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Editar Area</h1>
            <div class="col-4 offset-4">
                <form action="<?=base_url('modificar_area')?>" method="post">
                    <label for="txt_id" class="form-label">Area ID</label>
                    <input type="number" name="txt_id" id="txt_id" class="form-control"
                        value="<?=$datos['area_id'];?>" readonly>
                    <label for="txt_nombre" class="form-label">Nombre</label>
                    <input type="text" name="txt_nombre" id="txt_nombre" class="form-control"
                        value="<?php echo $datos['nombre'];?>">
                    <label for="txt_orden" class="form-label">Orden</label>
                    <input type="number" name="txt_orden" id="txt_orden" class="form-control"
                        value="<?php echo $datos['orden'];?>">
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