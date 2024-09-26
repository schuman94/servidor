<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <?php
    if (isset($_GET['op1'])) {
        $op1 = $_GET['op1'];
        if (empty($op1) || !is_numeric($op1)) {
            echo "<h2>El primer operando no es correcto.<h2>";
        }
    }
    if (isset($_GET['op2'])) {
        $op2 = $_GET['op2'];
    }

    $op2 = $_GET['op2'];
    $res = $op1 + $op2;
    ?>
    <p>
        La suma de <?= $_GET['op1'] ?> y <?= $_GET['op2'] ?>
        es <?= $res ?>
    </p>
</body>
</html>