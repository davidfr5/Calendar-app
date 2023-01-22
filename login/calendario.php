<?php 
require_once('./php/sessions.php');
    check_session();
?>
<html>
<head>
<title>Calendario OnlyFriends!</title>
<link rel="icon" type="image/jpg" href="./images/logo.ico"/>

</head>
<body>
<div id="header">
    <div id="logo"></div>
        <div id="monthBar">
            <button class='buttonMonthBar' id='botonIzq' onclick="showCalendarLeft()"></button>
            <button class='buttonMonthBar' id='botonDer'onclick="showCalendarRight()"></button>
        </div>
        <a id="logout"  title="Cerrar sesión" href="./php/logout.php">Logout</a>
    </div>
    <div id="menuBar">
        <button class='buttonMenuBar' id='doEvent' title="Crear eventos" onclick="abrirEvento()"></button>
        <button class='buttonMenuBar' id='friendsList'  title="Lista de amigos" onclick="listaAmigos()"></button>
        <button class='buttonMenuBar' id='eventReq' title="Solicitudes de amistad" onclick="solicitudAmistad()"></button>
    </div>
    <div id="calendar"></div>
<script>
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState==4 && this.status==200) {
        document.querySelector("#calendar").innerHTML=this.responseText;
       
        }
    };
    xhttp.open("GET", "./prueba2.php", true);
    xhttp.send();
    
    function solicitudAmistad(){
        window.open("./solicitudamistad.php" , "ventana3" , "width=420,height=600,scrollbars=YES")
    }
   function listaAmigos(){
    window.open("./amigoVent.php" , "ventana2" , "width=420,height=600,scrollbars=YES")
   }
   function abrirEvento() {
       window.open("./crearEvento.php" , "ventana1" , "width=520,height=800,scrollbars=YES")
   }
  
   
      
function showCalendarLeft(){
    var fecha=document.querySelector(".trValor > td:last-child").attributes.rel.value;
    var myArray = fecha.split("-");
    var num1= parseInt(myArray[1]);
    var num2=parseInt(myArray[0]);
    num1 = num1-1;
    if(num1<1){num1=12;num2--;}
    document.querySelector("#calendar").innerHTML="";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(this.readyState==4 && this.status==200) {
      
      document.querySelector("#calendar").innerHTML=this.response;
      createCalendar(num1,num2);
  }
  };
  xhttp.open("GET", "./prueba2.php?num1="+num1+"&num2="+num2, true);
  xhttp.send();
}
function showCalendarRight(){
    var fecha=document.querySelector(".trValor > td:last-child").attributes.rel.value;
    var myArray = fecha.split("-");
    var num1= parseInt(myArray[1]);
    var num2=parseInt(myArray[0]);
    num1 = num1+1;
    if(num1>12){num1=1;num2++;}
    document.querySelector("#calendar").innerHTML="";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(this.readyState==4 && this.status==200) {
      
      document.querySelector("#calendar").innerHTML=this.response;
      createCalendar(num1,num2);
  }
  };
  xhttp.open("GET", "./prueba2.php?num1="+num1+"&num2="+num2, true);
  xhttp.send();
}
</script>

</body>


</html>