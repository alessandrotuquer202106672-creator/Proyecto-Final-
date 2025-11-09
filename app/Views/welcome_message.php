<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Principal</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: linear-gradient(to right, #1e3c72, #2a5298);
        color: #fff;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .btn-login {
        background-color: #ffc107;
        border: none;
        color: #000;
        font-weight: bold;
        padding: 10px 25px;
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-login:hover {
        background-color: #ffca2c;
        transform: scale(1.05);
    }
    </style>
</head>

<body>
    <div class="text-center">
        <h1 class="mb-4">Bienvenido al Sistema de Producción</h1>
        <p class="mb-4">Accede con tus credenciales para continuar</p>
        <a href="<?= base_url('/login') ?>" class="btn btn-login">Ir al Login</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>