<!-- //Si no, haz la conexión -->
<?php
$conexion = mysqli_connect("localhost", "root", "", "d9_experiences");
/* Para seleccionar la BASE DATOS*/
mysqli_select_db($conexion, "d9_experiences") or die("No se puede seleccionar la BD");
?>