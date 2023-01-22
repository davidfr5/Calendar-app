<?php
require_once('./php/sessions.php');
check_session();
$usuario=$_SESSION['user'];
require('./php/conex.php');
//imprimirAmigos($usuario);
function imprimirSolicitud($usuario){
    /*function connection(){
        $connection_string='mysql:dbname=login;host=127.0.0.1';
        $u='root';
        $k='root12';
        try{
            $bd=new PDO($connection_string,$u,$k);
            return $bd;
        }catch(PDOException $e){
            echo "Error in the database: ".$e->getMessage();
        }
    }*/
    
    try {

             $bd=connection();
             
            $sql2="SELECT * FROM solicitud_amistad WHERE pers2='".$usuario."';";
            $solamigos=$bd->query($sql2);
            $solamigos->execute();
            $contarSols = $solamigos->rowCount();
           
       
           
        } catch (PDOException $e) { // if exception
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    if($contarSols>0){
             foreach($solamigos as $row){
              echo "<div class='solAmi'><label id='label'>".$row['pers1']."</label><input type='button' value='Aceptar' id='acept' class='aceptar'/><input type='button' value='Rechazar' id='recha' class='rechazar'/></div>";
            }
        }else if($contarSols==0){
            echo "<div><p class='notificaciones'>No tienes ninguna solicitud de amistad</p></div>";
        }
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="./css/estiloAmigos.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Solicitud/es de amistad</title>
<script>
    
 document.addEventListener("DOMContentLoaded", () => {
     /*
    const amigos = document.querySelectorAll('.amigos');
    amigos.forEach((amigos) => {
	amigos.addEventListener('mouseenter', (e) => {
		const 
         = e.currentTarget;
		setTimeout(() => {
			amigos.forEach(amigos => amigos.classList.remove('hover'));
			elemento.classList.add('hover');
		}, 300);
	});
});
fila.addEventListener('mouseleave', () => {
	amigos.forEach(amigos => amigos.classList.remove('hover'));
});
*/

var solicitud = document.querySelectorAll('.solAmi');
var nom="";
    solicitud.forEach(function(soli) {
    soli.addEventListener('mouseover', function hover() {
    //var nom = getValue(amigo);
    nom = soli.textContent;
    //alert(typeof nom);
   //console.log(nom);
    
  });

  soli.addEventListener('mouseleave', function leave() {
    


  });
});
var button = document.querySelectorAll('.aceptar');
button.forEach(function(boton){
boton.addEventListener("click", function() {
    console.log(nom);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(this.readyState==4 && this.status==200) {
      
        window.location.reload(true);
  }
  };
  xhttp.open("GET", "./php/funciones.php?noma="+nom, true);
  xhttp.send();
});
});
var button2 = document.querySelectorAll('.rechazar');
button2.forEach(function(boton){
boton.addEventListener("click", function() {
    console.log(nom);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(this.readyState==4 && this.status==200) {
      
        window.location.reload(true);
  }
  };
  xhttp.open("GET", "./php/funciones.php?nomr="+nom, true);
  xhttp.send();
});
});
var button3 = document.querySelector('.agregAm');
var usuAgregado="";
button3.addEventListener("click", function(){
usuAgregado=document.querySelector('#nombre').value;
console.log(usuAgregado);
var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(this.readyState==4 && this.status==200) {
      
        //setTimeout(() => { window.location.reload(true);}, 5000);
        window.location.reload(true);
  }
  };
  xhttp.open("GET", "./php/funciones.php?agreg="+usuAgregado, true);
  xhttp.send();
});
});
</script>
<link rel="icon" type="image/jpg" href="./images/logo.ico"/>
<link rel="stylesheet" href="./css/estiloSolicitud.css">
</head>
<body>

<div>
  <div id="imageFriends"><img src="./images/ButtonReqBG.png" width="184px" height="120px" id="image"/></div>
    <section class="solicitudes">
      <h2>Solicitudes de Amistad:</h2>
      <div><?php imprimirSolicitud($usuario);?></div>
      <fieldset>
    <legend>Agregar Amigos</legend>
    <label for="nombre">Introduzca un usuario:</label>
    <input name="nombre" id="nombre" type="text" tabindex="1" />
    <input name="agregar" id="agreg" type="button" value="Enviar" class="agregAm" />
  </fieldset>
      </section>
</div>
</body>

</html>