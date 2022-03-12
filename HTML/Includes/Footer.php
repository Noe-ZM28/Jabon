<link rel="stylesheet" type="text/css" href="../CSS/style_footer.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript'>
    $(document).ready(function(){ 
        $(window).scroll(function(){ 
            if ($(this).scrollTop() > 100) { 
                $('#scroll').fadeIn(); 
            } else { 
                $('#scroll').fadeOut(); 
            } 
        }); 
        $('#scroll').click(function(){ 
            $("html, body").animate({ scrollTop: 0 }, 600); 
            return false; 
        }); 
    });
</script>

<style>
    .aumentar:hover {
        -webkit-transform:scale(1.2);
        transform:scale(1.2);
    }
    #scroll {
    position:fixed;
    right:10px;
    bottom:50px;
    cursor:pointer;
    width:50px;
    height:50px;
    background-color:#3498db;
    text-indent:-9999px;
    display:none;
    -webkit-border-radius:60px;
    -moz-border-radius:60px;
    border-radius:60px
    }
    #scroll span {
        position:absolute;
        top:50%;
        left:50%;
        margin-left:-8px;
        margin-top:-12px;
        height:0;
        width:0;
        border:8px solid transparent;
        border-bottom-color:#ffffff
    }
    #scroll:hover {
        background-color:#e74c3c;
        opacity:1;filter:"alpha(opacity=100)";
        -ms-filter:"alpha(opacity=100)";
    }
</style>
    </body>
    <footer>
        <center>
            <div class="page-content page-container" >
                <div class="padding">
                    <div class="row container d-flex justify-content-center">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h3><?php //echo $_SERVER['REQUEST_URI']?></h3> <!-- Habilitar para que funcione bien el boton dela tienda -->
                                    <h3 class="card-title">¡Siguenos en nuestras redes sociales!</h3>
                                    <div class="template-demo">
                                        <!-- Facebook -->
                                        <a target="_blank" href="https://www.facebook.com/Mageli-Jabones-Naturales--114634313611004/" class="link-dark">
                                            <button type="button" class="btn btn btn-primary btn-lg btn-facebook  aumentar">
                                                <i class="fa fa-facebook"> </i>
                                            </button>
                                        </a>
                                        <!-- Youtube -->
                                        <a target="_blank" href="https://youtube.com/channel/UCRT9u5tefX6DNh4xLVTv3Ag">
                                            <button type="button" class="btn btn btn-primary btn-lg btn-youtube  aumentar" style="background-color: #ed302f;">
                                                <i class="fa fa-youtube"></i>
                                            </button>
                                        </a>
                                        <!-- Twitter -->
                                        <a target="_blank" href="https://twitter.com/MageliJabonesAr?s=09">
                                            <button type="button" class="btn btn btn-primary btn-lg btn-twitter  aumentar" style="background-color: #55acee;">
                                                <i class="fa fa-twitter"></i>
                                            </button>
                                        </a>
                                        <!-- Instagram -->
                                        <a target="_blank" href="https://www.instagram.com/mageli_jabones/" class="link-dark">
                                            <button type="button" class="btn btn btn-primary btn-lg btn-instagram  aumentar" style="background-color: #ac2bac;">
                                                <i class="fa fa-instagram"></i>
                                            </button>
                                        </a> 
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title">¡Contactanos!</h3>
                                    <div class="template-demo">
                                    <?php session_id() ?> 
                                    Número: (+52) XX-XX-XX-XX <br>
                                    E.mail: Contacto@JabonesMageli.com                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </footer>
</html>

<!-- BackToTop Button -->
<a class= "aumentar" href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
