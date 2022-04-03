<?php
include_once "funciones.php";
$HEADDER = obtenerVariableDelEntorno("HEADDER");
include_once $HEADDER;
$temporalDir = $_GET["temporalDir"];
$path_file = $_GET["path_file"];

?> 
<div class="container">
    <title>Gracias por su compra</title>
    <center><h1 class="is-size-2">Gracias por su compra</h1>
    <br><br>
    <div class="card">
        <div class="card-content">
            <p style="text-align: justify;text-left:inter-word;">
                <font face="Cambria" SIZE=4 color = "black">
                    <center>Se ha enviado un e-mail a la direccion proporcionada con los detalles de su compra agradecemos su preferencia
                        <br>Descargue su factura escaneando el siguiente código QR
                        <br>
                        <img src=<?php echo $temporalDir;?> alt="">
                </font>
            </p>       
            <div class="content">
                <br>
                <center><a href="<?php echo $path_file;?>" download rel="noopener noreferrer" target="_blank" class="button is-danger parpadea">Descargar</a>
            </div>
        </div>
        <object data="<?php echo $path_file;?>" type="application/pdf" width="100%" height="800px"> 
            <p>It appears you don't have a PDF plugin for this browser.
            No biggie... you can <a href="<?php echo $path_file;?>">click here to
            download the PDF file.</a></p>  
        </object>

    <div class="content">
        <br>
        <center><a href="tienda.php" class="button is-warning">Regresar</a>
        <br></br>
    </div>
</div>
    <br>
<?php include_once "Includes/Footer.php" ?>


