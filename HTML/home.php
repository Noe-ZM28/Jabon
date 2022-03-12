<?php
include_once "funciones.php";
$HEADDER = obtenerVariableDelEntorno("HEADDER");
include_once $HEADDER;
?> 
<style>
    h1, h3{
        color: rgb(10, 46, 5);
    }
    .addbefore:before {
  content: "Show this";
}

.visuallyhidden {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}
</style>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
</head>
<title>Jabones Mageli</title>
<center>
    <div class="container"  style = "background-color:#ffffff;">
        <center><h1 class="title">JabonesMageli</h1>
        <div class="columns">
            <div class="column">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img style="width: 50%;"   src="../Multimedia/Imagenes/banner_2.jpg" class="w-75 p-3" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img style="width: 70%;" src="../Multimedia/Imagenes/banner_3.jpg" class="w-75 p-3" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img style="width: 70%;" src="../Multimedia/Imagenes/banner.jpg" class="w-75 p-3" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>                
            </div>
        </div>
        <center><h1 class="title">¿POR QUÉ UTILIZAR JABONES NATURALES MAGUELI?</h1>
        <div class="columns">
            <div class="column">
                <br>
                <p style="text-align: justify;text-left:inter-word;">
                    <font face="Cambria" SIZE=4 color = "black">
                        Nuestros jabones están hechos con aceites naturales y los mejores productos para darte una deliciosa espuma y limpieza sin descuidar la protección de tu piel.
                        Todo el proceso de transformación lo hacemos en “frío absoluto”, proceso lento y complejo, así el resultado del producto final es muy superior en calidad al que se obtiene con procesos en caliente, en los cuales se pierden muchas de las propiedades intrínsecas de las materias primas utilizadas.
                    </font>
                </p>
            </div>
        </div>
        <center><h1 class="title">BENEFICIOS DE LOS PRODUCTOS MAGUELI</h1>
        <div class="columns">
            <div class="column">
                <p style="text-align: justify;text-left:inter-word;">
                    <font face="Cambria" SIZE=4 color = "black">
                        <ol type="1" style="text-align: justify;text-left:inter-word;">
                            <li>Es suave, calmante e hidratante y ofrece un maravilloso olor.</li>
                            <li>Limpieza Profunda, regula completamente la grasa (oleosidad) en tu piel, hidrata y Nutre; y ayuda a e liminar la piel dañada.</li>
                            <li>Ayuda a controlar la grasa facial, debido a su efecto antibacteriano y antiséptico. Elimina las arrugas de manera natural debido a su rico contenido de colágeno y elastina. </li>
                            <li>Desintoxicante, estimulante para la circulación sanguínea y reafirmantes contra problemas de celulitis y várices.</li>
                            <li>Hidratante y nutritivo para la piel, gran efecto limpiador y exfoliante, antienvejecimiento, natural contra el acné.</li>                                
                        </ol>
                    </font>
                </p>
            </div>
        </div><br>

        <center><h1 class="title">Algunos de nuestros productos</h1>
        <div class="columns is-multiline is-mobile is-centered">
            <?php 
                include_once "funciones.php";
                $productos = obtenerProductos();
                $ids = array();

                foreach ($productos as $producto) {  
                    array_push($ids, $producto->id);
                }
                $r1 = $ids[array_rand($ids)];   
                $r2 = $ids[array_rand($ids)];  
                foreach ($productos as $producto) { 
                    if ($producto->id == $r1 || $producto->id == $r2) {
            ?>
                <!--<div class="column is-one-quarter">-->
                <div class="column is-half aumentar">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title is-centered is-size-5">
                                <?php echo $producto->nombre ?>
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <center>    
                                    <figure>
                                        <img style="width: 100%;
                                                    height: auto;
                                                    object-fit: cover;" 
                                                    src='<?php echo $producto->imagen ?>'>
                                    </figure>
                                </center>
                                <br><br>
                                <p style="text-align: justify;text-left:inter-word;" class="fs-6">
                                    <?php echo $producto->descripcion ?>
                                </p>
                            </div>
                            <center>
                                <h1 class="is-size-3">$<?php echo number_format($producto->precio, 2) ?></h1>
                                <br>
                                <a href="tienda.php">
                                    <span class="button is-success">
                                        <i class="fa fa-check"></i>&nbsp;¡Comprar ahora!
                                    </span>
                                </a>
                            </center>
                        </div>
                    </div>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
        <center><h1 class="title">¿COMO SE FABRICAN LOS PRODUCTOS MAGUELI?</h1>
        <div class="column"
                style= "position: relative;
                        overflow: hidden;
                        width: 90%;
                        height: 65%;
                        padding-top: 56.25%;">
                <iframe  src="https://www.youtube.com/embed/wAM-D8Rl7Ho?start=469"
                        style= "position: absolute;
                                top: 0;
                                left: 0;
                                bottom: 0;
                                right: 0;
                                width: 79%;
                                height: 79%;
                                margin: 0 auto;"
                                allowfullscreen="allowfullscreen">
                </iframe>
        </div>
    </div>
</center>
<?php
    include("Includes/Footer.php");
?>