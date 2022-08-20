<?php 

  class ProdutoService {

    private $conexao;
    private $produto;

    public function __construct($conexao, $produto){
      $this->conexao = $conexao->conectar();
      $this->produto = $produto;
    }

    public function cadastrar(){

      $query = 'insert into
                tb_produtos (id_produto, nome_produto, fk_id_marcas, fk_id_categoria, unidade_produto, nome_fornecedor, cod_prod_forn, preco_custo, preco_venda, estoque, estoque_minimo, status_produto) 
                values (:id_produto, :nome_produto, :fk_id_marcas, :fk_id_categoria, :unidade_produto, :nome_fornecedor, :cod_prod_forn, :preco_custo, :preco_venda, :estoque, :estoque_minimo, :status_produto);';
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue('id_produto', $this->produto->__get('id_produto'));
      $stmt->bindValue('nome_produto', $this->produto->__get('nome_produto'));
      $stmt->bindValue('fk_id_marcas', $this->produto->__get('fk_id_marcas'));
      $stmt->bindValue('fk_id_categoria', $this->produto->__get('fk_id_categoria'));
      $stmt->bindValue('unidade_produto', $this->produto->__get('unidade_produto'));
      $stmt->bindValue('nome_fornecedor', $this->produto->__get('nome_fornecedor'));
      $stmt->bindValue('cod_prod_forn', $this->produto->__get('cod_prod_forn'));
      $stmt->bindValue('preco_custo', $this->produto->__get('preco_custo'));
      $stmt->bindValue('preco_venda', $this->produto->__get('preco_venda'));
      $stmt->bindValue('estoque', $this->produto->__get('estoque'));
      $stmt->bindValue('estoque_minimo', $this->produto->__get('estoque_minimo'));
      $stmt->bindValue('status_produto', $this->produto->__get('status_produto'));
      $stmt->execute();

    }

    public function atualizar(){

    }

    public function recuperar(){

    }

    public function remover(){

    }
  }

?>