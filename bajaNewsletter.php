<?php
require_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- LINK ESTILOS -->
  <link rel="stylesheet" href="estilos/estilillos.css" />
  <!-- Enlace con FONTAWESOME -->
  <script src="https://kit.fontawesome.com/ea7d8023a5.js" crossorigin="anonymous"></script>
  <!-- BOOSTRAP-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

  <!-- JAVASCRIPT -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

  <title>HOME</title>
</head>

<body>

  <!-- --------------------------NAVEGADORES RESPONSIVES -->
  <nav>
    <!-- MENU MOVIL -->
    <div class="navegadorMovil">
      <div class="parteNav">
        <a href="index.html"><img src="../Nuevo_D9/img/LOGOTIPO.png" alt="logotipo" /></a>
      </div>

      <div class="parteNav" onclick="toggleSubMenu()" onclick="toggleSubMenu()">
        <img src="../Nuevo_D9/img/menu.png" alt="burger" />

        <div class="submenu" id="submenu">
          <div class="parteburger"><a href="#">D9Experiences</a></div>
          <!-- Nuevo submenú -->
          <div class="subsubmenu" id="subsubmenu">
            <div class="partesubBurger"><a href="#">Distrito 9</a></div>
            <div class="partesubBurger"><a href="#">El Enclave</a></div>
          </div>
          <!-- Fin del nuevo submenú -->
          <div class="parteburger"><a href="#">Partidas</a></div>
          <div class="parteburger"><a href="#">Galería</a></div>

        </div>
      </div>

      <div class="parteNav cajaLogosSesion">
        <div class="logoSesion">
          <a href="logi.html"><img src="../Nuevo_D9/img/usuario.png" alt="burger" /></a>
        </div>

        <div class="logoSesion">
          <a href="cerrar"><img src="../Nuevo_D9/img/salir.png" alt="burger" /></a>
        </div>
      </div>
    </div>

    <!-- MENU ORDENADOR -->
    <div class="navegadorOrdenador" id="cajaDesplegableOrdenador">

      <div class="parteNavOrdena d-flex col-md-2 ">
        <a href="index.html"><img src="../Nuevo_D9/img/LOGOTIPO.png" width="80px" height="80px" alt="logotipo"></a>
      </div>

      <div class="cajaEnlacesOrdena d-flex col-md-8 ">
        <div class="enlacesMenuOrde" id="enlaceMenuD9experiences"><a href="index.html"> D9Experiences</a></div>
        <!-- Submenú desplegable -->
        <div class="submenuDesplegable" id="submenuDesplegable">
          <div class="enlacesSubMenuOrde"><a href="#">Distrito 9</a></div>
          <div class="enlacesSubMenuOrde"><a href="#">El Enclave</a></div>
        </div>
        <!-- Submenú FIN -->
        <div class="enlacesMenuOrde"><a href="index.html"> Partidas</a></div>
        <div class="enlacesMenuOrde"><a href="index.html"> Galería</a></div>

      </div>

      <div class=" cajaLogoSesionOrdena d-flex col-md-2 ">
        <div class="logoSesionOrdena"><a href="logi.html"><img src="../Nuevo_D9/img/usuario.png" alt="burger"></a></div>
        <div class="logoSesionOrdena"><a href="cerrar"><img src="../Nuevo_D9/img/salir.png" alt="burger"></a></div>
      </div>

    </div>

  </nav>


  <!-- -------------------------------BAJA NEWSLETTER -->

  <main>


    <section class="sectionBajaNewsletter">
      <div class="cajanewsLetter margenBajaNewsletter">

        <div class="mensajeNewsletter">
          <h3>Servicio de baja de nuestro NEWSLETTER</h3>
          <p>Si te das de baja de nuestra Newsletter <b>dejarás de recibir información</b> sobre partidas, eventos, promociones y notificaciones.</p>
          <p><b>¿Estás seguro de darte de baja de nuestros servicios?</b></p>
        </div>
        <form class="formularioNewsletter" action="" method="POST">
          <!-- <div class="terminosCondiciones">
              <input type="checkbox" id="aceptoTerminos" name="aceptoTerminos" value="1"> Acepto <a href="#">Términos y Condiciones</a>
            </div> -->
          <div class="cajaDatosNewsletter mt-3">
            <input class="datosNewsletter correoNews d-flex col-8" type="email" id="emailAltaBajaNewsletter" name="emailAltaBajaNewsletter" placeholder=" Correo@ejemplo.com">
            <input class="datosNewsletter enviarNewsletter d-flex col-4" name="bajaNewslatter" type="submit" value="Dar de Baja">
          </div>
        </form>
        <!-- //MENSAJE ERROR -->
        <div id="cajaMensajeErrorNewsletter">
          <!-- //Menjsae de error validacion (DOM) -->
        </div>


      </div>

    </section>




  </main>


  <!-- --------------------------FOOTER -->

  <footer class="footer d-flex col-12">

    <div class="enlacesFooter">
      <a href="#">D9Experiences</a>
      <a href="#">Partidas</a>
      <a href="#">Eventos</a>
      <a href="#">Reservar</a>
      <a href="#">Organizadores</a>
      <a href="#">Contacto</a>
      <a href="#">¿Quieres Colaborar?</a>
      <a href="#">Patrocinadores</a>
    </div>

    <div class="redesSociales">
      <a href="index.html"><img src="../Nuevo_D9/img/whatsapp.png" alt="Whatsaap"></a>
      <a href="index.html"><img src="../Nuevo_D9/img/youtube.png" alt="youtube"></a>
      <a href="index.html"><img src="../Nuevo_D9/img/instagram.png" alt="instagram"></a>
      <a href="index.html"><img src="../Nuevo_D9/img/tik-tok.png" alt="tiktok"></a>
    </div>



    <div class="partner d-flex flex-wrap">

      <div class="col-12 col-sm-12 col-md-6">
        <a href="index.html"><img src="img/d9_experiences_fondo_negro.png" alt="LogotipoD9"></a>
      </div>

      <div class="d-flex flex-wrap p-3 col-12 col-sm-12 col-md-6">
        <p>D9Experiences es una organización privada lucrativa registrada en el registro de propiedades intelectuales y convenio de empresas.</p>
        <p>Todas las imágenes y videos son de uso propio y registradas en el registro de propiedad intelectual. El uso indevido de dichas imágenes podrá suponer motivo de delito contra la propiedad intelectual.</p>
        <p>@D9Experiences Registro Territoral</p>

      </div>
    </div>

  </footer>


  <!------------------------------------ // VALIDAR Y VERIFICAR el NEWSLEETER -->
  <?php
  //llamada a la conexion
  require_once "conexion.php";
  // Incluye el archivo que contiene la función
  include 'funciones.php';
  // Ahora puedes llamar a la función
  bajaNewsletter($conexion);


  ?>


  <!-- <script src="jquery/jquery-3.3.1.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <!-- JAVAESCRIP -->
  <script src="script.js"></script>
  <script src="cambioVideoFondo.js"></script>
</body>

</html>