<?php
include_once "funciones.php";
if ($_SESSION['username'] == "") {
    header("Location: formulario_inicio_sesion.php");
}
$HEADDER = obtenerVariableDelEntorno("HEADDER");
include_once $HEADDER;
$productos = obtenerProductos();

$id_producto = $_POST["id_producto"];
$nombre = $_POST["nombre"];
$imagen = $_POST["imagen"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
?>
<div class="alert alert-danger" role="alert">
    La función de modificar la imagen del producto esta temporalmente deshabilitada por lo que de requerir hacer uso de esta lo recomendable es eliminar el producto y agregarlo nuevamente con la imagen correcta.
</div>
<br><br>
    <div class="columns is-centered">
        <div class="box">
            <div class="column is-one-quarterr">
                <h2 class="is-size-2">Modificar producto</h2>
                <form action="actualizar_producto.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_producto" value="<?php echo $id_producto ?>">
                    <div class="field">
                        <label for="nombre">Nombre</label>
                        <div class="control">
                            <input required id="nombre" name="nombre" class="input" type="text" placeholder="Nombre" value="<?php echo $nombre?>">
                        </div>
                    </div>
                    <div class="field">
                        <label for="imagen">Imagen del producto</label>
                        <div class="control">
                            <center>    
                                <figure>
                                    <img style="width: 400px;
                                                object-fit: cover;" 
                                                src='<?php echo $imagen ?>'>
                                </figure>
                            </center>
                        </div>
                    </div>
                    <div class="field">
                        <label for="descripcion">Descripción</label>
                        <div class="control">
                            <textarea required id="descripcion" name="descripcion" class="textarea" cols="30" rows="7" placeholder="Descripción"><?php echo $descripcion?></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <label for="precio">Precio</label>
                        <div class="control">
                            <input required id="precio" name="precio" class="input" type="number" placeholder="Precio"  value="<?php echo $precio?>">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <center>
                                <br>
                                <button class="button is-success">Guardar</button>
                                <a href="productos.php" class="button is-danger">Volver</a>
                            </center>
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include_once "Includes/Footer.php" ?>