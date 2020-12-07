<?php

//incluir los metodos getters y setters y clases 
include("objeto_blog.php");

class manejo_objetos {

    private $conexion;

    public function __construct($conexion) {
        //a lo que inicie la funcion llamara al siguiente metodo
        $this->setConexion($conexion);
    }

    public function setConexion(PDO $conexion) {

        $this->conexion=$conexion;

    }

    //crear metodos para obtener las entradas de la bbdd

    public function getContenidoPorFecha() {

        $matriz=array();

        $contador=0;

        $resultado=$this->conexion->query("SELECT * FROM CONTENIDO ORDER BY FECHA");

        //OBJETO BLOB
        while (($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {

            # INSTANCIA DE LA CLASE OBJETO_BLOG
            $blog=new objeto_blog();

            $blog->setId($registro["ID"]);
            $blog->setTitulo($registro["TITULO"]);
            $blog->setFecha($registro["FECHA"]);
            $blog->setComentario($registro["COMENTARIO"]);
            $blog->setImagen($registro["IMAGEN"]);

        //almacenar dentro del array el primer objeto creado
            $matriz[$contador]=$blog;

            $contador++;


        }
        return $matriz;
    }

    public function insertaContenido(objeto_blog $blog) {

        $sql="INSERT INTO CONTENIDO (TITULO, FECHA, COMENTARIO, IMAGEN) VALUES ('" . $blog->getTitulo() . "', '" . $blog->getFecha() . "', '" . $blog->getComentario() . "', '" . $blog->getImagen() . "')"; 

        $this->conexion->exec($sql);
    }

}


?>