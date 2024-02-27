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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Usuarios</h3>
                        </div>
                        <div class="card-body">
                            <!-- Agrega una tabla para mostrar los Usuarios -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Contraseña</th>
                                        <th>Email</th>
                                        <th>Direccion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach ($listausuarios as $usuario){  ?>
                                        <tr>
                                            <td><?= $usuario->getNombre() ?></td>
                                            <td><?= $usuario->getPassword() ?></td>
                                            <td><?= $usuario->getEmail() ?></td>
                                            <td><?= $usuario->getDireccion() ?></td>
                                            
                                            <td>
                                                <a href="?controller=Dashboard&action=edituser&id=<?= $usuario->getIdusuario() ?>" class="btn btn-primary">Editar <i class="fa-solid fa-pen-to-square"></i></a>
                                               
                                                <a href="?controller=User&action=delete&id=<?= $usuario->getIdusuario() ?>" class="btn btn-danger">Eliminar  <i class="fa-solid fa-trash-can"></i></a>
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
