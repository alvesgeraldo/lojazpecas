<?php 

  class ProdutoService {

    private $conexao;
    private $produto;

    public function __construct($conexao, $produto){
      $this->conexao = $conexao->conectar();
      $this->produto = $produto;
    }

    public function cadastrar(){

    }

    public function atualizar(){

    }

    public function recuperar(){

    }

    public function remover(){
      
    }
  }

?>