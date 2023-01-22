<?php
//conectamos con la base de datos
function connection(){
    $connection_string='mysql:dbname=login;host=127.0.0.1';
    $u='root';
    $k='root12';
    try{
        $bd=new PDO($connection_string,$u,$k);
        return $bd;
    }catch(PDOException $e){
        echo "Error in the database: ".$e->getMessage();
    }
}

function comprobarUsuario(){
    $usu=$_POST['usu1'];
    strval($usu);
    $bd=connection();
    $sql="select * from usuarios where usuario='".$usu."'";
    $sentencia=$bd->query($sql);
    $prueba=$sentencia->rowCount();
    if($prueba<1){
        $ps=$_POST['contra1'];
       
        strval($ps);
            $ps2=$_POST['contra2'];
        strval($ps2);
        if($ps!=null && $ps!="" && $ps==$ps2){
        $ps = hash('sha512', $ps);
           $bd=connection();
            $sql="insert into usuarios (usuario,contra)
            values('".$usu."','".$ps."')";
            $sen2=$bd->query($sql);
            echo'<script type="text/javascript">
            alert("Usuario Creado Correctamente");
            window.location.href="../index.html";
            </script>';
        }else{
            echo'<script type="text/javascript">
            alert("Contraseñas No Coinciden");
            window.location.href="../index.html";
            </script>';
        }

    }else{
    echo'<script type="text/javascript">
    alert("Usuario ya registrado, inténtelo de nuevo");
    window.location.href="../index.html";
    </script>';}
}

comprobarUsuario();



?>
