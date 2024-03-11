<?php
//llamada  ala conexion a la BBDD
require_once "conexion.php";
?>


<!------------------------------------------------------------------------->
<!------------------------------------ // VALIDAR Y VERIFICAR el NEWSLEETER -->
<!-------------------------------------------------------------------------->
<?php

// Definición de la función
function validarNewsletter($conexion)
{
    //Si exite pulsar entrar
    if (isset($_POST["altaNewslatter"])) {

        $emailAltaBajaNewsletter = isset($_POST['emailAltaBajaNewsletter']) ? $_POST['emailAltaBajaNewsletter'] : "";
        $aceptoTerminos = isset($_POST['aceptoTerminos']) ? $_POST['aceptoTerminos'] : "";

        //VARIABLES
        // $emailAltaBajaNewsletter = $_POST['emailAltaBajaNewsletter'];
        // $aceptoTerminos = $_POST['aceptoTerminos'];
        //Validar Casillas Vacias y su valor
        $erCorreo = "/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/";


        // MOSTRAR ERRORES
        if ($emailAltaBajaNewsletter == "") {
            //Creamos variable de mensaje concreto en cada caso
            $errorNewsletter = "Casilla Vacía. Debes escribir un correo electrónico";
?>
            <script src="script.js"></script>
            <script>
                mostrarMensajeError("<?php echo $errorNewsletter; ?>"); // Llama a la función definida en script.js para mostrar el mensaje de error
            </script>
        <?php

        } else if (!preg_match($erCorreo, $emailAltaBajaNewsletter)) {
            //Creamos variable de mensaje concreto en cada caso
            $errorNewsletter = "Error. Tipo de email no válido";
        ?>
            <script src="script.js"></script>
            <script>
                mostrarMensajeError("<?php echo $errorNewsletter; ?>"); // Llama a la función definida en script.js para mostrar el mensaje de error
            </script>
        <?php
        } else if ($aceptoTerminos != '1') {
            //VALIDAR LA CASILLA DE TERMINOS
            //Creamos variable de mensaje concreto en cada caso
            $errorNewsletter = "Debes aceptar los términos y condiciones";
        ?>
            <script src="script.js"></script>
            <script>
                mostrarMensajeError("<?php echo $errorNewsletter; ?>"); // Llama a la función definida en script.js para mostrar el mensaje de error
            </script>
            <?php
        } else {
            // comprueba si el correo existe

            //CONSULTAR Y COMPROBAR USUARIOS
            $todosCorreosNews = mysqli_query($conexion, "select * from newsletter");
            /* Devuelve el número de (filas) usuarios en una matriz*/
            $numrFilCorreoNews = mysqli_num_rows($todosCorreosNews);
            //recorre todos los correos, y si coincide correo actual con correo del usuario, coincide será true
            $coincide = false; //no coincide
            if ($numrFilCorreoNews > 0) {
                for ($i = 0; $i < $numrFilCorreoNews; $i++) {
                    /* El resultado es realmente una matriz y voy cogiendo por filas con esa función*/
                    $fila = mysqli_fetch_array($todosCorreosNews, MYSQLI_ASSOC);
                    // print_r ($fila). "<br>"; //para imprimir la matriz fila
                    if ($fila["email"] === $emailAltaBajaNewsletter) {
                        $coincide = true;
                    }
                }
            }

            //si coincide es false, y acepta los terminos es 1, muestra error
            if ($coincide && $aceptoTerminos = '1') {
                //Creamos variable de mensaje concreto en cada caso
                $errorNewsletter = "Este correo ya está suscrito a nuestra newsletter";
            ?>
                <script src="script.js"></script>
                <script>
                    mostrarMensajeError("<?php echo $errorNewsletter; ?>"); // Llama a la función definida en script.js para mostrar el mensaje de error
                </script>
                <?php
            } else {
                //----SI no existe, ejecuta...

                //...añade el nuevo registro
                $nuevoRegistroEmailNewsletter = "INSERT INTO newsletter  (email) VALUES ('$emailAltaBajaNewsletter')";

                //...verifica que se ha echo el registro
                if ($conexion->query($nuevoRegistroEmailNewsletter) === TRUE) {

                    //...Muestra el mensaje al usuario de correcto
                    //Creamos variable de mensaje concreto en cada caso
                    $correctoNewsletter = "Correo dado de alta corréctamente";
                ?>
                    <script src="script.js"></script>
                    <script>
                        mostrarMensajeCorrecto("<?php echo $correctoNewsletter; ?>"); // Llama a la función definida en script.js para mostrar el mensaje de error
                    </script>
<?php

                    // //...manda el correo de verificación
                    // include("verificarNewsletter.php");

                } else {
                    echo "Error al insertar el registro: " . $nuevoRegistroEmailNewsletter . "<br>" . $conexion->error;
                }
            } ///fin de else, comprobar si es true o false
        }
    }
}
?>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


