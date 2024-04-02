<?php

//Funcion que muestra los datos del carrito. Para ello, usa como parametro el objeto PDO, para hacer las consultas con la base de datos
function mostrarCarrito($connect, $filtroMarca = null, $filtroBusqueda = null)
{
    //Se prepara la consulta en sql para obtener todos los datos necesarios mediante un JOIN
    $consulta = "SELECT p.id_producto, np.nombre_producto, m.marca, p.descripcion_producto, p.precio_producto, p.stock_producto, p.imagen_producto 
                    FROM tabla_producto p
                    INNER JOIN tabla_nombre_producto np ON p.id_nombre_producto = np.id_nombre_producto
                    INNER JOIN tabla_marca m ON p.id_marca = m.id_marca";
                    
    // Si hay un filtro de marca, agregarlo a la consulta
    if ($filtroMarca !== null) {
        $consulta .= " WHERE m.marca = '$filtroMarca'";
    }

    // Si hay un filtro de búsqueda, agregarlo a la consulta
    if ($filtroBusqueda !== null) {
        // Agregar condición de búsqueda
        if ($filtroMarca !== null) {
            $consulta .= " AND (np.nombre_producto LIKE '%$filtroBusqueda%' OR m.marca LIKE '%$filtroBusqueda%')";
        } else {
            $consulta .= " WHERE np.nombre_producto LIKE '%$filtroBusqueda%' OR m.marca LIKE '%$filtroBusqueda%'";
        }
    }
    
    //Se ejecuta la consulta
    $resultado = $connect->query($consulta);
    
    //Comprobamos si hay resultados
    if ($resultado) {
        //Este es el bucle donde se imprimen los productos en el catálogo
        while ($producto = $resultado->fetch(PDO::FETCH_ASSOC)) {
            echo '<picture class="border rounded bg-white shadow ms-5">
                        <img src="assets/productos/'.$producto["imagen_producto"].'" class="rounded-top" width="200px">
                        <article class="mb-3">
                            <p class="mt-2 ms-2">'.$producto["nombre_producto"].'<br><b>'.$producto["marca"].'</b><br>'.$producto["precio_producto"].'$
                            </p>
                            <form action ="pages/kart.php" method="POST">
                                <input type="hidden" name="id-producto" value="'.$producto["id_producto"].'">
                                <input type="hidden" name="nombre-producto" value="'.$producto["nombre_producto"].'">
                                <input type="hidden" name="descripcion-producto" value="'.$producto["descripcion_producto"].'">
                                <input type="hidden" name="marca-producto" value="'.$producto["marca"].'">
                                <input type="hidden" name="precio-producto" value="'.$producto["precio_producto"].'"> 
                                <input type="hidden" name="stock-producto" value="'.$producto["stock_producto"].'">
                                <input type="hidden" name="imagen-producto" value="'.$producto["imagen_producto"].'">
                                <div class="button-container">
                                    <input type=submit class="button_yellow fw-bold shadow mx-5" value="COMPRAR">
                                </div>
                            </form>
                        </article>
                    </picture>';
            echo "<br>";
        }
    } else {
        // Si no hay resultados, imprimir un mensaje de error
        echo "No se encontraron productos.";
    }
}

?>
