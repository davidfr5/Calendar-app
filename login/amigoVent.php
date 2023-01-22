<?php
require_once('./php/sessions.php');
check_session();
$usuario=$_SESSION['user'];
require('./amigos.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Amigos OnlyFriends</title>
        <link rel="icon" type="image/jpg" href="./images/logo.ico"/>
        <link rel="stylesheet" href="./css/estiloAmigos.css">
</head>
<body>

<div id="imageFriends"><img src="./images/ButtonFriendsBG.png" width="184px" height="120px" id="image"/></div>
<div id="general">
    <section class="amigos">
      <h2>Amigos</h2>
      <div class="recargar"><?php imprimirAmigos($usuario);?></div>
      </section>
</div>
 
</body>

</html>