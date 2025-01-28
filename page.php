<?php 
session_start();

if(isset($_SESSION['user'])):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
        background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
        margin: 5% auto;
        font-family: 'calibri';
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Main Page!</h1>
    <h2>Al parecer ha verificado su Correo electrónico e iniciado sesión</h2>

    <p>Podemos empezar a trabajar juntos !!</p>
    
</body>
</html>
<?php else:
    header("Location:index.php");
endif;?>
