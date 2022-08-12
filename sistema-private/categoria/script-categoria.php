<?php

  require '../../sistema-private/conexao.php';
  require '../../sistema-private/categoria/categoria.model.php';
  require '../../sistema-private/categoria/categoria.service.php';

  $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

  // echo $acao;
  
  if($acao == 'recuperar'){

    $categoria = new Categoria();
    $conexao = new Conexao();

    $categoriaService = new CategoriaService($conexao, $categoria);
    $categorias = $categoriaService->recuperar();
    
  } elseif ($acao == 'buscaCategoria'){

    if($_POST['nome-categoria'] == ''){
      
      $categoria = new Categoria();
      $conexao = new Conexao();

      $categoria->__set('status_categoria', $_POST['status-categoria']);

      $categoriaService = new CategoriaService($conexao, $categoria);
      $categorias = $categoriaService->buscaCategoria();

    } else {
      $categoria = new Categoria();
      $conexao = new Conexao();

      $categoria->__set('nome_categoria', $_POST['nome-categoria']);
      $categoria->__set('status_categoria', $_POST['status-categoria']);

      $categoriaService = new CategoriaService($conexao, $categoria);
      $categorias = $categoriaService->buscaCategoria();
    }
    
  } elseif ($acao == 'cadastrar'){

    if($_POST['nome-categoria'] == '' || $_POST['status-categoria'] == ''){
      header('location: categoria-produto.php?res=error');
    } else {
      $categoria = new Categoria();
      $conexao = new Conexao();

      $categoria->__set('nome_categoria', $_POST['nome-categoria']);
      $categoria->__set('status_categoria', $_POST['status-categoria']);

      $categoriaService = new CategoriaService($conexao, $categoria);
      $categorias = $categoriaService->buscaCategoria();
      
      $newCategoria = $_POST['nome-categoria'];

      if(strtolower($newCategoria) == strtolower($categorias[0]['nome_categoria'])){
        header('location: categoria-produto.php?res=error-2');
      } else {
        $categoriaService->cadastrar();

        header('location: categoria-produto.php?res=success');
      }
      
    }
    
  } elseif ($acao == 'atualizar') {
    
    $categoria = new Categoria();
    $conexao = new Conexao();

    $categoria->__set('status_categoria', $_POST['status-categoria']);
    $categoria->__set('nome_categoria', $_POST['nome-categoria']);
    $categoria->__set('id_categoria', $_POST['id-categoria']);

    $categoriaService = new CategoriaService($conexao, $categoria);
    $categoriaService->atualizar();

    header('location: categoria-produto.php?res=edit');

  } elseif ($acao == 'remover'){

    $categoria = new Categoria();
    $conexao = new Conexao();

    $categoria->__set('id_categoria', $_GET['id']);
    
    $categoriaService = new CategoriaService($conexao, $categoria);
    $categoriaService->remover();

    header('location: categoria-produto.php?res=del');
  }



?>