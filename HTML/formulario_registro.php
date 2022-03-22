<?php 
include_once "funciones.php";
if (isset($_SESSION['username']) and $_SESSION['username'] != "" ) {
    header("Location: tienda.php");
}
$HEADDER = obtenerVariableDelEntorno("HEADDER");
include_once $HEADDER;
?> <br>
<title>Registro</title>
    <div class="columns is-centered">
        <div class="box">
            <div class="column is-one-quarterr">
                <center><h2 class="is-size-1">Registro</h2>
                <h2 class="is-size-2">Ingrese los datos solicitados</h2></center>
                <br>
                <br>
                <form action="guardar_usuario.php" method="post">
                    <div class="field">
                        <label for="nombre">Nombre de usuario</label>
                        <div class="control">
                            <input required id="usuario" name="usuario" class="input" type="text" placeholder="Nombre" >
                        </div>
                    </div>
                    <div class="field">
                        <label for="nombre">Nombre y Apellidos</label>
                        <div class="control">
                            <input required id="apellidos" name="apellidos" class="input" type="text" placeholder="Apellidos" >
                        </div>
                    </div>
                    <div class="field">
                        <label for="nombre">E-mail (Solo Gmail)</label>
                        <div class="control">
                            <input required id="email" name="email" class="input" type="email" placeholder="email" >
                        </div>
                    </div>
                    <div class="field">
                        <label for="nombre">Número de celular</label>
                        <div class="control">
                            <input required id="numero" name="numero" class="input" type="number" placeholder="Número de celular" >
                        </div>
                    </div>
                    <div class="field">
                        <label for="contraseña">Contraseña</label>
                        <div class="control">
                            <input required id="contraseña" name="contraseña" class="input" type="password" placeholder="email" >
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <center>
                                <br>
                                <button class="button is-success">Terminar</button>
                                <a href="tienda.php" class="button is-warning">Cancelar</a>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include_once "Includes/Footer.php" ?>