<!------------------------------------------------------------------------->
<!------------------------------------ // DAR DE BAJA DEL NEWSLETTER -->
<!-------------------------------------------------------------------------->
<?php

// Definición de la función
function bajaNewsletter($conexion)
{
    //Si exite pulsar entrar
    if (isset($_POST["bajaNewslatter"])) {
        $emailAltaBajaNewsletter = isset($_POST['emailAltaBajaNewsletter']) ? $_POST['emailAltaBajaNewsletter'] : "";

        //VARIABLES
        // $emailAltaBajaNewsletter = $_POST['emailAltaBajaNewsletter'];
        // $aceptoTerminos = $_POST['aceptoTerminos'];
        //Validar Casillas Vacias y su valor
        $erCorreo = "/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/";


        // MOSTRAR ERRORES
        if ($emailAltaBajaNewsletter == "") {
            //Creamos variable de mensaje concreto en cada caso
            $errorNewsletter = "Casilla Vacía. Debes escribir un correo electrónico";
?>
            <script src="script.js"></script>
            <script>
                mostrarMensajeError("<?php echo $errorNewsletter; ?>"); // Llama a la función definida en script.js para mostrar el mensaje de error
            </script>
        <?php

        } else if (!preg_match($erCorreo, $emailAltaBajaNewsletter)) {
            //Creamos variable de mensaje concreto en cada caso
            $errorNewsletter = "Error. Tipo de email no válido";
        ?>
            <script src="script.js"></script>
            <script>
                mostrarMensajeError("<?php echo $errorNewsletter; ?>"); // Llama a la función definida en script.js para mostrar el mensaje de error
            </script>
            <?php
        } else {
            // comprueba si el correo existe

            //CONSULTAR Y COMPROBAR USUARIOS
            $todosCorreosNews = mysqli_query($conexion, "select * from newsletter");
            /* Devuelve el número de (filas) usuarios en una matriz*/
            $numrFilCorreoNews = mysqli_num_rows($todosCorreosNews);
            //recorre todos los correos, y si coincide correo actual con correo del usuario, coincide será true
            $coincide = false; //no coincide
            //Recorremos los resultados de la busqueda
            if ($numrFilCorreoNews > 0) {
                for ($i = 0; $i < $numrFilCorreoNews; $i++) {
                    /* El resultado es realmente una matriz y voy cogiendo por filas con esa función*/
                    $fila = mysqli_fetch_array($todosCorreosNews, MYSQLI_ASSOC);
                    // print_r ($fila). "<br>"; //para imprimir la matriz fila
                    //si fila email es igual a email pasado, coincide es true (coindicen)
                    if ($fila["email"] === $emailAltaBajaNewsletter) {
                        $coincide = true;
                    }
                }
            }

            //si coincide es true, elimina el registro
            if ($coincide) {

                //...añade el nuevo registro
                $borrarEmailNewsletter = "DELETE FROM newsletter WHERE email = '$emailAltaBajaNewsletter'";

                //Creamos variable de mensaje concreto en cada caso
                $bajaNewsletter = "El correo se ha dado de baja correctamente";

                //...verifica que se ha echo el registro
                if ($conexion->query($borrarEmailNewsletter) === TRUE) {

                    //...Muestra el mensaje al usuario de correcto
                    //Creamos variable de mensaje concreto en cada caso
                    $mensajeBajaCorrectoNewsletter = "Correo dado de baja corréctamente";
            ?>
                    <script src="script.js"></script>
                    <script>
                        mostrarMensajeCorrecto("<?php echo $mensajeBajaCorrectoNewsletter; ?>"); // Llama a la función definida en script.js para mostrar el mensaje de error
                    </script>
                <?php
                } else {
                    echo "Error al insertar el registro: " . $borrarEmailNewsletter . "<br>" . $conexion->error;
                }
            } else {
                $mensajeBajaIcCorrectoNewsletter = "El correo proporcionado no se encuentra en nuestra newsletter";
                ?>
                <script src="script.js"></script>
                <script>
                    mostrarMensajeError("<?php echo $mensajeBajaIcCorrectoNewsletter; ?>"); // Llama a la función definida en script.js para mostrar el mensaje de error
                </script>
<?php


            } ///fin de else, comprobar si es true o false
        }
    }
}
?>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


