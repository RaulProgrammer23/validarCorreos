<?php
require_once 'bd.php';
session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $db = new Database();
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $resultSet = false;
    try{
        $consulta = $db->getConnection()->prepare($sql);
        $consulta->bindParam(1, $email);
        $resultSet = $consulta->execute();
        $result = $consulta->fetch(PDO::FETCH_OBJ);
        //var_dump ($result);
        if($result == null){
            setcookie( 'error', "Parece que no estás registrado!"); 
            header("Location:index.php");
        }
        elseif( !(password_verify($password,$result->password)) ){
            setcookie( 'error', "Contraseña incorrecta!"); 
            header("Location:index.php");
        }
        elseif($result->email_verificado == null) {
            setcookie( 'error', "Cuenta no está verificada! <a href='verificar.php?email=" . $email .
            "'>hazlo desde aquí</a>");
            header("Location:index.php");
        }else{
            $_SESSION['user'] = $email;
            header("Location:page.php");
        }
        
          

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>
