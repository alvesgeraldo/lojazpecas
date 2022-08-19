<?php

  require './autenticacao-usuario.php';
  
  $acao = isset($_GET['acao']) && $_GET['acao'] == 'buscaCategoria' ? $_GET['acao'] : 'recuperar';
  
  require 'script-marca.php';

  if (isset($_GET['res']) && $_GET['res'] == 'success') {
    $msg = '<span class="text-light bg-success p-2 rounded">Marca cadastrada com sucesso!</span>';
  } elseif (isset($_GET['res']) && $_GET['res'] == 'error') {
    $msg = '<span class="text-light bg-danger p-2 rounded">Erro! Tente novamente preenchendo todos os campos!</span>';
  } elseif (isset($_GET['res']) && $_GET['res'] == 'edit'){
    $msg = '<span class="text-light bg-success p-2 rounded">Marca editada com sucesso!</span>';
  } elseif (isset($_GET['res']) && $_GET['res'] == 'error-2') {
    $msg = '<span class="text-dark bg-warning p-2 rounded">Marca já cadastrada!</span>';
  } elseif (isset($_GET['res']) && $_GET['res'] == 'del'){
    $msg = '<span class="text-light bg-success p-2 rounded">Marca excluida com sucesso!</span>';
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  
  <?php require 'tag-head.php'; ?>
  <script src="js/script.js"></script>

</head>
<body>
  
  <?php require 'menu.php'; ?>

  <!-- Div principal -->
  <div class="container  border-start border-end">
    <!-- Título -->
    <h2 class="py-2">Cadastro Marcas</h2>
    <!-- Div form busca -->
    <div class="container p-2 rounded bg-secondary">
      <h5 class="text-light">Filtro de busca</h5>  
      <form action="marca-produto.php?acao=buscaMarca" method="post">
        <div class="row text-light">
          <div class="col-md-8">
            <label for="nome" class="form-label">Nome Marca</label>
            <input class="form-control" type="text" name="nome-marca" id="nome">
          </div>
          <div class="col-md-4">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status-marca">
              <option value="1">Ativo</option>
              <option value="2">Inativo</option>
            </select>
          </div>
        </div>
        <div class="mt-2">
          <button class="btn btn-primary" type="submit">Buscar</button>
          <a href="categoria-produto.php" class="btn btn-light">Limpar</a>
        </div>
      </form>
    </div>
    <!-- Botão adicionar -->
    <div class="my-2">
        <a class="btn btn-success me-3 mb-2" onclick="on()">Adicionar</a>
        <div class="d-md-inline text-center"><strong><?= $msg ?></strong></div>
    </div>

    <!-- Div overlay adicionar categorias -->

    <div id="overlay-adicionar">
      <div class="container bg-secondary text-light rounded p-2 mt-5">
        <div>
          <h5 id="titulo">Cadastrar nova marca</h5>
          <form id="form-categoria" action="script-marca.php?acao=cadastrar" method="post">
            <div class="row">
              <div class="col-md-8">
                <label for="nome" class="form-label">Nome Marca</label>
                <input class="form-control" type="text" name="nome-marca" id="nome-cadastro">
              </div>
              <div class="col-md-4">
                <label for="status" class="form-label">Status</label>
                <select id="status" class="form-select" name="status-marca">
                  <option value="1">Ativo</option>
                  <option value="2">Inativo</option>
                </select>
              </div>
            </div>
            <div class="mt-2">
              <button id="btn-cadastrar" class="btn btn-primary" onclick="off()" type="submit">Salvar</button>
              <a class="btn btn-danger" onclick="off()" href="marca-produto.php">Voltar</a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Div table lista -->
    <div class="container pt-1 mb-2 rounded bg-secondary">
      <div class="bg-light my-1 table-responsive">
        <table class="table">
          <thead class="bg-dark text-light">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nome</th>
              <th scope="col">Status</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($marcas as $key => $marca) { ?>
              <tr>
                <th scope="row" id="marca_<?=$marca['id_marca']?>"><?= $marca['id_marca'] ?></th>
                <td id="nome_marca_<?=$marca['id_marca']?>"><?= $marca['nome_marca'] ?></td>
                <td id="status_marca_<?=$marca['id_marca']?>"><?php 
                  $registro['status_marca'] == 1 ? 'Ativo' : 'Inativo';
                  
                ?></td>
                <td>
                  <button class="btn btn-outline-success my-1" onclick="editarRegistro(<?=$marca['id_marca']?>, '<?= $marca['nome_marca'] ?>', 'Editar marca', 'marca')"><i class="fa-solid fa-pen-to-square"></i></button>
                  <button class="btn btn-outline-danger" onclick="excluirRegistro(<?=$marca['id_marca']?>, '<?= $marca['nome_marca'] ?>', 'marca')"><i class="fa-solid fa-trash"></i></button>
                </td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="?pagina=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php for ($i=1; $i <= $totalPaginas; $i++) { ?>
              <li class="page-item <?= $pagina == $i ? 'active' : ''; ?>"><a class="page-link" href="?pagina=<?=$i?>"><?= $i ?></a></li>
            <?php } ?>
            <li class="page-item">
              <a class="page-link" href="?pagina=<?=$totalPaginas?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

</body>
</html>