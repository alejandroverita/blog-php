<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>BLOG</h2>
    <hr/>
<?php

$db_host="localhost";
$db_nombre="blog";
$db_usuario="root";
$db_contra="";
$db_port=3306;

$miconexion=new mysqli($db_host, $db_usuario, $db_contra, $db_nombre, $db_port);

//comprobar conexion
if(!$miconexion) {

    echo "Fallo la conexion debido a: " . mysqli_error(); //concatena el valor del error

    exit();
}

//Crear instruccion SQL que rescate informacion almacenada en la tabla
$miconsulta="SELECT * FROM CONTENIDO ORDER BY FECHA DESC";

//Extraer los registros
if($resultado=mysqli_query($miconexion, $miconsulta)) {

//Recorrer lo que hay en el array resultados
    while ($registro=mysqli_fetch_assoc($resultado)) {
        echo "<h3>" . $registro['TITULO'] . "</h3>";

        echo "<h4>" . $registro['FECHA'] . "</h4>";

        echo "<div style='width:400px'>" . $registro['COMENTARIO'] . "</div><br/><br/>";

        //si imagen es diferente a vacio, entonces traeme la imagen
        if ($registro['IMAGEN'] !==""){
            echo "<img src='imagenes/" . $registro['IMAGEN'] . "' width='300px' />";
        }

        echo "<hr/>";
    }

}



?>
</body>
</html>