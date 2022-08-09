<?php

  class Categoria {

    private $id;
    private $nome_categoria;
    private $status_categoria;

    public function __get($attr){
      return $this->$attr;
    }

    public function __set($attr, $valor){
      return $this->$attr = $valor;
    }

  }

?>