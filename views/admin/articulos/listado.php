<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Artículos</h3>
                        </div>
                        <div class="card-body">
                            <!-- Agrega una tabla para mostrar los artículos -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach ($listaarticulos as $articulo){  ?>
                                        <tr>
                                            <td><img class="img-fluid img-list"  src="img/<?= $articulo->getImg() ?>"></td>
                                            <td><?= $articulo->getNombre() ?></td>
                                            <td><?= $articulo->getPrecio() ?></td>
                                            <td><?= $articulo->getDescripcion() ?></td>
                                            
                                            <td>
                                                <!-- Agrega botones para eliminar y editar -->
                                                <a href="?controller=Dashboard&action=editarticle&id=<?= $articulo->getIdarticulos() ?>" class="btn btn-primary">Editar <i class="fa-solid fa-pen-to-square"></i></a>
                                               
                                                <a href="?controller=Articulo&action=delete&id=<?= $articulo->getIdarticulos() ?>" class="btn btn-danger">Eliminar  <i class="fa-solid fa-trash-can"></i></a>
                                            </td>
                                        </tr>
                                    <?php ;} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
