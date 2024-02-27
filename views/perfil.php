<?php
// Verificar si $usuario no es null antes de usarlo
if ($usuario !== null) {
    ?>

 <div class="body-profile">
    <header>
        <h1>User Profile</h1>
    </header>

    <div class="container-profile">
        <div class="profile">
            <img src="img/profile-picture.png" alt="Profile Picture">
            <div class="user-info">
                <h2><?= $usuario->getNombre() ?></h2>
                <p>Email: <?= $usuario->getEmail() ?></p>
                <p><strong>Address:</strong> <?= $usuario->getDireccion() ?></p>
            </div>
        </div>

    </div>
    <div class="order-history-p">
        <h2>Historial de Compras y Pedidos</h2>
        <?php if (!empty($historialCompras)): ?>
            <ul>
                <?php foreach ($historialCompras as $compra): ?>
                    <li>
                        Fecha: <?= htmlspecialchars($compra->getFechaCompra()); ?>,
                        Total: <?= htmlspecialchars($compra->getPrecioTotal()); ?>
                        <!-- Añade más detalles según sea necesario -->
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No hay historial de compras disponible.</p>
        <?php endif; ?>
    </div>

    </div>
    <h2>Información del perfil </h2>
    <form method="post" action="?controller=Perfil&action=list" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= $usuario->getNombre() ?>" required>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?= $usuario->getDireccion() ?>" required>

        <button type="submit">Actualizar Perfil</button>
    </form>
</div>

    <?php
} 
?>





