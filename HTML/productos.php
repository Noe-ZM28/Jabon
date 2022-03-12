<?php 
include_once "funciones.php";
$HEADDER = obtenerVariableDelEntorno("HEADDER");
include_once $HEADDER;
?> 

<?php
include_once "funciones.php";
$productos = obtenerProductos();
?>
<div class="columns">
    <div class="column">
        <center><h2 class="is-size-2">Productos existentes</h2></center>
        <div class="column">
        <a class="button is-success" href="agregar_producto.php">Nuevo&nbsp;<i class="fa fa-plus"></i></a>
        <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) { ?>
                        <tr>
                            <td>
                                <figure class="image is-64x64">
                                    <img src='<?php echo $producto->imagen ?>'>
                                </figure>
                            </td>
                            <td><?php echo $producto->nombre ?></td>
                            <td><?php echo $producto->descripcion ?></td>
                            <td>$<?php echo number_format($producto->precio, 2) ?></td>
                            <td>
                                <form action="modificar_producto.php" method="post">
                                    <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                                    <button class="button is-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="eliminar_producto.php" method="post">
                                    <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                                    <button class="button is-danger">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                            </td>
                        <?php } ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once "Includes/Footer.php" ?>