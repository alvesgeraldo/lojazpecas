<?php

  require '../../sistema-private/conexao.php';
  require '../../sistema-private/categoria/categoria.model.php';
  require '../../sistema-private/categoria/categoria.service.php';

  $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

  echo $acao;
  
  if($acao == 'recuperar'){

    $categoria = new Categoria();
    $conexao = new Conexao();

    $categoriaService = new CategoriaService($conexao, $categoria);
    $categorias = $categoriaService->recuperar();
    
  } elseif ($acao == 'buscaCategoria'){

    $categoria = new Categoria();
    $conexao = new Conexao();

    $categoria->__set('nome_categoria', $_POST['nome-categoria']);
    $categoria->__set('status_categoria', $_POST['status-categoria']);

    $categoriaService = new CategoriaService($conexao, $categoria);
    $filtrocategorias = $categoriaService->buscaCategoria();

    echo '<pre>';
    print_r($filtrocategorias);
    echo '</pre>';

    // header('location: categoria-produto.php');

  }



?>