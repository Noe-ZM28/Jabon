<?php 
include_once "funciones.php";
if (isset($_SESSION['username']) and $_SESSION['username'] != "" ) {
    header("Location: tienda.php");
}
$HEADDER = obtenerVariableDelEntorno("HEADDER");
include_once $HEADDER;
?> <br>
<title>Iniciar sesión</title>
    <div class="columns is-centered">
        <div class="box">
            <div class="column is-one-quarterr">
                <center><h2 class="is-size-1">Inicio de sesión</h2>
                <h2 class="is-size-2">Ingrese los datos solicitados</h2></center>
                <br>
                <form action="loggear.php" method="post">
                    <div class="field">
                        <label for="nombre">Nombre de usuario</label>
                        <div class="control">
                        <input required id="usuario" name="usuario" class="input" type="text" placeholder="Nombre de usuario" >
                        </div>
                    </div>
                    <div class="field">
                        <label for="contraseña">Contraseña</label>
                        <div class="control">
                            <input required id="contraseña" name="contraseña" class="input" type="password" placeholder="password" >
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <center>
                                <br>
                                <button class="button is-success">iniciar sesión</button>
                                <a href="formulario_registro.php" class="button is-warning">Registro</a>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include_once "Includes/Footer.php" ?>