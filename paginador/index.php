<?php
include 'conexion.php';

// Parámetros de paginación
$por_pagina = 5;
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina_actual > 1) ? ($pagina_actual * $por_pagina) - $por_pagina : 0;

// Consulta SQL con LIMIT para la paginación
$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM productos LIMIT $inicio, $por_pagina";
$resultado = $conexion->query($sql);

// Obtenemos el total de filas
$total_resultado = $conexion->query("SELECT FOUND_ROWS() as total");
$total_filas = $total_resultado->fetch_assoc()['total'];

// Calculamos el total de páginas
$total_paginas = ceil($total_filas / $por_pagina);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Paginación en PHP</title>
</head>

<body>
    <h1>Lista de Productos</h1>
    <ul>
        <?php while ($producto = $resultado->fetch_assoc()): ?>
        <li><?php echo $producto['nombre']; ?> - <?php echo $producto['precio']; ?> €</li>
        <?php endwhile; ?>
    </ul>

    <!-- Navegación de paginación -->
    <div>
        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
        <a href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</body>

</html>