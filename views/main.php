<?php include_once 'config/parametro.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Smart Shop</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="<?=url?>css/styles.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d5c3e0f73e.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include_once 'views/header.php'; ?>
    <?php include_once $view; ?>
    <?php 
        // Verificar si $usuario está definido
        if (isset($_SESSION['usuario'])) { // Cambia 'usuario' por la clave que hayas usado para guardar los datos de sesión del usuario
            $usuario = $_SESSION['usuario']; 
            // Asigna la variable para que esté disponible en el resto del script
            include_once 'views/perfil.php';
        } 
    ?>
    <?php include_once 'views/footer.php'; ?>
</body>

</html>