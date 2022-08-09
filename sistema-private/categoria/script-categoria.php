<?php

  require '../../sistema-private/conexao.php';
  require '../../sistema-private/categoria/categoria.model.php';
  require '../../sistema-private/categoria/categoria.service.php';

  
  if($acao == 'recuperar'){

    $categoria = new Categoria();
    $conexao = new Conexao();

    $categoriaService = new CategoriaService($conexao, $categoria);
    $categorias = $categoriaService->recuperar();

  }



?>