<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
</head>
<body>
    <?php                                               #nombre   #contraseña 
    $pdo = new PDO('pgsql:host=localhost;dbname=datos', 'datos', 'datos');
    $sentencia = $pdo->query('SELECT *
                                FROM departamentos
                            ORDER BY codigo');
    
    #while($fila = $sentencia->fetch()) {  #Aquí mismo estamos asignando el primer array a $fila 
    #    var_dump($fila);
    #}
    
    # Mas rapido, podemos recorrer directamente la sentencia, ya que es un iterable
    // foreach ($sentencia as $fila) {
    //     var_dump($fila);
    // }

    ?>
    <table border="1">
        <thead>
            <th>Código</th>
            <th>Denominación</th>
            <th>Localidad</th>
        </thead>
        <tbody>
            <?php foreach ($sentencia as $fila): ?>
                <tr>
                    <td><?=$fila['codigo']?></td>
                    <td><?=$fila['denominacion']?></td>
                    <td><?=$fila['localidad']?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>
</html>