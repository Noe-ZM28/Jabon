<?php 
include_once "funciones.php";
//header("Location: formulario_usuario.php");
#haqcer algo con los datos de compra
$productos = obtenerProductosEnCarrito();

# Puede que solo quieras los ids, para ello invoca a obtenerIdsDeProductosEnCarrito();
var_dump($productos);
