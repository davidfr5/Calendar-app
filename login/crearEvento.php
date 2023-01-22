<?php
require_once('./php/sessions.php');
check_session();
$usuario=$_SESSION['user'];
require('./amigos.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/jpg" href="./images/logo.ico"/>
<link rel="stylesheet" href="./css/estiloCrearEv.css">
<link rel="stylesheet" href="./css/estiloEvent.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Crear Evento</title>
<script>
 
</script>
</head>

<body>

<form action="./php/crearEvento.php" method="post">
<div id="imageFriends"><img src="./images/ButtonEventBG.png" width="184px" height="120px" id="image"/></div>
    <section class="evento">
      <h2>Crear evento</h2>
      <p><label id="labelEvent">Nombre del evento:</label></p>
      <input class="" id="nomEvent" type="text" name="nomEvento" value=""  placeholder="Nombre del evento" required><br>
      <p><label id="DescEvent">Descripcion:</label></p>
      <textarea id="Desc" name="desc" rows="4" cols="50" placeholder="Introduzca descripcion"></textarea><br>
      <p><label id="fechEvent">Fecha:</label></p>
      <input type="date" id="fecha" name="fecEv" value="" min="2018-01-01" required><br>
      <input type="text" id="probandoCosas" name="datos123"/>
      <div><p>Que amigos quieres añadir:</p>
      <input type='button' value='añadir todos' id='crearButt' class='anadirtod' style="margin-bottom:10px"/>
      <input type='button' value='quitar todos' id='LimButt' class='quitartod' style="margin-bottom:10px"/>
      <div class='amigB'>
        <?php anadirAmigos($usuario);?></div>
        </div>
        <div id="x1">
        <input id="crearButt" class="funcionamiento" type="button" name="dsa" value="Crear Evento"><input class="" id="LimButt" type="reset" value="Limpiar Datos"></div>
        <input class="" id="funcionam" type="submit" name="" value="Crear" onclick="cerrar()">
      
        

      </section>
  </form>
 
</body>

</html>