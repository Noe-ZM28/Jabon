<?php
    include("HTML/Includes/Headder.php");
?>
            <title>Jabones</title>
            <div class="container">
                <center><h1>Bienvenida</h1>
                <div class="list-group" id="myList" role="tablist">
                    <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#home" role="tab">Home</a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#messages" role="tab">Mision</a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#settings" role="tab">Vision</a>
                </div>
                </center>
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">a</div>
                    <div class="tab-pane" id="messages" role="tabpanel"><br><p style="text-align: justify;text-justify: inter-word;"><h3>MagEli es una empresa Mexican que produce y comercializa a través de sus marca MagEli jabones naturales ara toda la familia.A través del desarrollo constante y mejoramiento continuo de nuestros procesos y productos satisfacemos las necesidades y requerimientos de nuestros clientes , mejoramos el desempeño y desarrollo de nuestro equipo humano, además de cumplir con responsabilidad social en el entorno donde operamos.</h3></p></div>
                    <div class="tab-pane" id="settings" role="tabpanel"><br><p style="text-align: justify;text-justify: inter-word;"><h3>Ser una empresa innovadora, en permanente crecimiento, que ofrezca al mercado un variado portafolio de productos en el área de aseo e higiene personal, y que supere las expectativas de nuestros clientes de manera armónica y respetuosa con el medio ambiente.Todo esto con el apoyo de un equipo humano comprometido con un buen clima laboral.</h3</p></div>
                </div>

                <script>
                    var firstTabEl = document.querySelector('#myTab a:last-child')
                    var firstTab = new bootstrap.Tab(firstTabEl)

                    firstTab.show()
                </script>
            </div>
<?php
    include("HTML/Includes/Footer.php");
?>