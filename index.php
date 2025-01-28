<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[Mi web -|- Raul]</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <div class="login">
            <?php if (isset($_COOKIE['msg'])) :?>
                <h1><?=$_COOKIE['msg'] ?></h1>
                <?php  setcookie("msg", "", time() - 100);
                unset($_COOKIE['msg'])?>
            <?php else:?>
                <h1>Bienvenido de nuevo!</h1>
            <?php endif;?>
            <?php if (isset($_COOKIE['error'])) :?>
                <h3 class="error"><?=$_COOKIE['error'] ?></h3>
                <?php  setcookie("error", "", time() - 100);
                unset($_COOKIE['error'])?>
            <?php endif;?>
            
            <form action="login.php" method="post">

                <input type="email" required autocomplete="off" placeholder="Correo Electronico*" name="email"/>

                <input type="password" required autocomplete="off" placeholder="Contraseña*" name="password"/>

                <input class="boton" type="submit" value="Log In" name="login" > 

                <p><a href="registro.php">¿No estás registrado? </a></p>       

            </form>

        </div>
        <p class="credit">Hecho con <span>❤</span> por @Raul</p>
</body>

</html>
