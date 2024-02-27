<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Añadir Usuario</h1>
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

    <form action="?controller=User&action=add" method="post">
        <input type="text" name="nombre" placeholder="Usuario"/>
        <br>
        <input type="email" name="email" placeholder="Email"/>
        <br>
       
        <input type="password" name="password" placeholder="Contraseña"/>
        <br>
       <input type="text" name="direccion" placeholder="Direccion"/>
        <br>
        <button type="submit">Guardar</button>
    </form>
    </section>
</div>