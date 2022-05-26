<?php
//Este proceso es para validar los datos que se envian desde el form que esta en el index de los productos.


session_start(); //Variables de sesiòn.
if (isset($_POST['btnAccion'])) {

    switch ($_POST['btnAccion']) {
        case 'Agregar': // Agregar es el valor definido en el formulario de envio de datos al carrito es un identificador luego de entrar
            //al if() identifica con el valor Agregar entrando al case
            if (is_numeric($_POST['id'])) { //is_numeric() es para evaluar el numero enviado del id
                $ID = $_POST['id'];
                echo 'Id correcto..' . $ID;
            } else {
                echo 'Ups.. ID incorrecto' . $ID;
            }

            if (is_string($_POST['marca'])) { //is_numeric() es para evaluar el numero enviado del id
                $MARCA = $_POST['marca'];
                echo 'OK, marca' . $MARCA;
            } else {
                echo 'Ups.. algo pasa con la marca' . $MARCA;
                break;
            }

            if (is_string($_POST['nombre'])) { //is_numeric() es para evaluar el numero enviado del id
                $NOMBRE = $_POST['nombre'];
                echo 'OK, nombre' . $NOMBRE;
            } else {
                echo 'Ups.. algo pasa con el nombre' . $NOMBRE;
                break;
            }

            if (is_string($_POST['precio'])) { //is_numeric() es para evaluar el numero enviado del id
                $PRECIO = $_POST['precio'];
                echo 'OK, precio' . $PRECIO;
            } else {
                echo 'Ups.. algo pasa con el precio' . $PRECIO;
                break;
            }

            if (is_numeric($_POST['cantidad'])) { //is_numeric() es para evaluar el numero enviado del id
                $CANTIDAD = $_POST['cantidad'];
                echo 'OK, cantidad' . $CANTIDAD;
            } else {
                echo 'Ups.. algo pasa con la cantidad' . $CANTIDAD;
                break;
            }

            if (is_string($_POST['imagen'])) { 
                $IMAGEN = $_POST['imagen'];
                echo 'OK, precio' . $IMAGEN;
            } else {
                echo 'Ups.. algo pasa con el precio' . $IMAGEN;
                break;
            }


            //Almacenamos los datos en un array creando una variable de sesion CARRITO
            if (!isset($_SESSION['CARRITO'])) {/*Si no existe la variable de sesion, osea si no esta como con el
                ejemplo del login que se guarda un usuario pero en este caso como no hay productos guardados va
                hacer el proceso del array*/
                $producto = array(
                    'ID' => $ID,
                    'MARCA' => $MARCA,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO,
                    'IMAGEN' => $IMAGEN

                );
                $_SESSION['CARRITO'][0] = $producto;/*El llenado del array en la pocision [0]= a un producto 
                agregado a la variable $producto*/

                print_r($_SESSION, true);//mensaje mostrar


            } else { //Este else{} nos sirver para agregar mas productos is existen

            $idProductos=array_column($_SESSION['CARRITO'], "ID");
            if (in_array($ID,$idProductos)) {
                echo "<script>alert('El producto ya ha sido seleccionado..');</script>";
            }else{

           
                $NumeroProductos = count($_SESSION['CARRITO']);/*funcion count contabilizar
                al creace un produto en la pocision[0] contaria = 1
                */
                $producto = array(
                    'ID' => $ID,
                    'MARCA' => $MARCA,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO,
                    'IMAGEN' => $IMAGEN

                );
                $_SESSION['CARRITO'][$NumeroProductos] = $producto;/*$_SESSION['CARRITO']=cada producto
                   con sus caracteristicas // y [$NumeroProductos]= el valor de cada producto contando el promero = 1
                    */

                    print_r($_SESSION, true);//mensaje mostrar
            }
        }

            break;

        case 'Eliminar':

            if (is_numeric($_POST['id'])) { //is_numeric() es para evaluar el numero enviado del id
                $ID = $_POST['id'];

                foreach ($_SESSION['CARRITO'] as $indice=>$producto) {
                    if ($producto['ID'] == $ID) {
                        unset($_SESSION['CARRITO'][$indice]);
                        echo "<script>alert('Elemento Borrado..');</script>";
                    }
                }
            } else {
                echo 'Ups.. ID incorrecto' . $ID;
            }

            break;
    }
}
