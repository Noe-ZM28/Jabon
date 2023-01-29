<?php
session_start();


# F U N C I O N E S  D E  U S O  G L O B A L
#---------------------------------------------------------------------------
    function obtenerVariableDelEntorno($key){
        if (defined("_ENV_CACHE")) {
            $vars = _ENV_CACHE;
        } else {
            $file = "env.php"; //Archivo de variables de entorno
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
    function obtenerConexion(){ //conectar a la base de datos
        $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
        $user = obtenerVariableDelEntorno("MYSQL_USER");
        $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");

        try {
            $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
        } catch (PDOException $e) {
            print "¡Error al conectar con la base de datos, favor de verificar datos de conexión!: " . $e->getMessage() . "<br/>";
            die();
        }

        $database->query("set names utf8;"); // admitir conjuntos de caracteres
        $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //si hay un error en SQL, PDO lanzará excepciones y el script dejará de ejecutarse
        $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $database;
    }
#---------------------------------------------------------------------------

# F U N C I O N E S  P A R A   A D M I N I S T R A R  U S U A R I O S
#---------------------------------------------------------------------------
    function guardarUsuario($usuario, $apellidos, $email, $numero, $direccion, $contraseña){
        $bd = obtenerConexion();

        $sentencia = $bd->prepare("INSERT INTO usuarios(usuario, nombre_apellidos, email, numero, direccion, password, nivel) VALUES(?, ?, ?, ?, ?, ?, ?)");
        return $sentencia->execute([$usuario, $apellidos, $email, $numero, $direccion, $contraseña, "usuario"]);
    }
    function obtenerDatosUsuario($username){
        $bd = obtenerConexion();
    
        $sentencia = $bd->prepare("SELECT *
                                   FROM usuarios
                                   WHERE usuarios.usuario = ?");
        
        $sentencia->execute([$username]);
        return $sentencia->fetchAll();
    }
#---------------------------------------------------------------------------

# F U N C I O N E S   D E  L O G I N  Y  L O G O U T
#---------------------------------------------------------------------------
    function login(){
        $bd = obtenerConexion();
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

        $sentencia = $bd->query("SELECT COUNT(*) FROM usuarios where usuarios.usuario = '$usuario' and usuarios.password = '$contraseña'");

        if ($sentencia->fetchColumn() == 1) {
            $_SESSION['username'] = $usuario;
            header("Location: tienda.php");
        } else {
            $_SESSION['username'] = "";
            $HEADDER = obtenerVariableDelEntorno("HEADDER");
            include_once $HEADDER;?>

            <section class="hero is-info">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            <center>Error al iniciar sesión, favor de verificar los datos ingresados</center>
                        </h1>
                    </div>
                    <div class="field">
                        <div class="control">
                            <center>
                                <br>
                                <a href="formulario_inicio_sesion.php" class="button is-success">Iniciar sesión</a>
                                <a href="formulario_registro.php" class="button is-warning">Registro</a>
                            </center>
                        </div>
                    </div>
                </div>
            </section>
            <?php include_once "Includes/Footer.php" ?> 
        <?php
        }
    }
    function logout(){
        quitarTodosProductoDelCarrito();
        session_destroy();
        // Posibles estados se sesion:
        //  - PHP_SESSION_DISABLED = 0
        //  - PHP_SESSION_NONE     = 1
        //  - PHP_SESSION_ACTIVE   = 2
        setcookie(session_name(), session_id(), 1); // to expire the session
        $_SESSION = [];
        header("Location: formulario_inicio_sesion.php");
    }
#---------------------------------------------------------------------------

# F U N C I O N E S  P A R A   A D M I N I S T R A R  P R O D U C T O S
#---------------------------------------------------------------------------
    function guardarProducto($imagen, $nombre, $precio, $descripcion){
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
    function actualizarProducto($id, $nombre, $descripcion, $precio){
        $bd = obtenerConexion();
        
        $sentencia = $bd->prepare(" UPDATE `productos` SET `nombre` = '$nombre', `descripcion` = '$descripcion', `precio` = '$precio' WHERE `productos`.`id` = ?");
        return $sentencia->execute([$id]);
    }
    function eliminarProducto($id){
        $bd = obtenerConexion();

        /*$sentencia = $bd->prepare("SELECT productos.imagen FROM `productos` WHERE id = ?");
        $sentencia->execute([$id]);
        $imagen_eliminada = print_r($sentencia);
        exit($imagen_eliminada);
        unlink($imagen_eliminada);*/

        $sentencia = $bd->prepare("DELETE FROM productos WHERE id = ?");

        return $sentencia->execute([$id]);
    }
    function obtenerProductos(){
        $bd = obtenerConexion();

        $sentencia = $bd->query("SELECT id, imagen, nombre, descripcion, precio FROM productos");
        return $sentencia->fetchAll();
    }
#---------------------------------------------------------------------------

# F U N C I O N E S  P A R A   A D M I N I S T R A R  C A R R I T O  D E  C O M P R A
#---------------------------------------------------------------------------
    function agregarProductoAlCarrito($idProducto, $cantidad){
        $idSesion = session_id();
        $bd = obtenerConexion();
        $user = $_SESSION['username'];

        // Ligar el id del producto con el usuario a través de la sesión    
        $sentencia = $bd->prepare("INSERT INTO carrito_usuarios(id_sesion, id_producto, cantidad, usuario) VALUES (?, ?, ?, ?)");
        return $sentencia->execute([$idSesion, $idProducto, $cantidad, $user]);
    }
    function quitarProductoDelCarrito($idProducto){
        $bd = obtenerConexion();
        $idSesion = session_id();

        $sentencia = $bd->prepare("DELETE FROM carrito_usuarios WHERE id_sesion = ? AND id_producto = ?");
        return $sentencia->execute([$idSesion, $idProducto]);
    }    
    function quitarTodosProductoDelCarrito(){
        $bd = obtenerConexion();
        
        $sentencia = $bd->prepare("DELETE FROM carrito_usuarios");
        return $sentencia->execute();
    } 
    function obtenerIdsDeProductosEnCarrito(){
        $bd = obtenerConexion();
        $idSesion = session_id();

        $sentencia = $bd->prepare("SELECT id_producto FROM carrito_usuarios WHERE id_sesion = ?");
        
        $sentencia->execute([$idSesion]);
        return $sentencia->fetchAll(PDO::FETCH_COLUMN);
    }    
    function productoYaEstaEnCarrito($idProducto){
        $bd = obtenerConexion();

        $ids = obtenerIdsDeProductosEnCarrito();
        foreach ($ids as $id) {
            if ($id == $idProducto) return true;
        }
        return false;
    }
    function obtenerProductosEnCarrito(){
        $bd = obtenerConexion();
        $idSesion = session_id();

        $sentencia = $bd->prepare("SELECT *
                                   FROM productos
                                   INNER JOIN carrito_usuarios
                                   ON productos.id = carrito_usuarios.id_producto
                                   WHERE carrito_usuarios.id_sesion = ?");
        
        $sentencia->execute([$idSesion]);
        return $sentencia->fetchAll();
    }
#---------------------------------------------------------------------------

# F U N C I O N E S  P A R A   A D M I N I S T R A R  C O M P R A
#---------------------------------------------------------------------------
    function EnviarDatos_Compra($path_file){
        $datosUsuario = obtenerDatosUsuario($_SESSION['username']);

        $nickUsuario = "";
        $nombreUsuario = "";
        $emailUsuario = "";
        $numeroUsuario = "";
        $direccionUsuario = "";

        foreach ($datosUsuario as $dato) {
            $nickUsuario = $dato->usuario;
            $nombreUsuario = $dato->nombre_apellidos;
            $emailUsuario = $dato->email;
            $numeroUsuario = $dato->numero;
            $direccionUsuario = $dato->direccion;
        }

        // just edit these 
        $to          = $emailUsuario; // addresses to email pdf to
        $from = 'Contacto@JabonesMageli.com'; // address message is sent from
        $subject = "Notificación de compra en JabonesMageli";  // email subject
        $body        = "<p>The PDF is attached.</p>"; // email body
        $pdfLocation = $path_file;//"./your-pdf.pdf"; // file location
        $pdfName     = $path_file;//"pdf-file.pdf"; // pdf file name recipient will get
        $filetype    = "application/pdf"; // type

        // creates headers and mime boundary
        $eol = PHP_EOL;
        $semi_rand     = md5(time());
        $mime_boundary = "==Multipart_Boundary_$semi_rand";
        $headers      .= "\nMIME-Version: 1.0\n"."Content-Type: multipart/mixed;\n"." boundary=\"{$mime_boundary}\"";
        $message = "This is a multi-part message in MIME format.\n\n"."--{$mime_boundary}\n"."Content-Type: text/plain;charset=\"iso-8859-1\n" .
        "Content-Transfer-Encoding: 7bit\n\n" .
        $mainMessage  . "\n\n";

        // add html message body
        $message = "--$mime_boundary$eol" .
            "Content-Type: text/html; charset=\"iso-8859-1\"$eol" .
            "Content-Transfer-Encoding: 7bit$eol$eol$body$eol";

        // fetches pdf
        $file = fopen($pdfLocation, 'rb');
        $data = fread($file, filesize($pdfLocation));
        fclose($file);
        $pdf = chunk_split(base64_encode($data));

        // attaches pdf to email
        $message .= "--$mime_boundary$eol" .
            "Content-Type: $filetype;$eol name=\"$pdfName\"$eol" .
            "Content-Disposition: attachment;$eol filename=\"$pdfName\"$eol" .
            "Content-Transfer-Encoding: base64$eol$eol$pdf$eol--$mime_boundary--";

        // Sends the email
        if(mail($to, $subject, $message, $headers)) {
            //echo "The email was sent.";
        }
        else {
            echo "There was an error sending the mail.";
        }
    }
    function guardarFactura($usuario, $factura){
        $bd = obtenerConexion();
    
        $sentencia = $bd->prepare("INSERT INTO registro_ventas(usuario, factura) VALUES(?, ?)");
        return $sentencia->execute([$usuario, $factura]);
    }
#---------------------------------------------------------------------------

# F U N C I O N E S  P A R A  M A N E J A R  A R C H I V O S  P D F
#---------------------------------------------------------------------------
    include_once "../Librerias/FPDF/fpdf.php";
    include_once "../Librerias/PHPQRCODE/qrlib.php";
    class responsive_TablePDF extends FPDF{
        var $widths;
        var $aligns;
        function SetWidths($w){
            //Set the array of column widths
            $this->widths=$w;
        }
        function SetAligns($a){
            //Set the array of column alignments
            $this->aligns=$a;
        }
        function Row($data){
            //Calculate the height of the row
            $nb=0;
            for($i=0;$i<count($data);$i++)
                $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
            $h=5*$nb;
            //Issue a page break first if needed
            $this->CheckPageBreak($h);
            //Draw the cells of the row
            for($i=0;$i<count($data);$i++){
                $w=$this->widths[$i];
                $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'J';
                //Save the current position
                $x=$this->GetX();
                $y=$this->GetY();
                //Draw the border
                $this->Rect($x,$y,$w,$h);
                //Print the text
                $this->MultiCell($w,5,$data[$i],0,$a);
                //Put the position to the right of the cell
                $this->SetXY($x+$w,$y);
            }
            //Go to the next line
            $this->Ln($h);
        }
        function CheckPageBreak($h){
            //If the height h would cause an overflow, add a new page immediately
            if($this->GetY()+$h>$this->PageBreakTrigger)
                $this->AddPage($this->CurOrientation);
        }
        
        function NbLines($w,$txt){
            //Computes the number of lines a MultiCell of width w will take
            $cw=&$this->CurrentFont['cw'];
            if($w==0)
                $w=$this->w-$this->rMargin-$this->x;
            $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
            $s=str_replace("\r",'',$txt);
            $nb=strlen($s);
            if($nb>0 and $s[$nb-1]=="\n")
                $nb--;
            $sep=-1;
            $i=0;
            $j=0;
            $l=0;
            $nl=1;
            while($i<$nb) {
                $c=$s[$i];
                if($c=="\n") {
                    $i++;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                    continue;
                }
                if($c==' ')
                    $sep=$i;
                $l+=$cw[$c];
                if($l>$wmax){
                    if($sep==-1) {
                        if($i==$j)
                            $i++;
                    }
                    else
                        $i=$sep+1;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                }
                else
                    $i++;
            }
            return $nl;
        }
    }
#---------------------------------------------------------------------------
?>