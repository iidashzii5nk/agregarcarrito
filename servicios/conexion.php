<?php
/*
$pdo=mysqli_connect("localhost","root","","productos");
if ($pdo) {
    echo '<script>
      alert("Conectado a la BD");
</script>';
  
}else{
echo '<script>
alert("No conectado a la BD");
</script>';
}*/

$servidor="mysql:dbname=".BD.";host=".SERVIDOR;
try {
  $pdo = new PDO($servidor,USUARIO,PASSWORD,
  array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
);
//echo "<script> alert('Conectado..')</script>";

} catch (PDOException $e) {
  //echo "<script> alert('Error..')</script>";
}
