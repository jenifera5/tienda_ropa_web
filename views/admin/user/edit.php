<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar  Usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">

    <form action="?controller=Dashboard&action=edit" method="post">
    <input type="number" name="id" value="<?= $usuario->getIdusuario() ?>" required hidden/>
    
        <input type="text" name="nombre" placeholder="Usuario"placeholder="Nombre" value="<?= $usuario->getNombre() ?>" required title="Hay que poner un nombre"/>
        <br>
        <input type="email" name="email" placeholder="email" value="<?= $usuario->getEmail() ?>" />
        <br>
       
        <input type="password" name="password" placeholder="contraseña" value="<?= $usuario->getPassword() ?>" required/>
        <br>
       <input type="text" name="direccion" placeholder="direccion" value="<?= $usuario->getDireccion() ?>" required/>
        <br>
        <button type="submit">Guardar</button>
    </form>
    </section>
</div>