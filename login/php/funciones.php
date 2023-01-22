<?php
require('./conex.php');
require_once('./sessions.php');
    check_session();
 $usuario=$_SESSION['user'];
 $nombre="";
 $usuA="";
 $usuR="";
 $usuS="";
 
 if(isset($_GET['noma'])){
   $usuA=$_GET['noma'];
   aceptarSolicitud($usuario, $usuA);
 }
 if(isset($_GET['nomr'])){
  $usuR=$_GET['nomr'];
  rechazarSolicitud($usuario, $usuR);
}
 if(isset($_GET['nom'])){
   $nombre=$_GET['nom'];
   
   borrarAmigo($usuario, $nombre);
   //imprimirAmigos($usuario);
 }

 if(isset($_GET['agreg'])){
  $usuS=$_GET['agreg'];
              $bd = connection();
              if($usuS!=$usuario){
              $sql123="SELECT * FROM amigos WHERE (amigo1='".$usuario."' AND amigo2='".$usuS."') OR (amigo1='".$usuS."' AND amigo2='".$usuario."');";
              $eS=$bd->query($sql123);
              $eS->execute();
              $contareS = $eS->rowCount();
              if($contareS==0){
 enviarSolicitud($usuario, $usuS);}else{
  echo "Ya agregados";
 }}
}
function borrarAmigo($usuario, $nombre){
            
            $bd=connection();
            $sql2="SELECT cod_amigo FROM amigos WHERE amigo1='".$usuario."'AND amigo2='".$nombre."';";
            $amigA=$bd->query($sql2);
            $amigA->execute();
            $contarA = $amigA->rowCount();
            
            foreach($amigA as $row){
                $sql="DELETE FROM amigos WHERE cod_amigo=".$row['cod_amigo'].";";
                $borrar=$bd->query($sql);
                $borrar->execute();
            }
            if($contarA==0){
              $sql2="SELECT cod_amigo FROM amigos WHERE amigo1='".$nombre."'AND amigo2='".$usuario."';";
              $amigA=$bd->query($sql2);
              $amigA->execute();
              $pruebaB = $amigA->rowCount();
              foreach($amigA as $row){
                
                $sql="DELETE FROM amigos WHERE cod_amigo=".$row['cod_amigo'].";";
                $borrar=$bd->query($sql);
                $borrar->execute();
              }
              
            }
            $sqls="SELECT cod_evento FROM eventos WHERE creador_evento='".$usuario."';";
            $codP=$bd->query($sqls);
            $codP->execute();
            foreach($codP as $row){
                $sql="DELETE FROM evento_amigo WHERE cod_evento=".intval($row['cod_evento'])." AND usuario='".$nombre."';";
                $borrarP=$bd->query($sql);
                $borrarP->execute();
            }
            $sql3="SELECT * FROM evento_amigo INNER JOIN eventos ON evento_amigo.cod_evento = eventos.cod_evento WHERE eventos.creador_evento='".$nombre."';";
            $bP2=$bd->query($sql3);
            $bP2->execute();
            foreach($bP2 as $rs){
              $sql3s="DELETE FROM evento_amigo WHERE cod_evento=".intval($rs['cod_evento'])." AND usuario='".$usuario."';";
              $bS=$bd->query($sql3s);
              $bS->execute();
            }

            //echo $amigA;
            /*$sql="DELETE FROM amigos WHERE cod_amigo=".$amigA.";";
            $borrar=$bd->query($sql);
            $borrar->execute();*/
            /*//$sql2="DELETE FROM amigos WHERE (amigo1='".$usuario."'AND amigo2='".$nombre."') OR (amigo1='".$nombre."'AND amigo2='".$usuario."');";
            $sql2="DELETE FROM amigos WHERE amigo1='".$usuario."'AND amigo2='".$nombre."';";
            $amigos=$bd->query($sql2);
            $amigos->execute();
            $contarb = $amigos->rowCount();
            if($contarb==0){
              $sql2="DELETE FROM amigo1='".$nombre."'AND amigo2='".$usuario."';";
              $amigosB=$bd->query($sql2);
              $amigosB->execute();
            }
*/
}
function aceptarSolicitud($usuario, $usuA){
  try {
    // Try to connect
        $bd = connection();
    
   
        $sql = "INSERT INTO amigos (amigo1,amigo2) VALUES (?,?)";
        $stmt= $bd->prepare($sql);
        $stmt->execute([$usuario, $usuA]);
        $sql1= "SELECT cod_sol FROM solicitud_amistad WHERE pers1='".$usuA."'AND pers2='".$usuario."';";  
        $borrarSolAc=$bd->query($sql1);
        $borrarSolAc->execute();
        foreach($borrarSolAc as $row){
          $borrarSoli=$row['cod_sol'];
          $sql1="DELETE FROM solicitud_amistad WHERE cod_sol='".$borrarSoli."';";
          $bor=$bd->query($sql1);
          $bor->execute();
        }
        
    
    // Null connection
       
    } catch (PDOException $e) { // if exception
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
function rechazarSolicitud($usuario, $usuR){
  try {
    // Try to connect
        $bd = connection();
    
   
        $sql1= "SELECT cod_sol FROM solicitud_amistad WHERE pers1='".$usuR."'AND pers2='".$usuario."';";  
        $borrarSolAc=$bd->query($sql1);
        $borrarSolAc->execute();
        foreach($borrarSolAc as $row){
          $borrarSoli=$row['cod_sol'];
          $sql1="DELETE FROM solicitud_amistad WHERE cod_sol='".$borrarSoli."';";
          $bor=$bd->query($sql1);
          $bor->execute();
        }
        
    
    // Null connection
       
    } catch (PDOException $e) { // if exception
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function enviarSolicitud($usuario, $usuS){

  try {
    // Try to connect
        $bd = connection();
        $sql="SELECT * FROM usuarios WHERE usuario='".$usuS."';";
        $ejec=$bd->query($sql);
        $ejec->execute();
        $contEjec=$ejec->rowCount();
        echo $contEjec;
        if($contEjec>0){
         

            $bd=connection();
              /*$sql123="SELECT * FROM amigos WHERE (amigo1='".$usuario."' AND amigo2='".$usuS."') OR (amigo1='".$usuS."' AND amigo2='".$usuario"');";
              $eS=$bd->query($sql123);
              $eS->execute();
              $contareS = $es->rowCount();
              if($contareS==0){*/
              

                $sql="SELECT * FROM solicitud_amistad WHERE pers1='".$usuario."'AND pers2='".$usuS."';";
                $envS=$bd->query($sql);
                $envS->execute();
                $contenvS = $envS->rowCount();
                $imprimir = $contenvS;
                //echo $imprimir;
                if($imprimir>0){
                  echo "<div class='notifi'>Ya has enviado una solicitud a ese usuario</div>";
                }else if($imprimir==0){
                  $sql = "INSERT INTO solicitud_amistad (pers1,pers2) VALUES (?,?)";
                $st= $bd->prepare($sql);
                $st->execute([$usuario, $usuS]);
                }
              }else{
                echo "Ya están agregados";
              }
              
     // }else{echo "<div class='nousu'>El usuario introducido no existe</div>";}
    // Null connection
      
    } catch (PDOException $e) { // if exception
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
/*
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
  /*
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
  }*/
?>
