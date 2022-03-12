<?php
    function obtenerProductosEnCarrito()
    {
        $bd = obtenerConexion();
        #iniciarSesionSiNoEstaIniciada();
        $sentencia = $bd->prepare("SELECT productos.id, productos.imagen, productos.nombre, productos.descripcion, productos.precio
        FROM productos
        INNER JOIN carrito_usuarios
        ON productos.id = carrito_usuarios.id_producto
        WHERE carrito_usuarios.id_sesion = ?");
        $idSesion = session_id();
        $sentencia->execute([$idSesion]);
        return $sentencia->fetchAll();
    }
    function quitarProductoDelCarrito($idProducto)
    {
        $bd = obtenerConexion();
        #iniciarSesionSiNoEstaIniciada();
        $idSesion = session_id();
        $sentencia = $bd->prepare("DELETE FROM carrito_usuarios WHERE id_sesion = ? AND id_producto = ?");
        return $sentencia->execute([$idSesion, $idProducto]);
    }
    function obtenerProductos()
    {
        $bd = obtenerConexion();
        $sentencia = $bd->query("SELECT id, imagen, nombre, descripcion, precio FROM productos");
        return $sentencia->fetchAll();
    }
    function productoYaEstaEnCarrito($idProducto)
    {
        $ids = obtenerIdsDeProductosEnCarrito();
        foreach ($ids as $id) {
            if ($id == $idProducto) return true;
        }
        return false;
    }
    function obtenerIdsDeProductosEnCarrito()
    {
        $bd = obtenerConexion();
        #iniciarSesionSiNoEstaIniciada();
        $sentencia = $bd->prepare("SELECT id_producto FROM carrito_usuarios WHERE id_sesion = ?");
        $idSesion = session_id();
        $sentencia->execute([$idSesion]);
        return $sentencia->fetchAll(PDO::FETCH_COLUMN);
    }
    function agregarProductoAlCarrito($idProducto)
    {
        // Ligar el id del producto con el usuario a través de la sesión
        $bd = obtenerConexion();
        #iniciarSesionSiNoEstaIniciada();
        $idSesion = session_id();
        $sentencia = $bd->prepare("INSERT INTO carrito_usuarios(id_sesion, id_producto) VALUES (?, ?)");
        return $sentencia->execute([$idSesion, $idProducto]);
    }
    function iniciarSesionSiNoEstaIniciada()
    {
        /*if( !headers_sent() && '' == session_id() ) {
            session_start();
            }*/
        /*if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }*/
        if(session_status() == PHP_SESSION_NONE)
        // if session status is none then start the session
        {
            session_start();
        }
    }
    function eliminarProducto($id)
    {
        $bd = obtenerConexion();
        $sentencia = $bd->prepare("DELETE FROM productos WHERE id = ?");
        return $sentencia->execute([$id]);
    }
    function guardarProducto($imagen, $nombre, $precio, $descripcion)
    {
        $bd = obtenerConexion();

        $directorio = obtenerVariableDelEntorno("DIRECTORIO");
        #$directorio = "../Multimedia/Imagenes/";

        $imagen=$_FILES["imagen"]["name"];
        $ruta=$_FILES["imagen"]["tmp_name"];
        $url_imagen=$directorio.$imagen;
        copy($ruta,$url_imagen);

        #$url_imagen
        $sentencia = $bd->prepare("INSERT INTO productos(imagen, nombre, precio, descripcion) VALUES(?, ?, ?, ?)");
        return $sentencia->execute([$url_imagen, $nombre, $precio, $descripcion]);
    }
    function guardarDatos_Compra($nombre, $apellidos, $email, $pago)
    {
        $to = $email; 
        $from = 'Contacto@JabonesMageli.com'; 
        $fromName = 'Jabones Magueli'; 
        
        $subject = "Notificación de compra en JabonesMageli"; 
        
        $message = file_get_contents("plantilla.php");
        
        // Additional headers 
        $headers = 'From: '.$fromName.'<'.$from.'>'; 
        $headers .= ''."\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        
        // Send email 
        mail($to, $subject, $message, $headers);
    }
    $GLOBALS['tipo_pago'] = "";
    function setGlobalVariable($variable)
    {
        $GLOBALS['tipo_pago'] = $variable;
    }

    function obtenerVariableDelEntorno($key)
    {
        if (defined("_ENV_CACHE")) {
            $vars = _ENV_CACHE;
        } else {
            $file = "env.php";
            if (!file_exists($file)) {
                throw new Exception("El archivo de las variables de entorno ($file) no existe. Favor de crearlo");
            }
            $vars = parse_ini_file($file);
            define("_ENV_CACHE", $vars);
        }
        if (isset($vars[$key])) {
            return $vars[$key];
        } else {
            throw new Exception("La clave especificada (" . $key . ") no existe en el archivo de las variables de entorno");
        }
    }
    function obtenerConexion()
    {
        $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");
        $user = obtenerVariableDelEntorno("MYSQL_USER");
        $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
        $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
        $database->query("set names utf8;");
        $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $database;
    }