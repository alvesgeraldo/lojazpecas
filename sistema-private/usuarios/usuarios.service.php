<?php 

  class UsuarioService {

    private $usuario;
    private $conexao;

    public function __construct($conexao, $usuario) {
      $this->conexao = $conexao->conectar();
      $this->usuario = $usuario;
    }

    public function cadastrar(){

    }

    public function recuperar(){

    }

    public function atualizar(){

    }

    public function remover(){

    }

    public function validaLogin(){

      $query = 'select 
                id_usuario, nome_usuario, perfil 
                from 
                tb_usuarios 
                where 
                nome_usuario = :nome_usuario and senha = :senha;';
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue('nome_usuario', $this->usuario->__get('nome_usuario'));
      $stmt->bindValue('senha', $this->usuario->__get('senha'));
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
  }

?>