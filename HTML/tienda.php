<?php
include_once "funciones.php";
if ($_SESSION['username'] == "") {
    header("Location: formulario_inicio_sesion.php");
    
}
$HEADDER = obtenerVariableDelEntorno("HEADDER");
include_once $HEADDER;
$productos = obtenerProductos();
?>

<style>
    .parpadea_oferta{
    animation-name: parpadeo;
    animation-duration: .7s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;

    -webkit-animation-name:parpadeo;
    -webkit-animation-duration: 2s;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
    z-index: 90;

    -webkit-transform: rotate(-320deg); 
    -moz-transform: rotate(-320deg);
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
    .aumentar:hover {
        -webkit-transform:scale(1.5);
        transform:scale(1.5);
        z-index: 99;
    }
    .btn-flotante {
            font-size: 18px; /* Cambiar el tamaño de la tipografia */
            text-transform: uppercase; /* Texto en mayusculas */
            font-weight: bold; /* Fuente en negrita o bold */
            color: #ffffff; /* Color del texto */
            border-radius: 5px; /* Borde del boton */
            background-color: #48c774; /* Color de fondo */
            padding: 6px 12px; /* Relleno del boton */
            position: fixed;
            bottom: 400px;
            right: 40px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            z-index: 99;
        }
    .btn-flotante:hover {
        background-color: #3CA661; /* Color de fondo al pasar el cursor */
        box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
        transform: translateY(-7px);
    }
    @media only screen and (max-width: 600px) {
        .btn-flotante {
            font-size: 14px;
            padding: 12px 20px;
            bottom: 359px;
            right: 20px;
        }
    } 
    .parpadea {
        animation-name: parpadeo;
        animation-duration: 1s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;

        -webkit-animation-name:parpadeo;
        -webkit-animation-duration: 1s;
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
    .aumentar:hover {
        -webkit-transform:scale(1.5);
        transform:scale(1.5);
        z-index: 99;
    }
</style>

<title>Jabones Mageli - productos</title>

<div class="buttons is-right">
    <!--<a href="productos.php"class="button is-success"> Productos</a>-->
    <a href="ver_carrito.php" class="btn-flotante">
        <strong>Ver carrito
            <?php
            $conteo = count(obtenerIdsDeProductosEnCarrito());
            if ($conteo > 0) {
            ?>
            <strong style="color:red;" class="parpadea"><?php
                printf("(%d)", $conteo);  ?>
            </strong>
            <?php } ?>&nbsp;<i class="fa fa-shopping-cart"></i>
        </strong>
    </a>
</div>
<center>
    <div class="columns">
        <div class="column">
            <br>
            <h2 class="is-size-2">Tienda</h2>
        </div>
    </div>
</center>

<div class="container">
    <br><br>
    <?php
        if (count($productos) <= 0) {
    ?>
        <section class="hero is-info">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Todavía no hay productos
                    </h1>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <div class="columns is-multiline is-mobile is-centered">
            <?php 
                $productos = obtenerProductos(); 
                foreach ($productos as $producto) {
                $id_producto = $producto->id;
                $descripcion_producto = $producto->descripcion;
            ?>
            <!--<div class="column is-one-quarter">-->
            <div class="column is-4-tablet is-3-desktop"><!---->
                <div style="position: relative;">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title is-centered is-size-5">
                                <?php echo $producto->nombre ?>
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="card-image">
                                <figure>
                                    <img class = "aumentar"
                                        style="width: 100%;
                                            height: auto;
                                            object-fit: cover;" 
                                            src='<?php echo $producto->imagen ?>'>
                                </figure>
                            </div>
                            <center>
                            <div class="content"><br>
                                <button id="<?php echo $id_producto ?>" class="button is-danger aumentar" onclick="myFunction(this.id)">
                                    Ver/Ocultar descripción
                                </button>
                                <p id="<?php echo "id_".$id_producto."_descripcion" ?>" style="text-align: justify;text-left:inter-word;display:none ; " class="fs-6">
                                    <br><?php echo $producto->descripcion ?>
                                </p>
                            </div>
                            </center>
                            <center>
                                <h1 class="is-size-3">$<?php echo number_format($producto->precio, 2) ?></h1>
                                <?php if (productoYaEstaEnCarrito($producto->id)) { ?>
                                    <form action="eliminar_del_carrito.php" method="post">
                                        <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                                        <span class="button is-success aumentar">
                                            <i class="fa fa-check"></i>&nbsp;En el carrito
                                        </span>
                                        <button class="button is-danger aumentar">
                                            <i class="fa fa-trash-o"></i>&nbsp;Quitar
                                        </button>
                                    </form>
                                <?php } else { ?>
                                    <form action="agregar_al_carrito.php" method="post">
                                        <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                                        <button class="button is-warning parpadea aumentar">
                                            <i class="fa fa-cart-plus"></i>&nbsp;<strong>Agregar al carrito</strong>
                                        </button>
                                        <h1 class="is-size-4">Cantidad: </h1>
                                        <input required id="cantidad" name="cantidad" class="input" type="number" placeholder="Cantidad" >
                                    </form>
                                <?php } ?>
                            </center>
                        </div>
                    </div>
                </div>                     
                </div>
                <?php } ?>
            </div>
        <?php } ?>  
    </div>
    <script>
        $on = true;
        function myFunction(clicked_id) {
            id = "id_"+clicked_id+"_descripcion";
            $on = !$on;
            if ($on == true){
                document.getElementById(id).style.display = "none";
            }else{
                document.getElementById(id).style.display = "block";
            }
        }
    </script>
<?php include_once "Includes/Footer.php"?> 