<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <h1>Usuarios</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar usuarios
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url("agregar_usuario");?>" method="post">
                        <label for="txt_id" class="form-label">usuario id</label>
                        <input type="number" name="txt_id" id="txt_id" class="form-control">
                        <label for="txt_nombre" class="form-label">Nombre</label>
                        <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">
                        <label for="txt_usuario" class="form-label">Usuario</label>
                        <input type="text" name="txt_usuario" id="txt_usuario" class="form-control">
                        <label for="txt_contraseña" class="form-label">contraseña</label>
                        <input type="password" name="txt_contraseña" id="txt_contraseña" class="form-control">
                        <label for="txt_rol" class="form-label">Rol</label>
                        <select name="txt_rol" id="txt_rol" class="form-control">
                            <option value="admin">admin</option>
                            <option value="supervisor">supervisor</option>
                            <option value="operador">operador</option>
                        </select>
                        <label for="txt_area" class="form-label">Area ID</label>
                        <input type="number" name="txt_area" id="txt_area" class="form-control">

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
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Rol</th>
                <th>Area ID</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //recorrer todo el array (tabla ) y cada fila 
                // o registro le da el nombre de $autor
                foreach($datos as $usuario){

                
            ?>
            <tr>
                <td><?= $usuario['usuario_id']; ?></td>
                <td><?= $usuario['nombre']; ?></td>
                <td><?= $usuario['usuario']; ?></td>
                <td><?= $usuario['contraseña']; ?></td>
                <td><?= $usuario['rol']; ?></td>
                <td><?= $usuario['area_id']; ?></td>
                <td>
                    <a href="<?=base_url ('eliminar_usuario/').$usuario['usuario_id'] ?>"
                        class="btn btn-danger">Eliminar</a>
                    <a href="<?=base_url('buscar_usuario/').$usuario['usuario_id'];?>" class="btn btn-info"><i
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