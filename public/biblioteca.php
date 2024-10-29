<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
</head>
<body>
    <?php
    
    $libro = trim($_GET['libro']);
    

    $fecha_inicio = new DateTime();

    $fecha_fin = $fecha_inicio->add(new DateInterval('P30D'));
    
    var_dump($fecha_inicio);
    var_dump($fecha_fin);
    
    
    ?>
</body>
</html>