<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

include("../modelo/manejo_objetos.php");
try { 
    $miconexion=new PDO ('mysql:host=localhost; dbname=blog', 'root', '');

    $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $manejo_objetos=new manejo_objetos($miconexion);
    $tabla_blog=$manejo_objetos->getContenidoPorFecha();

    if(empty($tabla_blog)){
        echo "No hay entradas de blog aun";
    } else {
        foreach ($tabla_blog as $valor) {
            echo "<h3>" . $valor->getTitulo() . "</h3>";

            echo "<h4>" . $valor->getFecha() . "</h4>";

            echo "<div style='width:400px'>";

            echo $valor->getComentarios() . "</div>";

            if($valor->getImagen()!="") {
                echo "<img src'../imagenes/";

                echo $valor->getImagen() . "' width= '300px' height='200px'/>";
            }

            echo "<hr/>";
        }
    }

} catch (Exception $e) {
    die ("Error " . $e->getMessage());
}


?>

<br/>

<a href="Formulario.php">Volver al inicio </a>

</body>
</html>


