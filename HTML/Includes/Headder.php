<?php include_once "funciones.php";?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

        <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
        
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="bootstrap" viewBox="0 0 118 94">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
            </symbol>
            <symbol id="home" viewBox="0 0 16 16">
                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"></path>
            </symbol>
            <symbol id="speedometer2" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"></path>
                <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"></path>
            </symbol>
            <symbol id="table" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"></path>
            </symbol>
            <symbol id="people-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path>
            </symbol>
            <symbol id="grid" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </symbol>
            <symbol id="history" viewBox="0 0 16 16">
                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
            </symbol>
            <symbol id="nosotros" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
            </symbol>
        </svg>

        <style>
            .aumentar:hover {
            -webkit-transform:scale(1.2);
            transform:scale(1.2);
            }
            .parpadea {
            animation-name: parpadeo;
            animation-duration: .5s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;

            -webkit-animation-name:parpadeo;
            -webkit-animation-duration: 4s;
            -webkit-animation-timing-function: linear;
            -webkit-animation-iteration-count: infinite;
            }

            @-moz-keyframes parpadeo{  
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
            }

            @-webkit-keyframes parpadeo {  
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
            }

            @keyframes parpadeo {  
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
            }
            .imageRotateHorizontal{
                -moz-animation: spinHorizontal .8s infinite linear;
                -o-animation: spinHorizontal .8s infinite linear;    
                -webkit-animation: spinHorizontal .8s infinite linear;
                animation: spinHorizontal .8s infinite linear;
            }

            @keyframes spinHorizontal {
                0% { transform: rotateY(0deg); }
                100% { transform: rotateY(360deg); }
            }
            .aumentar:hover {
            -webkit-transform:scale(1.5);
            transform:scale(1.5);
            }
        </style>
    </head>
    <header>
        <div class="px-1 py-1 text-dark" style = "background: rgb(97,255,96);background: linear-gradient(0deg, rgba(97,255,96,1) 0%, rgba(255,255,255,1) 100%);">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="home.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none aumentar">
                        <img class ="imageRotateHorizontal"src="../Multimedia/Imagenes/logo_jabon.jpeg" alt="" style="width: 100px;height: 100px;">
                    </a>
                    <center>
                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="home.php" class="nav-link text-dark aumentar">
                                <svg class="bi d-block mx-auto mb-1" width="45" height="45"><use xlink:href="#home"></use></svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="nosotros.php" class="nav-link text-dark aumentar">
                                <svg class="bi d-block mx-auto mb-1" width="45" height="45"><use xlink:href="#nosotros"></use></svg>
                                Sobre nosotros
                            </a>
                        </li>
                        <li>
                            <a href="historia.php" class="nav-link text-dark aumentar">
                                <svg class="bi d-block mx-auto mb-1" width="45" height="45"><use xlink:href="#history"></use></svg>
                                Historia
                            </a>
                        </li>
                        <li>
                            <a href="tienda.php" class="nav-link text-dark aumentar">
                                <div style="position: relative;">
                                <svg style="display: block;" class="bi d-block mx-auto mb-1" width="45" height="45"><use xlink:href="#grid"></use></svg>
                                    Tienda
                                    <span style="color:red;
                                    position: absolute;
                                    top: -10px;
                                    left: 25px;
                                    font-weight: bold;"
                                    class="parpadea"> 10% </span>
                                </div>    
                            </a>
                        </li>
                    </ul>
                    </center>
                </div>
            </div>
        </div>
        
  </header>
    <body style="
    background: rgb(255,255,255);
    background: linear-gradient(0deg,
    rgba(255,255,255,1) 0%, rgba(97,255,96,1) 100%);">
    <?php
    include_once "funciones.php";
    if (isset($_SESSION['username'])) {
        if ($_SESSION['username'] == "Administrador") { ?>
            <div class="card">
                <div class="columns is-mobile">
                    <div class="column">
                        <header class="card-header">
                            <p class="card-header-title">
                                <?php $usuario = $_SESSION['username'];  ?>
                                Bienvenido/a <?php echo $usuario?>
                            </p>
                            <div class="buttons are-medium">
                                <!--<a href="productos.php">
                                    <button class="button is-warning">usuarios</button>
                                </a>-->
                                <a href="productos.php">
                                    <button class="button is-warning">Productos</button>
                                </a>
                                <p>          </p>
                                <a href="logout.php">
                                    <button class="button is-danger">Salir</button>
                                </a>
                            </div>
                            
                        </header>
                    </div>
                </div>
            </div> 
        <?php } elseif ($_SESSION['username'] != "") {?>
            <div class="card">
                <div class="columns is-mobile">
                    <div class="column">
                        <header class="card-header">
                            <p class="card-header-title">
                                <?php $usuario = $_SESSION['username'];  ?>
                                Bienvenido/a <?php echo $usuario?>
                            </p>
                            <div class="buttons are-medium">
                                <a href="logout.php">
                                    <button class="button is-danger">Salir</button>
                                </a>
                            </div>
                        </header>
                    </div>
                </div>
            </div> 
        <?php } ?>
    
    <?php } ?>