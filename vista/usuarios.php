<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
</head>
<body>
    <table>

        <!--- de cambia la ruta-->
        <tr> <?php require_once("core/constantes.php");

            foreach(usuarioColumns as $value):?> <!-- Los dos puntos: es para que no se termine el foreach aun -->

            <td> <?php echo $value ?> </td> <!-- Asi seramos el foreach -->
            
            <?php endforeach ?>
            
        </tr>


        <!-- esta fila es para los datos de la db -->

        <tr>
            <!-- Valores de los datos -->
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <!-- Botones de editar y eliminar -->
            <td> <a href="">Editar</a></td>

            <!-- Asi incrustamos code js rapidamente -->
            <td> <a onclick="javascript: return confirm('¿Estas seguro de eliminar este registro?');">Eliminar</a></td>
        </tr>
    </table>
</body>
</html>