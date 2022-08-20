<?php 

  require '../../sistema-private/conexao.php';
  require '../../sistema-private/produto/produto.model.php';
  require '../../sistema-private/produto/produto.service.php';

  $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

  switch ($acao) {
    case 'cadastrar':
      
      $conexao = new Conexao();
      $produto = new Produto();

      echo '<pre>';
      print_r($_POST);
      echo '</pre>';

      if ($_POST['cod-produto'] == '' || $_POST['nome-produto'] == '' || $_POST['unidade'] == '' || $_POST['preco-venda'] == '') {
        header('location: cadastro-produto.php?res=error');
      } else {
        
        $produto->__set('id_produto', $_POST['cod-produto']);
        $produto->__set('nome_produto', $_POST['nome-produto']);
        $produto->__set('fk_id_marcas', $_POST['marca-produto']);
        $produto->__set('fk_id_categoria', $_POST['categoria-produto']);
        $produto->__set('unidade_produto', $_POST['unidade']);
        
        if ($_POST['nome-fornecedor'] == '') {
          $produto->__set('nome_fornecedor', 'Não Informado');
        }else {
          $produto->__set('nome_fornecedor', $_POST['nome-fornecedor']);
        }
        
        if ($_POST['cod-fornecedor'] == '') {
          $produto->__set('cod_prod_forn', '0');
        } else {
          $produto->__set('cod_prod_forn', $_POST['cod-fornecedor']);
        }
        
        if ($_POST['preco-custo'] == '') {
          $produto->__set('preco_custo', '0.00');
        } else {
          $produto->__set('preco_custo', str_replace(',','.', $_POST['preco-custo']));
        }

        $produto->__set('preco_venda', str_replace(',', '.', $_POST['preco-venda']));
        
        if ($_POST['estoque'] == '') {
          $produto->__set('estoque', '0');
        } else {
          $produto->__set('estoque', $_POST['estoque']);
        }
          
        if ($_POST['estoque-minimo'] == '') {
          $produto->__set('estoque_minimo', '0');
        } else {
          $produto->__set('estoque_minimo', $_POST['estoque-minimo']);
        }

        $produto->__set('status_produto', $_POST['status-produto']);

        $produtoService = new ProdutoService($conexao, $produto);
        $produtoService->cadastrar();

        header('location: cadastro-produto.php?res=success');
      }
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