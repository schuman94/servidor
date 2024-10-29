<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
</head>
<body>
    <?php                                               #nombre   #contraseña 
    $pdo = new PDO('pgsql:host=localhost;dbname=datos', 'datos', 'datos');
    $sentencia = $pdo->query('SELECT e.*, d.denominacion
                                FROM empleados e LEFT JOIN departamentos d 
                                  ON e.departamento_id = d.id
                            ORDER BY numero');
    
    ?>
    
    <table border="1">
        <thead>
            <th>Número</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Departamento</th>
        </thead>
        <tbody>
            <?php foreach ($sentencia as $fila): ?>
                
                <tr>
                    <td><?=$fila['numero']?></td>
                    <td><?=$fila['nombre']?></td>
                    <td><?=$fila['apellidos']?></td>
                    <td><?=$fila['denominacion']?></td>
                </tr> 
            <?php endforeach ?>
        </tbody>
    </table>

</body>
</html>