<?php 

  class Usuario {

    private $id_usuario;
    private $nome_usuario;
    private $status_usuario;
    private $senha;
    private $perfil;

    public function __get($attr){
      return $this->$attr;
    }

    public function __set($attr, $valor){
      return $this->$attr = $valor;
    }
  }

?>