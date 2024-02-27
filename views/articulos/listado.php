<div class="container mt-5 mb-3">
  <h1>Recomendados Para ti</h1>
    <div class="row">
        <?php
        foreach ($listaarticulos as $articulo) {
        ?>

            <div class="col-3">
                <div class="card">
                    <img class="img-fluid card-img-top"  src="img/<?= $articulo->getImg() ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $articulo->getNombre() ?></h5>
                        <p class="card-text"><?= $articulo->getDescripcion() ?></p>
                    </div>

                    <div class="card-footer text-muted">
                        <a href="#" class="btn btn-primary"><?= $articulo->getPrecio() ?></a>
                        <a href="?controller=Carrito&action=add&id=<?= $articulo->getIdarticulos() ?>" class="btn btn-secondary"><i class="fa-solid fa-cart-shopping"></i></a>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>