<?php
include_once "funciones.php";
if ($_SESSION['username'] == "") {
    header("Location: formulario_inicio_sesion.php");
}
$HEADDER = obtenerVariableDelEntorno("HEADDER");
include_once $HEADDER;
?>
<title>Agregar productos</title>

    <div class="columns is-centered">
        <div class="box">
            <div class="column is-one-quarterr">
                <h2 class="is-size-2">Nuevo producto</h2>
                <form action="guardar_producto.php" method="post" enctype="multipart/form-data">
                    <div class="field">
                        <label for="nombre">Nombre</label>
                        <div class="control">
                            <input required id="nombre" name="nombre" class="input" type="text" placeholder="Nombre" >
                        </div>
                    </div>
                    <div class="field">
                        <label for="imagen">Selecciona imagen</label>
                        <div class="control">
                            <input required id="imagen" name="imagen" accept="image/" class="input" type="file"  onchange="loadFile(event)">
                            <center><img id="output" width="200" /></center>

                            <script>
                            var loadFile = function(event) {
                                var image = document.getElementById('output');
                                image.src = URL.createObjectURL(event.target.files[0]);
                            };
                            </script>
                        </div>
                    </div>
                    <div class="field">
                        <label for="descripcion">Descripción</label>
                        <div class="control">
                            <textarea required id="descripcion" name="descripcion" class="textarea" cols="30" rows="5" placeholder="Descripción" ></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <label for="precio">Precio</label>
                        <div class="control">
                            <input required id="precio" name="precio" class="input" type="number" placeholder="Precio">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <center>
                                <br>
                                <button class="button is-success">Guardar</button>
                                <a href="productos.php" class="button is-danger">Volver</a>
                            </center>
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once "Includes/Footer.php" ?>