<?php
if (!isset($_POST["id_producto"])) {
    exit("No hay id_producto");
}else {
    include_once "funciones.php";
    agregarProductoAlCarrito($_POST["id_producto"], $_POST["cantidad"]);
    header("Location: tienda.php");
}

