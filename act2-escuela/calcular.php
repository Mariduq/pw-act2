<?php
    //Iniciamos una sesion de PHP
    session_start();

    // Comprobamos que el arreglo de alumnos exista, de no ser asi lo creamos
    if (!isset($_SESSION['alumnos'])) {
        $_SESSION['alumnos'] = [];
    }

    //Verifica si se ha enviado el formulario
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //Obtenemos los datos del formulario
        $cedula = $_POST["txtCedula"];
        $nombre = $_POST["txtNombre"];
        $math = $_POST["txtMath"];
        $fisica = $_POST["txtFisica"];
        $prog = $_POST["txtProg"];

        // Validar que los campos no esten vacios
        if($cedula != "" && $nombre != "" && $math != "" && $fisica != "" && $prog != "") {

            // Validar que la cedula y las notas sean numeros
            if (is_numeric($cedula) && is_numeric($math) && is_numeric($fisica) && is_numeric($prog)) {
                // Crea un arreglo asociativo con los datos
                $alumno = [
                    "cedula" => $cedula,
                    "nombre" => $nombre,
                    "math" => $math,
                    "fisica" => $fisica,
                    "prog" => $prog
                ];

                // Agrega el alumno al arreglo de alumnos en la sesión
                $_SESSION['alumnos'][] = $alumno;
                
                $sumMath = 0;
                $sumFisica = 0;
                $sumProg = 0;

                $aprobadosMath = 0;
                $aplazadosMath = 0;

                $aprobadosFisica = 0;
                $aplazadosFisica = 0;

                $aprobadosProg = 0;
                $aplazadosProg = 0;

                $contAprobadas = 0;
                $aprobados3 = 0;
                $aprobados2 = 0;
                $aprobados1 = 0;

                $maxMath = 0;
                $maxFisica = 0;
                $maxProg = 0;

                foreach($_SESSION['alumnos'] as $alumno){
                    $sumMath = $sumMath + $alumno["math"];
                    $sumFisica = $sumFisica + $alumno["fisica"];
                    $sumProg = $sumProg + $alumno["prog"];

                    //Contamos los alumnos que aprobaron o aplazaron en cada materia
                    if($alumno["math"] >= 9.5) {
                        $contAprobadas++;
                        $aprobadosMath++;
                    } else {
                        $aplazadosMath++;
                    }

                    if($alumno["fisica"] >= 9.5) {
                        $contAprobadas++;
                        $aprobadosFisica++;
                    } else {
                        $aplazadosFisica++;
                    }

                    if($alumno["prog"] >= 9.5) {
                        $contAprobadas++;
                        $aprobadosProg++;
                    } else {
                        $aplazadosProg++;
                    }

                    if($contAprobadas == 3) {
                        $aprobados3++;
                    } elseif($contAprobadas == 2) {
                        $aprobados2++;
                    } elseif($contAprobadas == 1) {
                        $aprobados1++;
                    }

                    $contAprobadas = 0;
                    
                    if($alumno["math"] > $maxMath) {
                        $maxMath = $alumno["math"];
                    }

                    if($alumno["fisica"] > $maxFisica) {
                        $maxFisica = $alumno["fisica"];
                    }

                    if($alumno["prog"] > $maxProg) {
                        $maxProg = $alumno["prog"];
                    }

                }

                //Promedio de cada materia
                $promMath = $sumMath/count($_SESSION['alumnos']);

                $promFisica = $sumFisica/count($_SESSION['alumnos']);

                $promProg = $sumProg/count($_SESSION['alumnos']);


                //Muestra los resultados en pantalla

                
                echo "<br><br><h3><b>Estadísticas</b></h3><br>";

                // Muestra promedio de las materias
                echo "<h5><b>Nota promedio en Matemáticas:</b> ". $promMath. "</h5><br>";
                echo "<h5><b>Nota promedio en Física:</b> ". $promFisica. "</h5><br>";
                echo "<h5><b>Nota promedio en Programación:</b> ". $promProg. "</h5><br><br>";

                //Aprobados y aplazados de las materias
                echo "<h5><b>Número de alumnos aprobados en Matemáticas:</b> ". $aprobadosMath. "</h5><br>";
                echo "<h5><b>Número de alumnos aplazados en Matemáticas:</b> ". $aplazadosMath. "</h5><br><br>";

                echo "<h5><b>Número de alumnos aprobados en Física:</b> ". $aprobadosFisica. "</h5><br>";
                echo "<h5><b>Número de alumnos aplazados en Física:</b> ". $aplazadosFisica. "</h5><br><br>";

                echo "<h5><b>Número de alumnos aprobados en Programación:</b> ". $aprobadosProg. "</h5><br>";
                echo "<h5><b>Número de alumnos aplazados en Programación:</b> ". $aplazadosProg. "</h5><br><br>";

                echo "<h5><b>Número de alumnos que aprobaron todas las materias:</b> ". $aprobados3. "</h5><br>";

                echo "<h5><b>Número de alumnos que aprobaron una sola materia:</b> ". $aprobados1. "</h5><br>";

                echo "<h5><b>Número de alumnos que aprobaron dos materias:</b> ". $aprobados2. "</h5><br><br>";

                //Muestra la nota maxima en cada materia
                echo "<h5><b>Nota máxima en Matemáticas:</b> ". $maxMath. "</h5><br>";
                echo "<h5><b>Nota máxima en Física:</b> ". $maxFisica. "</h5><br>";
                echo "<h5><b>Nota máxima en Programación:</b> ". $maxProg. "</h5><br><br>";


            } else {
                echo "<p>La cédula y las notas deben ser números. </p>";
            }
        } else {
            echo "<p>Los campos no pueden estar vacios. </p>";
        }
        
    }
?>