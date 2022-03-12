<?php
    $email = $_POST["email"];
    $mensaje_error ="";
    if ($_POST["pago"] == "Seleccione forma de pago"){
        $mensaje_error = "Seleccione una forma de pago";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    }else{
        $mensaje_error = "El correo electronico ingresado no es valido";
    }
?>
<?php
include_once "funciones.php";
$HEADDER = obtenerVariableDelEntorno("HEADDER");
include_once $HEADDER;
?> 
    <div class="container">
        <?php if  ($mensaje_error == ""){
            include_once "funciones.php";
            guardarDatos_Compra($_POST["nombre"], $_POST["apellidos"], $_POST["email"], $_POST["pago"]);
        ?> 
            <title>Gracias por su compra</title>
            <center><h1 class="is-size-2">Gracias por su compra</h1>
            <br><br>
            <div class="card">
                <div class="card-content">
                    <p style="text-align: justify;text-left:inter-word;">
                        <font face="Cambria" SIZE=4 color = "black">
                            <center>Se ha enviado un e-mail a la direccion proporcionada con los detalles de su compra agradecemos su preferencia
                        </font>
                    </p>                    
                </div>
            </div>

            <div class="content">
                <br><br>
                <center><a href="tienda.php" class="button is-warning">Regresar</a>
            </div>
        <?php }else{?>
            <center><h2 class="is-size-2" style="color: red;"><?php echo $mensaje_error?></h2>
            <br>
            <center><a href="formulario_usuario.php" class="button is-warning">Regresar</a>
        <?php }?>
    </div>
    <br>
<?php include_once "Includes/Footer.php" ?>
<!---->