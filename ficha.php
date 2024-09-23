<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Esto es el resultado del formulario</p>
    <?php echo 25 ?>
    <br>
    <?= 1+1 ?> 
    <br>
    <?php
    $x = 25; // Comentario
    $y = 30; # Comentario
    $z = $x + $y; /* Comentario
                     multilinea
                  */

    $x = "12" + "pepe";
    var_dump($x);
    ?>
    <?= $x ?>
</body>
</html>