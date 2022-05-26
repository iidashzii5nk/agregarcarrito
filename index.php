<?php
include('servicios/config.php');
include('servicios/conexion.php');
include('carrito.php'); //validar si quitando este include funciona
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="mostrarCarrito.php">CARRITO(<?php 
    
    echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']); /*empty vacio si el carrito esta vacio
    el operador ternario ?el primer valor es si 0: el segundo valor es no // la funcion count= contar
    la cantidad de productos agregados
    */
    
    ?>)</a>
    </br></br>

    <?php
    echo print_r($_POST); //Es para mostrar los datos que se envian al formulario Array ( [id] => 1 [marca] => Intenze [nombre] => Black [precio] => 30.00 [cantidad] => 1 [btnAccion] => Agregar ) 1
    ?>

    <?php
    $sentencia = $pdo->prepare("SELECT * FROM picmentos");
    $sentencia->execute();
    $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    //print_r($listaProductos);//Es para obtener los productos y ver la estructura en array[]
    ?>
    <?php foreach ($listaProductos as $producto) { ?>

        <div><!-- Llama los datos marca nombre y precio-->
            <p><?php echo $producto['marca'] ?></p>
            <p><?php echo $producto['nombre'] ?></p>
            <h5>$<?php echo $producto['precio'] ?></h5>
            


            <form action="" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $producto['id'] ?>">
                <input type="hidden" name="marca" id="marca" value="<?php echo $producto['marca'] ?>">
                <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['nombre'] ?>">
                <input type="hidden" name="precio" id="precio" value="<?php echo $producto['precio'] ?>">
                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1; ?>">

                <input type="hidden" name="imagen" id="imagen" value="<?php echo $producto['imagen'] ?>">


                <button name="btnAccion" value="Agregar" type="submit">

                    Agregar carrito

                </button>

            </form>



        </div>

        <img src="<?php echo $producto['imagen'] ?>" title="<?php echo $producto['imagen'] ?>">



    <?php } ?>


</body>

</html>