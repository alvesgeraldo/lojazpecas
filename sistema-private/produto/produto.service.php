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

    public function recuperar($limit, $offset){

      $query = "select 
                p.nome_produto, p.unidade_produto, p.cod_prod_forn, p.preco_custo, p.preco_venda, p.nome_fornecedor, p.status_produto, p.estoque, p.estoque_minimo, p.id_produto, p.fk_id_categoria, c.nome_categoria, p.fk_id_marcas, m.nome_marca 
                from tb_produtos as p 
                left join tb_categorias as c on (p.fk_id_categoria = c.id_categoria) 
                left join tb_marcas as m on (p.fk_id_marcas = m.id_marca) 
                order by nome_produto asc
                limit $limit offset $offset;";
      $stmt = $this->conexao->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function visualizarProduto(){

      $query = "select 
                p.nome_produto, p.unidade_produto, p.cod_prod_forn, p.preco_custo, p.preco_venda, p.nome_fornecedor, p.status_produto, p.estoque, p.estoque_minimo, p.id_produto, c.nome_categoria, m.nome_marca 
                from tb_produtos as p 
                left join tb_categorias as c on (p.fk_id_categoria = c.id_categoria) 
                left join tb_marcas as m on (p.fk_id_marcas = m.id_marca) where p.id_produto = :id_produto;";
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue('id_produto', $this->produto->__get('id_produto'));
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function remover(){

    }

    public function totalRegistros(){

      $query = 'select 
                count(*) as total 
                from tb_produtos
                order by nome_produto asc;';
      $stmt = $this->conexao->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
  }

?>