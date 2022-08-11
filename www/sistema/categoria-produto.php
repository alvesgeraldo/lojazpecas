<?php

  $acao = 'recuperar';
  require 'script-categoria.php';

  $msg;
  if (isset($_GET['res']) && $_GET['res'] == 'success') {
    $msg = '<span class="text-success">Categoria cadastrada com sucesso!</span>';
  } elseif (isset($_GET['res']) && $_GET['res'] == 'error') {
    $msg = '<span class="text-danger">Erro! Tente novamente preenchendo todos os campos!</span>';
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  
  <?php require 'tag-head.php'; ?>

</head>
<body>
  
  <?php require 'menu.php'; ?>

  <!-- Div principal -->
  <div class="container px-5 border-start border-end">
    <!-- Título -->
    <h2 class="py-3">Cadastro Categorias</h2>
    <!-- Div form busca -->
    <div class="container p-4 rounded bg-secondary">
      <h5 class="text-light">Filtro de busca</h5>  
      <form action="script-categoria.php?acao=buscaCategoria" method="post">
        <div class="row text-light">
          <div class="col-8">
            <label for="nome" class="form-label">Nome Categoria</label>
            <input class="form-control" type="text" name="nome-categoria" id="nome">
          </div>
          <div class="col-4">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status-categoria">
              <option value="1">Ativo</option>
              <option value="2">Inativo</option>
            </select>
          </div>
        </div>
        <div class="mt-2">
          <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
      </form>
    </div>
    <!-- Botão adicionar -->
    <div class="my-2">
        <a class="btn btn-success" onclick="on()">Adicionar</a>
        <div><?= $msg ?></div>
    </div>

    <!-- Div overlay adicionar categorias -->

    <div id="overlay-adicionar">
      <div class="container bg-secondary text-light rounded p-5 mt-5">
        <div>
          <h5>Cadastrar nova categoria</h5>
          <form action="script-categoria.php?acao=cadastrar" method="post">
            <div class="row">
              <div class="col-8">
                <label for="nome" class="form-label">Nome Categoria</label>
                <input class="form-control" type="text" name="nome-categoria" id="nome">
              </div>
              <div class="col-4">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status-categoria">
                  <option value="1">Ativo</option>
                  <option value="2">Inativo</option>
                </select>
              </div>
            </div>
            <div class="mt-2">
              <button class="btn btn-primary" onclick="off()" type="submit">Salvar</button>
              <a class="btn btn-danger" onclick="off()" href="categoria-produto.php">Voltar</a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Div table lista -->
    <div class="container p-3 rounded bg-secondary">
      <div class="bg-light m-3">
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

            <?php foreach ($categorias as $key => $categoria) { ?>
              <tr>
                <th scope="row"><?= $categoria['id_categoria'] ?></th>
                <td><?= $categoria['nome_categoria'] ?></td>
                <td><?php 
                  if($categoria['status_categoria'] == 1){
                    echo 'Ativo';
                  } elseif ($categoria['status_categoria'] == 2){
                    echo 'Inativo';
                  }
                ?></td>
                <td>
                  <a class="btn btn-outline-success" href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                  <a class="btn btn-outline-danger" href="#"><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>

      function on() {
        document.getElementById("overlay-adicionar").style.display = "block";
      }

      function off() {
        document.getElementById("overlay-adicionar").style.display = "none";
      } 

  </script>

</body>
</html>