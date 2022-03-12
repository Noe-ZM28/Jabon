<?php
include_once "funciones.php";

$id_producto = $_POST["id_producto"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];

actualizarProducto($id_producto, $nombre, $descripcion, $precio);
header("Location: productos.php");
