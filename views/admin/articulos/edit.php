<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar artículo</h1>
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
<form action="?controller=Dashboard&action=edit" method="post" enctype="multipart/form-data">
    
    <input type="number" name="id" value="<?= $articulo->getIdarticulos() ?>" required hidden/>
    
    <input type="text" name="nombre" placeholder="Nombre" value="<?= $articulo->getNombre() ?>" required title="Hay que poner un nombre"/>
    <br>
    <input type="number" name="precio" placeholder="precio" value="<?= $articulo->getPrecio() ?>" required/>
    <br>
    <textarea name="descripcion" placeholder="Desc" required><?= $articulo->getDescripcion() ?></textarea>
    <br>
    <select name="idcategoria">
        <?php foreach($listacategorias as $cat){ ?>
            <option 
                value="<?= $cat->getIdcategoria() ?>" 
                <?php if ($cat->getIdcategoria() == $articulo->getIdcategoria()) echo "selected"; ?> 
            > 
                <?= $cat->getNombre() ?> 
            </option>
        <?php } ?> 
    </select>
    
    <img src="carpeta_destino/<?= $articulo->getImg() ?>" alt="Imagen actual">
    <br>
    
    <input type="file" name="img" accept="image/*"/>
    <br>
    <button type="submit">Guardar</button>
</form>

    </section>
</div>

    