<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Areas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <h1>Areas</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar Area
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Area</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url("agregar_area");?>" method="post">
                        <label for="txt_id" class="form-label">Area ID</label>
                        <input type="number" name="txt_id" id="txt_id" class="form-control">
                        <label for="txt_nombre" class="form-label">Nombre</label>
                        <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">
                        <label for="txt_orden" class="form-label">Orden</label>
                        <input type="number" name="txt_orden" id="txt_orden" class="form-control">

                        <button type="submit" class="form-control btn btn-primary mt-2">Guardar</button>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Area ID</th>
                <th>Nombre</th>
                <th>Orden</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //recorrer todo el array (tabla ) y cada fila 
                // o registro le da el nombre de $autor
                foreach($datos as $area){

                
            ?>
            <tr>
                <td><?= $area['area_id']; ?></td>
                <td><?= $area['nombre']; ?></td>
                <td><?= $area['orden']; ?></td>
                <td>
                    <a href="<?=base_url ('eliminar_area/').$area['area_id'] ?>"
                        class="btn btn-danger">Eliminar</a>
                    <a href="<?=base_url('buscar_area/').$area['area_id'];?>" class="btn btn-info"><i
                            class="bi bi-pencil-square"></i> </a>

                </td>
            </tr>
            <?php
                } // fin del ciclo
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>