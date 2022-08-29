<?php 

  require '../../sistema-private/conexao.php';
  require '../../sistema-private/produto/produto.model.php';
  require '../../sistema-private/produto/produto.service.php';
  require '../../sistema-private/categoria/categoria.model.php';
  require '../../sistema-private/categoria/categoria.service.php';
  require '../../sistema-private/marcas/marca.model.php';
  require '../../sistema-private/marcas/marca.service.php';

  $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

  switch ($acao) {
    case 'cadastrar':
      
      $conexao = new Conexao();
      $produto = new Produto();

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

      $conexao = new Conexao();
      $produto = new Produto();

      $produto->__set('id_produto', $_POST['cod-produto']);
      $produto->__set('nome_produto', $_POST['nome-produto']);
      $produto->__set('fk_id_marcas', $_POST['marca-produto']);
      $produto->__set('fk_id_categoria', $_POST['categoria-produto']);
      $produto->__set('unidade_produto', $_POST['unidade']);
      $produto->__set('cod_prod_forn', $_POST['cod-fornecedor']);
      $produto->__set('nome_fornecedor', $_POST['nome-fornecedor']);
      $produto->__set('preco_custo', str_replace(',','.', $_POST['preco-custo']));
      $produto->__set('preco_venda', str_replace(',', '.', $_POST['preco-venda']));
      $produto->__set('estoque', $_POST['estoque']);
      $produto->__set('estoque_minimo', $_POST['estoque-minimo']);
      $produto->__set('status_produto', $_POST['status-produto']);

      $produtoService = new ProdutoService($conexao, $produto);
      $produtoService->atualizar();

      header('location: cadastro-produto.php?res=edit');

      break;
    
    case 'remover':
      
      $conexao = new Conexao();
      $produto = new Produto();
      $produto->__set('id_produto', $_GET['id']);

      $produtoService = new ProdutoService($conexao, $produto);
      $produtoService->remover();

      header('location: cadastro-produto.php?res=del');
      break;

    case 'buscaProduto':

      $conexao = new Conexao();
      $produto = new Produto();

      if ($_POST['cod-produto'] != '') {
        
        $produto->__set('id_produto', $_POST['cod-produto']);
        $produtoService = new ProdutoService($conexao, $produto);
        $produtos = $produtoService->buscaPorCodigo();

      } elseif ($_POST['nome-produto'] != ''){
        
        $produto->__set('nome_produto', $_POST['nome-produto']);
        $produtoService = new ProdutoService($conexao, $produto);
        $produtos = $produtoService->buscaPorNome();

      } elseif ($_POST['marca-produto'] != ''){

        $produto->__set('fk_id_marcas', $_POST['marca-produto']);
        $produtoService = new ProdutoService($conexao, $produto);
        $produtos = $produtoService->buscaPorMarca();

      } elseif ($_POST['categoria-produto'] != ''){

        $produto->__set('fk_id_categoria', $_POST['categoria-produto']);
        $produtoService = new ProdutoService($conexao, $produto);
        $produtos = $produtoService->buscaPorCategoria();

      }
      break;

    default:
      
      $conexao = new Conexao();
      $produto = new Produto();

      $produtoService = new ProdutoService($conexao, $produto);
      $totalRegistros = $produtoService->totalRegistros();
      $totalPaginas = ceil($totalRegistros[0]['total']/5);
      $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
      $limit = 5;
      $offset = ($pagina - 1) * $limit;
      $produtos = $produtoService->recuperar($limit, $offset);

      break;
  }

  $conexao = new Conexao();
  $categoria = new Categoria();
  $marca = new Marca();

  $categoriaService = new CategoriaService($conexao, $categoria);
  $categorias = $categoriaService->recuperarCategorias();

  $marcaService = new MarcaService($conexao, $marca);
  $marcas = $marcaService->recuperarMarcas();

?>