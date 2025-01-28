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
    <div class="signup">  

            <h1>Registro</h1>
            
            <form action="registro.php" method="post">
            
                <input type="text" required autocomplete="off" placeholder="Nombre*" name="nombre" />
            
                <input type="text" required autocomplete="off" placeholder="Apellido(s)*" name="apellidos" />
            
                <input type="email" required autocomplete="off" placeholder="Correo Electronico*" name="email" />
            
                <input type="password" required autocomplete="off" placeholder="Contraseña*" name="password"/>
            
                <input class="boton" type="submit" value="Registrar" name="registrar">
            
                <p><a href="index.php">¿Ya tines cuenta?</a></p>
            
            </form>

        <p class="credit">Hecho con <span>❤</span> por @Raul</p>

    </div>
</body>
</html>

<?php 
require_once 'bd.php';
require_once "funciones.php";

if(isset($_POST['registrar'])){
    
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $password  = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $verificacion_code = substr(number_format(time()*rand(),0,'',''),0,6);

    // Añadimos un mensaje personalizado junto con el código de verificación

    $sbj = 'Verificacion de correo electrónico';

    $body = "<p>Hola ".$nombre.",</p>";
    $body =  '<p>Tú codigo de verificaccion es: <b style="font-size:30px;">'
    .$verificacion_code.'</b></p>';

    $body .= "<p>Enhorabuena " .$nombre. " por su incorporación y bienvenido a nuestra empresa. Por favor, usa el siguiente código para verificar tu cuenta:</p>";
    $body .= "<p>Si no has solicitado este registro, por favor ignora este correo.</p>";
    $body .= "<p>¡Saludos!</p>";

    enviarCorreo($email, $nombre, $sbj, $body);


    $db = new Database();
    $sql = "INSERT INTO usuarios (nombre,apellidos,email,password,verificacion_code) VALUES (?,?,?,?,?);";
    $resultSet = false;
    $nombreCompleto = $nombre." ".$apellidos;
    try{
        $consulta = $db->getConnection()->prepare($sql);
        $consulta->bindParam(1, $nombre);
        $consulta->bindParam(2, $apellidos);
        $consulta->bindParam(3, $email);
        $consulta->bindParam(4, $password);
        $consulta->bindParam(5, $verificacion_code);
        $resultSet = $consulta->execute();
    }catch(PDOException $e){
        echo "error al insertar en la BD ".$e->getMessage();
    }
    if($resultSet){
        header('Location:verificar.php?email='.$email.'&nombre='.$nombre);
    }
}   
?>