<?php

  class CategoriaService {

    private $conexao;
    private $categoria;

    public function __construct($conexao, $categoria) {
      $this->conexao = $conexao->conectar();
      $this->categoria = $categoria;
    }

    public function cadastrar(){

      $query = 'insert into
               tb_categorias (nome_categoria, status_categoria) 
               values (?, ?);';
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue(1, $this->categoria->__get('nome_categoria'));
      $stmt->bindValue(2, $this->categoria->__get('status_categoria'));
      $stmt->execute();
      
    }

    public function recuperar(){
      
      $query = 'select 
                id_categoria, nome_categoria, status_categoria 
                from tb_categorias;';
      $stmt = $this->conexao->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
      
    }

    public function atualizar(){

    }

    public function remover(){
      
    }

    public function buscaCategoria(){

      if($this->categoria->__get('nome_categoria') == ''){
        $query = 'select 
                id_categoria, nome_categoria, status_categoria 
                from tb_categorias 
                where status_categoria = ?;';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->categoria->__get('status_categoria'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } else {
        $query = 'select 
                  id_categoria, nome_categoria, status_categoria 
                  from tb_categorias 
                  where nome_categoria = ? and status_categoria = ?;';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->categoria->__get('nome_categoria'));
        $stmt->bindValue(2, $this->categoria->__get('status_categoria'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      
    }

  }

?>