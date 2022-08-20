<?php

  require '../../sistema-private/conexao.php';
  require '../../sistema-private/marcas/marca.model.php';
  require '../../sistema-private/marcas/marca.service.php';

  $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

  switch ($acao) {
    case 'cadastrar':
      
      if($_POST['nome-marca'] == '' || $_POST['status-marca'] == ''){
        header('location: marca-produto.php?res=error');
      } else {

        $conexao = new Conexao();
        $marca = new Marca();
        $marca->__set('nome_marca', $_POST['nome-marca']);
        $marca->__set('status_marca', $_POST['status-marca']);

        $marcaService = new MarcaService($conexao, $marca);
        $marcas = $marcaService->buscaMarca();
        
        if(strtolower($_POST['nome-marca']) == strtolower($marcas[0]['nome_marca'])){
          header('location: marca-produto.php?res=error-2');
        } else {
          $marcaService->cadastrar();

          header('location: marca-produto.php?res=success');
        }
      }
    break;

    case 'atualizar':
      
      $conexao = new Conexao();
      $marca = new Marca();
      $marca->__set('id_marca', $_POST['id-marca']);
      $marca->__set('nome_marca', $_POST['nome-marca']);
      $marca->__set('status_marca', $_POST['status-marca']);

      $marcaService = new MarcaService($conexao, $marca);
      $marcaService->atualizar();

      header('location: marca-produto.php?res=edit');
      break;

    case 'remover':
      
      $conexao = new Conexao();
      $marca = new Marca();
      $marca->__set('id_marca', $_GET['id']);

      $marcaService = new MarcaService($conexao, $marca);
      $marcaService->remover();

      header('location: marca-produto.php?res=del');
      break;

    case 'buscaMarca':
      
      $conexao = new Conexao();
      $marca = new Marca();

      if ($_POST['nome-marca'] == '') {
        $marca->__set('status_marca', $_POST['status-marca']);
      } else {
        $marca->__set('nome_marca', $_POST['nome-marca']);
        $marca->__set('status_marca', $_POST['status-marca']);
      }
      
      $marcaService = new MarcaService($conexao, $marca);
      $marcas = $marcaService->buscaMarca();
      break;
    
    default:
      
      $conexao = new Conexao();
      $marca = new Marca();

      $marcaService = new MarcaService($conexao, $marca);
      $totalRegistros = $marcaService->totalRegistros();
      $totalPaginas = ceil($totalRegistros[0]['total']/5);
      $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
      $limit = 5;
      $offset = ($pagina - 1) * $limit;

      $marcas = $marcaService->recuperar($limit, $offset);
      break;
  }

?>