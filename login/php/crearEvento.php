
<?php

require_once('./sessions.php');
check_session();
$usuario=$_SESSION['user'];

//conectamos con la base de datos
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
require('./conex.php');


function crearEvento($usuario){
    $arrayAmi=[];
$eventCodigo="";
$usuEvent="";
$amis =$_POST['datos123'];
$nomEv=$_POST['nomEvento'];
$nomEvS=strval($nomEv);
//echo $nomEvS;
$fecha=$_POST['fecEv'];
$fechaS=strval($fecha);
//echo $fechaS;
$desc=$_POST['desc'];
//echo htmlspecialchars($_POST['desc']);
$descS=strval($desc);
//echo $descS;
$usuS=strval($usuario);
//echo $usuS;
try {
    // Try to connect
        $pdo = connection();
    
    // Data 
       /* $nEv = $nomEvS;
        $dEv = $descS;
        $uEv = $usuS;
        $dEv = $fechaS;*/
    
    // query
        $sql = "INSERT INTO eventos (nom_evento,desc_evento,creador_evento, fec_ev) VALUES (?,?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$nomEvS, $descS, $usuS, $fechaS]);
        $sql ="SELECT cod_evento FROM eventos ORDER BY cod_evento DESC LIMIT 1";
        $stmt= $pdo->prepare($sql);
        $stmt->execute();
        $arrayAmi=explode( ',', $amis );
        $numeArray = count($arrayAmi);
        echo $numeArray;
        foreach($stmt as $row){
            $eventCodigo=$row['cod_evento'];
            for ($i = 0; $i <$numeArray; $i++) {
                
            
            $usuEvent=$arrayAmi[$i];

            $sqls = "INSERT INTO evento_amigo (usuario,cod_evento) VALUES (?,?)";

            $st= $pdo->prepare($sqls);
             $st->execute([$usuEvent, $eventCodigo]);
            //echo gettype($row['cod_evento']);
           //print_r($arrayAmi);
            }
        }
    // Null connection
       
    } catch (PDOException $e) { // if exception
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
/*$bd=connection();
$sql ='INSERT INTO eventos '. 
'(nom_evento, desc_evento, creador_evento, fec_ev)'.
'VALUES ("$nomEvS", "$descS", "$usuS", "$fechaS")';
$insEv=$bd->query($sql);
$insEv->execute();*/




}
//function formatoFecha(){}
crearEvento($usuario);
echo $nomEvS; 
echo $fechaS;
echo $descS;
echo $usuS;

?>
<html>
    <head>
        <title>Datos Introducidos</title>
        <script>
    setTimeout(function() {
          window.close();
    },2000);
</script>
    </head>
</html>