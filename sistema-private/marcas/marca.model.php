<?php

  class Marca {

    private $id_marca;
    private $nome_marca;
    private $status_marca;

    public function __get($attr){
      return $this->$attr;
    }

    public function __set($attr, $valor){
      return $this->$attr = $valor;
    }
    
  }

?>