<!------------------------------------------------------------------------->
<!------------------------------------ // LOGIN USUARIO -->
<!-------------------------------------------------------------------------->
<?php

function loginUsuario($conexion)
{

    $usuarioJugador = isset($_POST['usuarioJugador']) ? $_POST['usuarioJugador'] : "";
    $passwordUsuario = isset($_POST['passwordUsuario']) ? $_POST['passwordUsuario'] : "";


    if (isset($_POST["entrar"])) {
        //Comporbar que correo no este vacio
        // MOSTRAR ERRORES
        //Validar Casillas Vacias y su valor
        $erCorreo2 = "/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/";

        if ($usuarioJugador == "") {
            //Creamos variable de mensaje concreto en cada caso
            $ErrorLoginUsuario = "El usuario está vacio";
?>
            <script src="script.js"></script>
            <script>
                mostrarMensajeError("<?php echo $ErrorLoginUsuario; ?>"); // Llama a la función definida en script.js para mostrar el mensaje de error
                // Colocar el foco en el input
                document.getElementById('usuarioJugador').focus(); //ponemos la atencion sobre ese input
            </script>
        <?php

        } else if ($passwordUsuario == "") {
            //Creamos variable de mensaje concreto en cada caso
            $ErrorLoginContrasena = "La contraseña está vacía";
        ?>
            <script src="script.js"></script>
            <script>
                mostrarMensajeError("<?php echo $ErrorLoginContrasena; ?>"); // Llama a la función definida en script.js para mostrar el mensaje de error
                document.getElementById('passwordUsuario').focus(); //ponemos la atencion sobre ese input
            </script>
        <?php
        } else if (!preg_match($erCorreo2, $usuarioJugador)) {
            //Creamos variable de mensaje concreto en cada caso
            $ErrorLoginUsuarioCorreo = "Error. Tipo de email no válido";
        ?>
            <script src="script.js"></script>
            <script>
                mostrarMensajeError("<?php echo $ErrorLoginUsuarioCorreo; ?>"); // Llama a la función definida en script.js para mostrar el mensaje de error
                document.getElementById('usuarioJugador').focus(); //ponemos la atencion sobre ese input
            </script>
            <?php
        } else {
            //CONSULTAR Y COMPROBAR USUARIOS
            $todosJugadores = mysqli_query($conexion, "select * from jugadores");
            /* Devuelve el número de (filas) usuarios en una matriz*/
            $numrFilJugadores = mysqli_num_rows($todosJugadores);
            //busca el usuario con esa contraseña. Si usuario y contraseña coinciden, crea sesion
            $coincide = false; //no coincide
            //RECORRO TODOS LOS USUARIOS Y si el Usuario y contraseña son iguales a los indicados por usuario Abre pagina de registros
            if ($numrFilJugadores > 0) {
                for ($i = 0; $i < $numrFilJugadores; $i++) {
                    /* El resultado es realmente una matriz y voy cogiendo por filas con esa función*/
                    $fila = mysqli_fetch_array($todosJugadores, MYSQLI_ASSOC);
                    // print_r ($fila). "<br>"; //para imprimir la matriz fila
                    if ($fila["email"] === $usuarioJugador && $fila["contrasenaJugador"] === $passwordUsuario) {
                        $coincide = true;
                    }
                }
            }

            if ($coincide) {
                //Creamos variable de mensaje concreto en cada caso
                $loginUsuarioCorrecto = "Usuario Correcto";
            ?>
                <script src="script.js"></script>
                <script>
                    mostrarMensajeCorrecto("<?php echo $loginUsuarioCorrecto; ?>"); // Llama a la 
                </script>
            <?php

                //CREACION DE SESION LOGIN USUARIO
                //creo la sesion llamada sesionJugador = datos pasado post llamado usuarioJUgador
                $_SESSION['sesionJugador'] = $_POST['usuarioJugador']; //CREAMOS SESION USUARIO

            } else {
                //Creamos variable de mensaje concreto en cada caso
                $loginUsuarioInCorrecto = "Contraseña Incorrecta";
            ?>
                <script src="script.js"></script>
                <script>
                    mostrarMensajeError("<?php echo $loginUsuarioInCorrecto; ?>"); // Llama a la 
                </script>
<?php
            }
        }
    }
}

?>