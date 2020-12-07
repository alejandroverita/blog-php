<?php

class objeto_blog {
//declaracion de propiedades y atributos del objeto blog
//private para encapsular esas propiedades y que solo se puedan modificar desde el propio objeto y no desde fuera

    private $id;

    private $titulo;

    private $fecha;

    private $comentarios;

    private $imagen;

//-------------METODOS DE ACCESSO GETTERS AND SETTERS

//los getters son los encargados de proporcionarnos el valor de la propiedad
    public function getId(){

        //return que nos muestra la propiedad ID
        return $this->id;

    }

     public function setId($id) {
         $this->id=$id;
     }

     public function getTitulo(){

        //return que nos muestra la propiedad titulo
        return $this->titulo;

    }

     public function setTitulo($titulo) {
         $this->titulo=$titulo;
     }

     public function getFecha(){

        //return que nos muestra la propiedad fecha
        return $this->fecha;

    }

     public function setFecha($fecha) {
         $this->fecha=$fecha;
     }

     public function getComentarios(){

        //return que nos muestra la propiedad comentario
        return $this->comentarios;

    }

     public function setComentarios($comentarios) {
         $this->comentarios=$comentarios;
     }

     public function getImagen(){

        //return que nos muestra la propiedad imagen
        return $this->imagen;

    }

     public function setImagen($imagen) {
         $this->imagen=$imagen;
     }

}




?>