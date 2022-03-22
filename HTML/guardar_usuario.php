<?php 
include_once "funciones.php";
$HEADDER = obtenerVariableDelEntorno("HEADDER");


if ($_POST["usuario"] == "Administrador") { 
    include_once $HEADDER;?>
    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Error
                </h1>
                <h2 class="subtitle">
                    El nombre de usuario no esta permitido, favor de seleccinar uno diferente.
                </h2>
                <center><a href="formulario_registro.php" class="button is-danger">Regresar</a></center>
            </div>
        </div>
    </section><?php
    include_once "Includes/Footer.php";
} else {
    guardarUsuario($_POST["usuario"], $_POST["apellidos"], $_POST["email"], $_POST["numero"], $_POST["contraseña"]);
    header("Location: formulario_inicio_sesion.php");
}

