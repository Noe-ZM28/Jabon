<?php
if (!isset($_POST["id_producto"])) {
    exit("No hay id_producto");
}else {
    include_once "funciones.php";
    agregarProductoAlCarrito($_POST["id_producto"]);
    header("Location: tienda.php");
}

