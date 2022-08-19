<?php

  class MarcaService {

    private $conexao;
    private $marca;

    public function __construct($conexao, $marca) {
      $this->conexao = $conexao->conectar();
      $this->marca = $marca;
    }

    public function cadastrar(){

      $query = 'insert into
               tb_marcas (nome_marca, status_marca) 
               values (:nome_marca, :status_marca);';
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue('nome_marca', $this->marca->__get('nome_marca'));
      $stmt->bindValue('status_marca', $this->marca->__get('status_marca'));
      $stmt->execute();

    }

    public function recuperar($limit, $offset){

      $query = "select 
                id_marca, nome_marca, status_marca 
                from tb_marcas
                order by nome_marca asc
                limit $limit offset $offset;";
      $stmt = $this->conexao->prepare($query);
      $stmt->execute();        
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function atualizar(){

    }

    public function remover(){

    }

    public function buscaMarca(){
      
      if($this->marca->__get('nome_marca') == ''){
        $query = 'select 
                id_marca, nome_marca, status_marca 
                from tb_marcas 
                where status_marca = :status_marca
                order by nome_marca asc;';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue('status_marca', $this->marca->__get('status_marca'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } else {
        $query = 'select 
                  id_marca, nome_marca, status_marca 
                  from tb_marcas 
                  where nome_marca like :nome_marca and status_marca = :status_marca;';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue('nome_marca', $this->marca->__get('nome_marca').'%');
        $stmt->bindValue('status_marca', $this->marca->__get('status_marca'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

    }

    public function totalRegistros(){

      $query = 'select 
                count(*) as total 
                from tb_marcas
                order by nome_marca asc;';
      $stmt = $this->conexao->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


  }

?>