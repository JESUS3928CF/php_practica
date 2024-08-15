<?php 
include 'conexion.php'; 

// Parámetros de paginacion 
$por_pagina = 5;
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina_actual > 1) ? ($pagina_actual * $por_pagina) - $por_pagina : 0;

// Consulta SQL con LIMIT para la paginacion, inicio es desde que reguistro va enpezar a contar, y el siguiente parametro en cuntos va a traer (5)
$sql = "SELECT * FROM productos LIMIT $inicio, $por_pagina";
$resultado = $conexion->query($sql);


// Obtenermos el total de las filas
// Obtener el total de filas
$total_resultado = $conexion->query("SELECT COUNT(*) AS total FROM productos");

// Extraer el total de filas del resultado
$fila = $total_resultado->fetch_assoc();
$total_filas = $fila['total'];

// Calcular el total de páginas
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
        <?php while($producto = $resultado->fetch_assoc()): ?>
            <li><?php echo $producto['nombre'];?> - <?php echo $producto['precio'];?> </li>
        <?php endwhile; ?>
    </ul>

    <!-- Navegacion de la paginacion -->
    <div>
        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
            <a href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>

    <!-- Navegación de paginación -->
    <div>
        <?php if ($pagina_actual > 1): ?>
            <a href="?pagina=<?php echo $pagina_actual - 1; ?>">Anterior</a>
        <?php endif; ?>

        <span>Página <?php echo $pagina_actual; ?> de <?php echo $total_paginas; ?></span>

        <?php if ($pagina_actual < $total_paginas): ?>
            <a href="?pagina=<?php echo $pagina_actual + 1; ?>">Siguiente</a>
        <?php endif; ?>
    </div>

</body>
</html>