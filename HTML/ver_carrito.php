<?php
include_once "funciones.php";
if ($_SESSION['username'] == "") {
    header("Location: formulario_inicio_sesion.php");
}
$HEADDER = obtenerVariableDelEntorno("HEADDER");
include_once $HEADDER;

$productos = obtenerProductosEnCarrito();
?> <title>Ver carrito de compras</title> <?php 
if (count($productos) <= 0) {
?> 
<style>
    .parpadea {
    animation-name: parpadeo;
    animation-duration: 2;
    animation-timing-function: linear;
    animation-iteration-count: infinite;

    -webkit-animation-name:parpadeo;
    -webkit-animation-duration: 31;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
    }

    @-moz-keyframes parpadeo{  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
    }

    @-webkit-keyframes parpadeo {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
    }

    @keyframes parpadeo {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
    }
</style>
    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Todavía no hay productos
                </h1>
                <h2 class="subtitle">
                    Visita la tienda para agregar productos a tu carrito
                </h2>
                <center><a href="tienda.php" class="button is-danger">Ver tienda</a></center>
            </div>
        </div>
    </section>
<?php } else { ?>
    <div class="columns">
        <div class="column">
            <center>
                <h2 class="is-size-2">Mi carrito de compras</h2>
            </center>
            <div class="column">
                <a href="vaciar_carrito.php" class="button  is-medium is-danger"><i class="fa fa-ban"></i>Vaciar carrito</a>
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Quitar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($productos as $producto) {
                            $total += $producto->precio;?>
                            <tr>
                                <td>
                                    <figure class="image is-64x64">
                                        <img src='<?php echo $producto->imagen ?>'>
                                    </figure>
                                </td>
                                <td><?php echo $producto->nombre ?></td>
                                <td style="text-align: justify;text-left:inter-word;"><?php echo $producto->descripcion ?></td>
                                <td>$<?php echo number_format($producto->precio, 2) ?></td>
                                <td>
                                    <form action="eliminar_del_carrito.php" method="post">
                                        <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                                        <input type="hidden" name="redireccionar">
                                        <button class="button is-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                                <br>
                            <?php } ?>
                            </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
                            <td colspan="2" class="is-size-4">
                                $<?php echo number_format($total, 2) ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <center>
                    <a href="generar_reporte.php" class="button  is-medium is-success parpadea"><i class="fa fa-check"></i>&nbsp;Terminar compra</a>
                    <a href="tienda.php" class="button  is-medium is-danger"><i class="fa fa-ban"></i>&nbsp;Regresar a la tienda</a>
                    <br>
                </center>  
            </div>
        </div>
    </div>
<?php } ?>
<?php include_once "Includes/Footer.php" ?>
