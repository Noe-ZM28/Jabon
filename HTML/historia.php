<?php
include_once "funciones.php";
$HEADDER = obtenerVariableDelEntorno("HEADDER");
include_once $HEADDER;
?> 
<style>
    h1{
        color: rgb(10, 46, 5);
    }
    
</style>
    <title>Historia</title>
    <br>
    <div class="container"  style = "background-color:#ffffff;">
        <br>
        <center><h1 class="title">Historia</h1>
        <br>
        <div class="tab-content">
            <p style="text-align: justify;text-left:inter-word;">
                <font face="Cambria" SIZE=4 color = "black">
                    Mageli es una tienda que vende todos los productos ecológicos necesarios para un estilo de vida sustentable.
                    Conoce a los creadores
                    El proyecto ha sido elaborado por los alumnos:d
                    <ol style="text-align: justify;text-left:inter-word;">
                        <li>De Jesus Zepeda Ana Lilia</li>
                        <li>Islas García Gabriela</li>
                        <li>Tavera Sánchez Dafne Paola</li>
                        <li>Téllez García Ernesto</li>
                        <li>Zúñiga Morales Noe</li> 
                    </ol><br>
                </font>
                <figure>
                    <img style="width: 60%;
                                height: auto;
                                object-fit: cover;
                                margin: 0 auto;" 
                                src="../Multimedia/Imagenes/banner_2.jpg">
                </figure>            
            </p>
            <p style="text-align: justify;text-left:inter-word;">
                <font face="Cambria" SIZE=4 color = "black">   
                    Con el objetivo de generar un cambio positivo en el mundo, ya que estamos usando demasiado el plástico y estamos viviendo una situación insostenible. 
                    Nos aseguramos de que nuestros productos cumplan con las siguientes tres características:<br> <br>
                    <ol style="text-align: justify;text-left:inter-word;">
                        <li>No dañen al medio ambiente</li>
                        <li>No hagan daño al consumidor</li>
                        <li>No hagan daño a los que lo producen</li><br>
                    </ol>                  
                    <br>
                    Por lo que puedes estar tranquilo de cualquier producto que compres en Mageli.
                </font>
                <figure>
                    <img style="width: 60%;
                                height: auto;
                                object-fit: cover;" 
                                src="../Multimedia/Imagenes/banner_4.jpg">
                </figure>
            </p>
        </div>
    </div>
<?php
    include("Includes/Footer.php");
?>