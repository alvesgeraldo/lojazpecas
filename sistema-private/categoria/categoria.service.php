<?php

  class CategoriaService {

    private $conexao;
    private $categoria;

    public function __construct($conexao, $categoria) {
      $this->conexao = $conexao->conectar();
      $this->categoria = $categoria;
    }

    public function cadastar(){

    }

    public function recuperar(){
      
      $query = 'select * from tb_categorias;';
      $stmt = $this->conexao->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
      
    }

    public function atualizar(){

    }

    public function remover(){
      
    }

  }

?>