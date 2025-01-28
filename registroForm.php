<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My web-page</title>
</head>
<body>
    <form method="post" action="registro.php">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required/>
        <label for="email">Email: </label>
        <input type="text" id="email" name="email" required/>
        <label for="password">PassWord: </label>
        <input type="password" id="password" name="password" required/>
        <input type="submit" value="Enviar" name="registrar">
    </form>
    <a href="index.php">Go Back Home Page</a>
</body>
</html>