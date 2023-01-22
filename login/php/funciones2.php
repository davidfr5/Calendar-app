<?php
require('./conex.php');
require_once('./sessions.php');
    check_session();
 $usuario=$_SESSION['user'];
 $nombre="";
 $usuA="";
 $usuR="";
 $usuS="";
$listAmig = array();

 if(isset($_GET['ana'])){
   $usuA=$_GET['ana'];
   
   anadirAmigo($usuario, $usuA, $listAmig);
 }
 if(isset($_GET['quit'])){
  $usuR=$_GET['quit'];
  quitarAmigo($usuario, $usuR);
}

echo $array_num;
$repe=false;


function anadirAmigo($usuario, $usuA, $listAmig){
$array_num = count($listAmig);
echo "hola";
if($array_num==0){array_push($listAmig, $usuA);$array_num++;
  for ($i = 0; $i < $array_num; ++$i){
    echo $listAmig[$i];
  
  }
 
}
  else{
  for ($i = 0; $i < $array_num; ++$i){
    if($listAmig[$i]==$usuA){
      echo"dsad2";
      //console.log("usuario ya añadido");
      $repe=true;
      break;
    }

  }
  if($repe==false){
    array_push($listAmig, $usuA);$array_num++;
    for ($i = 0; $i < $array_num; ++$i){
      echo $listAmig[$i];
  
    }
  }
}

}
function quitarAmigo($usuario, $usuR){
  $array_num = count($listAmig);
  for ($i = 0; $i < $array_num; $i++){
    if($listAmig[$i]==$usuR){
      unset($listAmig[$i]);
      $repe=true;
      break;
    }

  }
}



?>
