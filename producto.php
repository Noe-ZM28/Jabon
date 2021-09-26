<?php
    include("HTML/Includes/Headder.php");
?>    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="font.css.css">
    <link rel="stylesheet" href="social.css">

    <title>Carrito Compras</title>
        <center>
            <div class="container">
                <ul class="navbar-nav mr-auto">
                        <img src="img/cart.jpeg" class="nav-link dropdown-toggle img-fluid" height="70px" width="70px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></img>
                        <div id="carrito" class="dropdown-menu" aria-labelledby="navbarCollapse">
                            <table id="lista-carrito" class="table">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                            <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Vaciar Carrito</a>
                            <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar
                                Compra</a>
                        </div>
                    </li>
                </ul>
            </div>
        </center>

    <main>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
            <h1 class="display-4 mt-4">Lista de Productos</h1>
            <p class="lead">Selecciona cualquiera de nuestros productos y Preciona el icono del carrito para continuar la compra </p>
        </div>

        <div class="container" id="lista-productos">

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">JABON DE AVENA</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/jabaven1.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"> MXN $ <span class="">35</span> </h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Cuida La Piel</li>
                            <li>Totalmente Natural</li>
                            <li>Evita Alergias En La Piel</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">JABON DE CARBON ACTIVADO </h4>
                    </div>
                    <div class="card-body">
                        <img src="img/jabcarb2.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">MXN $ <span class="">35</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Elimina La Grasa De La Piel</li>
                            <li>Elimina Putos Negros</li>
                            <li>Toralmente Natural</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">JABON DE ARROZ</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/jabarr3.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">MXN $ <span class="">35 </span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Aclara La Piel/li>
                                <li>Suavisa La Piel</li>
                                <li>Totalmente Natural</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">JABON DE LAVANDA</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/jablav4.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">MXN $ <span class="">35</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Aroma Duradero</li>
                            <li>Limpia Profundamente</li>
                            <li>Totalmete Natural</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">JABON DE ROSAS</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/jabros5.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">MXN $ <span class="">35</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Cuida La Piel</li>
                            <li>Elimina Grasa</li>
                            <li>Totalmente Natural</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">JABON DE MENTA</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/jabment6.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">MXN $ <span class="">35</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Hidrata La Piel</li>
                            <li>Aroma Refrescante</li>
                            <li>Totalmente Natural</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">JABON DE SAVILA</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/jabsav7.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">MXN $ <span class="">35 </span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Cuida La Piel</li>
                            <li>Vitamina E</li>
                            <li>Totalmente Natural</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">JABON DE JENGIBRE</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/jabjen8.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"> MXN $ <span class="">35</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Reduce La Grasa</li>
                            <li>Adelgasante</li>
                            <li>Totalmente Natural</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">JABON DE LECHE</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/javlech9.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">MXN $ <span class=""> 35</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Hidarata La Piel</li>
                            <li>Proteje conta el sol</li>
                            <li>Totalmente Natural</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>

            </div>


        </div>
    </main>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/carrito.js"></script>
    <script src="js/pedido.js"></script>

<?php
    include("HTML/Includes/Footer.php");
?>