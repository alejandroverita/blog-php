<?php

include("../modelo/objeto_blog.php");
include("../modelo/manejo_objetos.php");

try{
    $miconexion=new PDO ('mysql:host=localhost; dbname=blog', 'root', '');

    $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if($_FILES ['imagen'] ['error']) { //$_files para subir imagenes al servidor

        switch($_FILES['imagen'] ['error']) {
            case 1: //Error exceso de tamaño de archivo en php.ini
                echo "El tamaño del archivo excede lo permitido por el servidor";
            break;

            case 2: //Error tamaño archivo marcado desde formulario
                echo "El tamaño del archivo excede el limite de 2MB";
            break;

            case 3: // Corrupcion del archivo
                echo "Hubo una interrupcion en la subida.";
            break;

            case 4: //No hay fichero
                echo "No se ha enviado ningun archivo";
            break;
        }

    } else {
        echo "Entrada subida correctamente <br>";

        if((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error']==UPLOAD_ERR_OK))){
            
            $destino_de_ruta="imagenes/";

            //mueve el archivo del directorio temporal: tmp_name a a la ruta imagenes concatenado con el nombre de la imagen
            move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_de_ruta . $_FILES['imagen']['name']);
            
            echo "El archivo " . $_FILES['imagen']['name'] . " se ha guardado correctamente en el directorio";
        
        }
        else {
            echo "El archivo no se ha guardado correctamente";
        }

    }

    $manejo_objetos=new manejo_objetos($miconexion);

    $blog=new objeto_blog();

    $blog->setTitulo(htmlentities(addslashes($_POST["campo_titulo"]), ENT_QUOTES));

    $blog->setFecha(Date("Y-m-d H:i:s"));

    $blog->setComentario(htmlentities(addslashes($_POST["area_comentarios"]), ENT_QUOTES));

    $blog->setImagen($_FILES["imagen"]["name"]);

    $manejo_objetos->iinsertaContenido($blog);

    echo "<br> Entrada exitosa <br>";

} catch (Exception $e) {
    die ("Error " . $e->getMessage());
}
 



?>