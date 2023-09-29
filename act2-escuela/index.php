<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuela</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <!-- Navegador -->
    <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper">
            <a href="#!" class="brand-logo center">Actividad 2</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons white-text">menu</i></a>
          </div>   
        </nav>
    </div>

    <div id="text1" class="section white">

        <!-- Formulario -->
        <h2><b>Escuela</b></h2>
        <h3><b>Registro del Alumno</b></h3>
        <form method="post">

            <div class="row">
                <div class="col s12 m6">
                    <label for="idCedula">Cédula</label><br>
                    <input type="text" name="txtCedula" id="idCedula" required><br><br>
                </div>

                <div class="col s12 m6">
                    <label for="idNombre">Nombre</label><br>
                    <input type="text" name="txtNombre" id="idNombre" required><br><br>
                </div>
            </div>
            
            <div class="row">
                <div class="col s12 m4">
                    <label for="idMath">Nota de matemática</label><br>
                    <input type="number" min = "0" max= "20" onpaste = "return false;" name="txtMath" id="idMath" required><br><br>
                </div>
                
                <div class="col s12 m4">
                    <label for="idFisica">Nota de física</label><br>
                    <input type="number"  min = "0" max= "20" onpaste = "return false;" name="txtFisica" id="idFisica" required><br><br>
                </div>

                <div class="col s12 m4">
                    <label for="idProg">Nota de programación</label><br>
                    <input type="number"  min = "0" max= "20" onpaste = "return false;" name="txtProg" id="idProg" required><br><br>
                </div>
            </div>

            <button class="btn waves-effect waves-light" name="btn" type="submit" value="Registro">Registrar
            <i class="material-icons right">send</i>
            </button>

        </form>

        <?php
        
            include_once "calcular.php";

        ?>

    </div>



    <!-- Footer -->
    <footer class="page-footer">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Más información</h5>
                <p class="grey-text text-lighten-4">Actividad 2 de Programación Web</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                <li><a class="grey-text text-lighten-3" href="http://www.virtudvirtual.site">Página Principal</a></li>
                <li><a class="grey-text text-lighten-3" href="https://github.com/Mariduq/pw-act2.git">Github</a></li>
                </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
            © 2023 Copyright. Todos los derechos reservados. <br> Maracaibo - Zulia. Venezuela
            </div>
        </div>
    </footer>

    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="assets/js/index.js"></script>
</body>
</html>