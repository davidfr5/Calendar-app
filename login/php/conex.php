<?php 
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


?>
