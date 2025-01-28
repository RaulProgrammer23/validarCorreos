
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h1>Verifica tú cuenta</h1>
        <?php if (isset($_COOKIE['msg'])) :?>
            <h3 class="error"><?=$_COOKIE['msg'] ?></h3>
            <?php  setcookie("msg", "", time() - 100);
            unset($_COOKIE['msg'])?>
        <?php endif;?>
        <form action="" method="Post">
            <input type="hidden" name="email" value="<?= $_GET['email']?>" required>
            <input type="text" name="verificacion_code" placeholder="Escribe tú codigo de verificacion" required>
            <input class="boton" type="submit" value="verificar cuenta" name="verificar">
        </form>
    </div>
    
</body>
</html>

<?php 
require_once 'bd.php';
if(isset($_POST["verificar"])){
    //buscamos en la bbdd con el correo y codigo de verifi proprcionados del usuario
    $email = $_POST["email"];
    $verificacion_code = $_POST["verificacion_code"];
    $db = new Database();
    $sql = "UPDATE usuarios SET email_verificado = NOW() WHERE email = ? and verificacion_code = ?;";
    try{
        $stmt = $db->getConnection()->prepare($sql);
        $stmt->bindParam(1,$email);
        $stmt->bindParam(2,$verificacion_code);
        $result = $stmt->execute();
        $count = $stmt->rowCount();
        //var_dump($count);
        if($count == 0){
            setcookie('msg', "Codigo incorrecto!");
        }else{
            setcookie( 'msg', "Cuenta verificada correctamente! Inicia sesion"); 
            header("location:index.php");
        }
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>