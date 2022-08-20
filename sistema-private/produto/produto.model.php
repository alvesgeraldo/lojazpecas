<?php

  class Produto {

    private $id_produto;
    private $nome_produto;
    private $unidade_produto;
    private $cod_prod_forn;
    private $preco_custo;
    private $preco_venda;
    private $fk_id_categoria;
    private $fk_id_marcas;
    private $nome_fornecedor;
    private $status_produto;
    private $estoque;
    private $estoque_minimo;

    public function __get($attr){
      return $this->$attr;
    }

    public function __set($attr, $valor){
      return $this->$attr = $valor;
    }
  }

?>