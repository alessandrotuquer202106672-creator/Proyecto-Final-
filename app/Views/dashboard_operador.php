<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5 text-center">
        <h1 class="mb-4">Bienvenido, <?= session('nombre') ?></h1>

        <div class="mb-4">
            <a href="<?= base_url('/logout') ?>" class="btn btn-danger">Cerrar sesión</a>
        </div>

        <div class="row justify-content-center g-3">
            
            <div class="col-md-3">
                <a href="<?= base_url('/programaciones') ?>" class="btn btn-warning w-100 py-3">
                    <i class="bi bi-calendar3"></i> Programaciones
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?= base_url('/folios') ?>" class="btn btn-info w-100 py-3">
                    <i class="bi bi-folder2-open"></i> Folios
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?= base_url('/movimientos') ?>" class="btn btn-secondary w-100 py-3">
                    <i class="bi bi-tools"></i> Movimientos
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?= base_url('/reparaciones') ?>" class="btn btn-secondary w-100 py-3">
                    <i class="bi bi-tools"></i>Reparaciones
                </a>
            </div>
        </div>
    </div>

    <!-- Íconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>

</html>