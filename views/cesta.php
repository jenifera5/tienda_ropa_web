<div class="container-cart">
    <div class="cart">
        <h2 class="carrito">Carrito de Compras</h2>
        
        <?php if (!empty($articulosEnCarrito)): ?>
            <?php foreach ($articulosEnCarrito as $articulo): ?>
                <div class="product">
                    <div class="product-title"><?= htmlspecialchars($articulo->getNombre()) ?></div>
                    <div class="product-price">€<?= htmlspecialchars(number_format($articulo->getPrecio(), 2)) ?></div>
                    <img class="product-img" src="img/<?= htmlspecialchars($articulo->getImg() ?: 'default.jpg') ?>" alt="Product Image">
                    <a href="?controller=Carrito&action=delete&id=<?= htmlspecialchars($articulo->getIdarticulos()) ?>" class="btn btn-danger">Eliminar <i class="fa-solid fa-trash-can"></i></a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay artículos en el carrito.</p>
        <?php endif; ?>
    </div>
   
    <form action="?controller=Carrito&action=actualizarEnvio" method="POST">
    <section class="shipping-form">
        <h2>Forma de envío:</h2>
        <select id="shipping-method" name="shipping_method">
            <option value="standard">Standard 24-72h</option>
            <option value="express">Express 24h</option>
        </select>
    </section>
    <button type="submit" class="act-btn">Actualizar Envío</button>
</form>

    <?php if (isset($compras)): ?>
    <div class="order-summary">
        <div class="order-summary-title">Resumen de la orden</div>
        <div class="shipping">Envío: €<?= htmlspecialchars(number_format($compras->getCostoEnvio(), 2)); ?></div>
        <div class="precio_total">Total: €<?= htmlspecialchars(number_format($compras->getPrecioTotal(), 2)); ?></div>
        <div class="fecha_compra">Fecha: <?= htmlspecialchars($compras->getFechaCompra()); ?></div>
        <!-- Aquí podría ir cualquier otro detalle que desees mostrar -->

        <!-- Formulario para continuar al pago o realizar alguna acción -->
        <form action="?controller=Carrito&action=confirmacion" method="POST">
            <button type="submit" class="continue-btn">Continuar el pago<i class="fa-solid fa-cash-register"></i></button>
        </form>
    </div>
    <?php endif; ?>
</div>

