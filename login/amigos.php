<?php
require_once('./php/sessions.php');
check_session();
$usuario=$_SESSION['user'];
require('./php/conex.php');
//imprimirAmigos($usuario);
function imprimirAmigos($usuario){
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
             
            $sql2="SELECT * FROM amigos WHERE amigo1='".$usuario."'OR amigo2='".$usuario."';";
            $amigos=$bd->query($sql2);
            $amigos->execute();
           
       
           
        } catch (PDOException $e) { // if exception
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    foreach($amigos as $row){
        if($row['amigo1']==$usuario && $row['amigo2']!=$usuario){
        echo "<div class='amigo'>".$row['amigo2']."<input type='button' value='borrar' id='bor' class='borrar'/></div>";}
        else if($row['amigo2']==$usuario && $row['amigo1']!=$usuario){
            echo "<div class='amigo'>".$row['amigo1']."<input type='button' value='borrar' id='bor' class='borrar'/></div>"; }
    }
    }
    function anadirAmigos($usuario){
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
                 
                $sql2="SELECT * FROM amigos WHERE amigo1='".$usuario."'OR amigo2='".$usuario."';";
                $amigos=$bd->query($sql2);
                $amigos->execute();
               
           
               
            } catch (PDOException $e) { // if exception
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        foreach($amigos as $row){
            if($row['amigo1']==$usuario && $row['amigo2']!=$usuario){
            echo "<div class='amig'><label id='label'>".$row['amigo2']."</label><input type='button' value='añadir' id='agreg' class='anadir'/><input type='button' value='quitar' id='recha' class='quitar'/></div>";}
            else if($row['amigo2']==$usuario && $row['amigo1']!=$usuario){
                echo "<div class='amig'><label id='label'>".$row['amigo1']."</label><input type='button' value='añadir' id='agreg' class='anadir'/><input type='button' value='quitar' id='recha' class='quitar'/></div>"; }
        }
        }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="./css/estiloAmigos.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Amigos OnlyFriends!</title>
<script>
    
 document.addEventListener("DOMContentLoaded", () => {
     
var amigos = document.querySelectorAll('.amigo');
var nom="";
    amigos.forEach(function(amigo) {
    amigo.addEventListener('mouseover', function hover() {
    //amigo.setAttribute("style", "background-color:blue;")
    amigo.classList.add('hover');
    //var nom = getValue(amigo);
    nom = amigo.textContent;
    //alert(typeof nom);
   //console.log(nom);
    
  });

  amigo.addEventListener('mouseleave', function leave() {
    //amigo.setAttribute("style", "background-color:green;")
    amigo.classList.remove('hover');

  });
});
//amigos anadir encima

var amigs = document.querySelectorAll('.amig');
var nom2="";
    amigs.forEach(function(amig) {
    amig.addEventListener('mouseover', function hover() {
    //amigo.setAttribute("style", "background-color:blue;")
    amig.classList.add('hover');
    //var nom = getValue(amigo);
    nom2 = amig.textContent;
    //alert(typeof nom);
   //console.log(nom);
    
  });

  amig.addEventListener('mouseleave', function leave() {
    //amigo.setAttribute("style", "background-color:green;")
    amig.classList.remove('hover');

  });
});
//boton anadir

var repe=false;
var anadirAmigos = new Array();
var anadir = document.querySelectorAll('.anadir');
anadir.forEach(function(boton){
boton.addEventListener("click", function() {
    for(let i=0;i<anadirAmigos.length;i++){
        if(anadirAmigos[i]==nom2){
            repe=true;
            alert("Usuario ya habia sido añadido anteriormente");
            break;
        }
    }
    if(repe==false){
        anadirAmigos.push(nom2);
    }
    repe=false;
});
});

//boton quitar
var eliminado=false;
var quitar = document.querySelectorAll('.quitar');
quitar.forEach(function(boton){
boton.addEventListener("click", function() {
    for(let i=0;i<anadirAmigos.length;i++){
        if(anadirAmigos[i]==nom2){
            alert(nom2);
            anadirAmigos.splice(i,1);
            alert("Usuario eliminado");
            eliminado=true;
            break;
        }
    }
    if(eliminado==false){
        alert("El usuario no habia sido añadido anteriormente");
    }
    eliminado=false;
});
});

//quitar todos

var quitartod = document.querySelectorAll('.quitartod');
quitartod.forEach(function(boton){
boton.addEventListener("click", function() {
    for(let i=0;i<anadirAmigos.length;i++){

            anadirAmigos.splice(i);
            
    }
    alert("Se han quitado los usuarios");
});
});

//añadir todos

var amigT=document.querySelectorAll('.amig');
var amigT2="";
var cont=0;
var atod = document.querySelectorAll('.anadirtod');
atod.forEach(function(boton){
boton.addEventListener("click", function() {
    for(let i=0;i<anadirAmigos.length;i++){

     anadirAmigos.splice(i);

    }
   amigT.forEach(function(amig){
    amigT2=amig.textContent;

    anadirAmigos.push(amigT2);
   });
   
    alert("Se han añadido todos los usuarios");
});
});

//enviar

/*
function funcio(){
    for(let i=0; i<anadirAmigos.legnth;i++){
       alert(anadirAmigos[i]);
    }
    for(let i=0; i<anadirAmigos.legnth;i++){
        if(i==0){
            valores = anadirAmigos[i].toString();
            usus += valores;
        }else if(i>0){
            usus += ",";
            valores = anadirAmigos[i].toString();
            usus += valores;
        }
    }

    var inp= document.querySelector('#probandoCosas').value=usus;
    //alert(usus);
}*/
var funs=document.querySelector('#funcionam');
var usus="";
var valores="";
var fun = document.querySelectorAll('.funcionamiento');
fun.forEach(function(boton){
boton.addEventListener("click", function() {
    for(let i=0;i<anadirAmigos.length;i++){

        if(i==0){
            valores = anadirAmigos[i].toString();
            usus=valores;
            alert(usus);
        }else if(i>0){
            
            valores = anadirAmigos[i].toString();
            alert(valores);
            usus=usus.concat(',', valores);
        }

        }
        alert(usus);

    var inp= document.querySelector('#probandoCosas').value=usus;
    //alert(usus);
        funs.click();
});
});

var button = document.querySelectorAll('.borrar');
button.forEach(function(boton){
boton.addEventListener("click", function() {
    console.log(nom);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(this.readyState==4 && this.status==200) {
      
        /*document.querySelector(".recargar").innerHTML="";
        document.querySelector(".recargar").innerHTML=this.response;*/
        window.location.reload(true);
  }
  };
  xhttp.open("GET", "./php/funciones.php?nom="+nom, true);
  xhttp.send();
});
});
});
</script>

</head>
<body>
<!--
<div id="imageFriends"><img src="./images/ButtonFriendsBG.png" width="184px" height="120px" id="image"/></div>
<div id="general">
    <section class="amigos">
      <h2>Amigos</h2>
      <div class="recargar"></div>
      </section>
</div>
-->
</body>

</html>