<?php 

require_once('./php/sessions.php');
    check_session();
 

?>
<html>
    <head>
    <link rel="stylesheet" href="estiloGeneral.css">
    <link rel="stylesheet" href="estiloMenus.css">
    <link rel="stylesheet" href="estiloCalendario.css">
    <script src="./js/main.js"></script>
    
    </head>
<body>
<div id="calendar">
<?php
require('./php/conex.php');

$fec1="";

function llamarEventos($fechaStr){
    //$eventoDetectado=false;
    $usu=$_SESSION['user'];
    $strUsu=strval($usu);
    $bd=connection();
    $sql2="SELECT * FROM eventos WHERE fec_ev='".$fechaStr."'AND creador_evento='".$strUsu."';";
    $diaEventos=$bd->query($sql2);
    $diaEventos->execute();
    $cuentaEventos = $diaEventos->rowCount();
    $nomEvA="";
    $eventAB ="";
    $eventoMultipleA="";
    $eventB="";
    $eventoMultiple="";
    $nomEvento = "<p> </p>";
    if($cuentaEventos==0){
        $nomEvento = "<p> </p>";
        return $nomEvento;
    }else if($cuentaEventos==1){
    foreach ($diaEventos as $row) {
        $eventB .= "<p id='evento' title='".$row['desc_evento']."'>";
        $eventB .= $row['nom_evento'];
        $eventB .= "</p>";
        return $eventB;

    }
    return $nomEvento;

}else if($cuentaEventos>1){
    foreach ($diaEventos as $row) {
    
    $eventoDetectado=true;
    //echo "un evento";
    $eventoMultiple .="<p id='eventomult' title='".$row['desc_evento']."'>";
    $eventoMultiple .= $row['nom_evento'];
    $eventoMultiple .= "</p>";
    
    }if($eventoDetectado==true){
        $eventoDetectado=false;
        return $eventoMultiple;
    }else{
        return $nomEvento;}
        
}
   
    
}
function sacarEventoCod($fechaStr){
    $usu=$_SESSION['user'];
    $strUsu=strval($usu);
    $bd=connection();
    //$sql="SELECT * FROM eventos INNER JOIN evento_amigo ON eventos.cod_evento = evento_amigo.cod_evento WHERE evento_amigo.usuario='repo' AND eventos.fec_ev='2022-06-15';";
    $sql="SELECT * FROM eventos INNER JOIN evento_amigo ON eventos.cod_evento = evento_amigo.cod_evento WHERE evento_amigo.usuario='".$strUsu."' AND eventos.fec_ev='".$fechaStr."';";
    $innerEje=$bd->query($sql);
    $innerEje->execute();
    $cueEv = $innerEje->rowCount();
    $eventB="";
    $eventoMultiple="";
    $nomEvento = "<p> </p>";
    if($cueEv==0){
        $nomEvento = "<p> </p>";
        return $nomEvento;
    }else if($cueEv==1){
    foreach ($innerEje as $row) {
        $eventB .= "<p id='eventoA' title='".$row['desc_evento']."'>";
        $eventB .= $row['nom_evento'];
        $eventB .= "</p>";
        return $eventB;

    }
    return $nomEvento;

}else if($cueEv>1){
    foreach ($innerEje as $row) {
    
    $eventoDetectado=true;
    //echo "un evento";
    $eventoMultiple .="<p id='eventomultA' title='".$row['desc_evento']."'>";
    $eventoMultiple .= $row['nom_evento'];
    $eventoMultiple .= "</p>";
    
    }if($eventoDetectado==true){
        $eventoDetectado=false;
        return $eventoMultiple;
    }else{
        return $nomEvento;}
        
}
    /*$sql="SELECT cod_evento FROM evento_amigo WHERE usuario='".$strUsu."';";
    $ejecuEvs=$bd->query($sql);
    $ejecuEvs->execute();
    $cuentaEvA = $ejecuEvs->rowCount();*/
}

/*llamarEventos();
function cogerFecha($fec1){
    return $fec1;

}
$fechaBien=cogerFecha();
echo $fechaBien;*/
//echo llamarEventos::$fec1();

//echo gettype($row['date']);

//echo $pru12;




/*
$bd=connection();
$sql="select * from eventos;";
$eventos=$bd->query($sql);
foreach ($eventos as $row) {
    //$pru = echo "<label>".$row['nom_evento']."</label>";
}*/

if(isset($_GET["num1"]) and isset($_GET["num2"])){
$month=$_GET["num1"];
$year=$_GET["num2"];}else{
$dateComponents = getdate();
$month = $dateComponents['mon'];
$year = $dateComponents['year'];}
function build_calendar($month,$year) {
    $a = array();

    // Array con los nombres de los dias de la semana
    $daysOfWeek = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');

    // Obtener el primer dia del mes
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    // Numero de dias del mes
    $numberDays = date('t',$firstDayOfMonth);

    // Obtener informacion del primer dia del mes
    $dateComponents = getdate($firstDayOfMonth);

    // Nombre del mes
    $monthName = $dateComponents['month'];

    // Indice del primer dia del mes (0-6)
    $dayOfWeek = $dateComponents['wday']-1;
    if($dayOfWeek<0){
        $dayOfWeek=6;
    }
    if($dayOfWeek>6){
        $dayOfWeek=0;
    }

    // Crear tabla y botones
    $calendar = "<h2 id=monthName>$monthName $year</h2><table>";
    $calendar .= "<tr>";
    

    // Crear los nombres de los dias de la semana
    foreach($daysOfWeek as $day) {
        $calendar .= "<th>$day</th>";
    }

    // Inicializar el contador de dia empezando por el 1
    $currentDay = 1;
    $calendar .= "</tr><tr>";

    // El array $daysOfWeek se usa para crear 7 columnas para los dias
    if ($dayOfWeek > 0) { 
        $calendar .= "<td id='vacioA'colspan='$dayOfWeek'>&nbsp;</td>"; 
    }
    
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay <= $numberDays) {
        // La columna 7 ha llegado (domingo). Se empieza otra fila.
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr class='trValor'>";
        }
        
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $fechaStr=strval($date);

       
        //$text1 = "<td id='tdActivo' rel='$date'>$currentDay</td>";
        $usu=$_SESSION['user'];
        $variableFunciona=llamarEventos($fechaStr);
        $varExt=sacarEventoCod($fechaStr);
        //llamarEventos($fechaStr);
        //echo $valorBien;
        //echo $fec1;
        
        $text1 = "<td id='tdActivo' rel='$date'>$currentDay</br>$variableFunciona $varExt</td>";
            //$text1 = "<td id='tdActivo' rel='$date'>$currentDay</td>";
    
  
       
      
        //$text1 .= "</td>";
       
        $calendar .= $text1;
        

        // Incrementar contadores
        $currentDay++;
        $dayOfWeek++;
    }

    // Completar la lista de la Ãºltima semana si es necesario
    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        $calendar .= "<td id='vacioB' colspan='$remainingDays'>&nbsp;</td>"; 
    }

    $calendar .= "</tr>";
    $calendar .= "</table>";

    return $calendar;
}

echo build_calendar($month,$year);

?> 

</div>
</body>
</html>