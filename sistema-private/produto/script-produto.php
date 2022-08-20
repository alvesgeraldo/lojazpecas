<?php 

  require '../../sistema-private/conexao.php';
  require '../../sistema-private/produto/produto.model.php';
  require '../../sistema-private/produto/produto.service.php';

  $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

  switch ($acao) {
    case 'cadastrar':
      echo 'Estamos aqui cadastrar';
      break;
    
    case 'atualizar':
      echo 'Estamos aqui atualizar';
      break;
    
    case 'remover':
      echo 'Estamos aqui remover';
      break;

    default:
      echo 'Estamos aqui recuperar';
      break;
  }
?>