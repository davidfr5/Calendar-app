
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
function loguear(){
    $usu=$_POST['usuario'];
    strval($usu);
    $pass=$_POST['contrasena'];
    strval($pass);
    $pass=hash('sha512', $pass);
    $bd=connection();
    $sql="select * from usuarios where usuario='".$usu."'";
    $sentencia=$bd->query($sql);
    $prueba=$sentencia->rowCount();
    if($prueba<1){
        echo'<script type="text/javascript">
            alert("Usuario no registrado, regístrate primero");
            window.location.href="../index.html";
            </script>';
    }else{
            foreach ($sentencia as $row){
            if($row['usuario']==$usu && $row['contra']==$pass){
                session_start();
                $_SESSION['user']= $usu;
                echo'<script type="text/javascript">
                alert("Logueado Correctamente!");
                window.location.href="../calendario.php";
                </script>';break;
            }else{
                echo'<script type="text/javascript">
             alert("Credenciales incorrectas, repita");
             window.location.href="../index.html";
             </script>';
            }
        }
        
            
            }
                
         }
        loguear();
    

?>