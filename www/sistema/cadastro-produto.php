<?php

  require './autenticacao-usuario.php';
  
  $acao = isset($_GET['acao']) ? $_GET['acao'] : 'recuperar';
  
  require 'script-produto.php';

  if (isset($_GET['res']) && $_GET['res'] == 'success') {
    $msg = '<span class="text-light bg-success p-2 rounded">Produto cadastrado com sucesso!</span>';
  } elseif (isset($_GET['res']) && $_GET['res'] == 'error') {
    $msg = '<span class="text-light bg-danger p-2 rounded">Erro! Preencha todos os campos obrigatórios(*)!</span>';
  } elseif (isset($_GET['res']) && $_GET['res'] == 'edit'){
    $msg = '<span class="text-light bg-success p-2 rounded">Produto editado com sucesso!</span>';
  } elseif (isset($_GET['res']) && $_GET['res'] == 'error-2') {
    $msg = '<span class="text-dark bg-warning p-2 rounded">Produto já cadastrado!</span>';
  } elseif (isset($_GET['res']) && $_GET['res'] == 'del'){
    $msg = '<span class="text-light bg-success p-2 rounded">Produto excluido com sucesso!</span>';
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
    <h2 class="py-2">Cadastro Produtos</h2>
    <!-- Div form busca -->
    <div class="container p-2 rounded bg-secondary">
      <h5 class="text-light">Filtro de busca</h5>  
      <form action="cadastro-produto.php?acao=buscaProduto" method="post">
        <div class="row text-light">
          <div class="col-md-3">
            <label for="cod-produto" class="form-label">Código Produto</label>
            <input class="form-control" type="text" name="cod-produto" id="cod-produto">
          </div>
          <div class="col-md-5">
            <label for="nome" class="form-label">Nome Produto</label>
            <input class="form-control" type="text" name="nome-produto" id="nome">
          </div>
          <div class="col-md-2">
            <label for="marca" class="form-label">Marca</label>
            <select class="form-select" name="marca-produto">
                <option value=""></option>
              <?php foreach ($marcas as $key => $marca) { ?>
                <option value="<?= $marca['id_marca']?>"> <?= $marca['nome_marca'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-md-2">
            <label for="categoria" class="form-label">Categoria</label>
            <select class="form-select" name="categoria-produto">
                <option value=""></option>
              <?php foreach ($categorias as $key => $categoria) { ?>
                <option value="<?= $categoria['id_categoria']?>"> <?= $categoria['nome_categoria'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="mt-2">
          <button class="btn btn-primary" type="submit">Buscar</button>
          <a href="cadastro-produto.php" class="btn btn-light">Limpar</a>
        </div>
      </form>
    </div>
    <!-- Botão adicionar -->
    <div class="my-2">
        <a class="btn btn-success me-3 mb-2" onclick="on()">Adicionar</a>
        <div class="d-md-inline text-center"><strong><?= $msg ?></strong></div>
    </div>

    <!-- Div overlay adicionar produtos -->

    <div id="overlay-adicionar">
      <div class="container bg-secondary text-light rounded p-2 mt-5">
        <div>
          <h5 id="titulo">Cadastrar novo produto</h5>
          <form id="form-produto" action="script-produto.php?acao=cadastrar" method="post">
            <div class="row">
              <div class="col-md-4">
                <label for="cod_produto" class="form-label">*Código Produto</label>
                <input type="text" name="cod-produto" id="cod_produto" class="form-control">
              </div>
              <div class="col-md-8">
                <label for="nome" class="form-label">*Nome produto</label>
                <input class="form-control" type="text" name="nome-produto" id="nome-cadastro">
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <label for="marca" class="form-label">Marca</label>
                <select id="marca" class="form-select" name="marca-produto">
                    <option id="option_marca" value=""></option>
                  <?php foreach ($marcas as $key => $marca) { ?>
                    <option value="<?= $marca['id_marca']?>"> <?= $marca['nome_marca'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-4">
                <label for="categoria" class="form-label">Categoria</label>
                <select id="categoria" class="form-select" name="categoria-produto">
                    <option id="option_categoria" value=""></option>
                  <?php foreach ($categorias as $key => $categoria) { ?>
                    <option value="<?= $categoria['id_categoria']?>"> <?= $categoria['nome_categoria'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-4">
                <label for="unidade" class="form-label">*Unidade</label>
                <input type="text" name="unidade" id="unidade" class="form-control">
              </div>
            </div>

            <div class="row">
              <div class="col-md-8">
                  <label for="fornecedor" class="form-label">Nome Fornecedor</label>
                  <input type="text" name="nome-fornecedor" id="fornecedor" class="form-control">
              </div>
              <div class="col-md-4">
                <label for="cod_forn" class="form-label">Código Fornecedor</label>
                <input type="text" name="cod-fornecedor" id="cod_forn" class="form-control">
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                  <label for="preco_custo" class="form-label">Preço Custo</label>
                  <input type="text" name="preco-custo" id="preco_custo" class="form-control">
              </div>
              <div class="col-md-3">
                  <label for="preco_venda" class="form-label">*Preço Venda</label>
                  <input type="text" name="preco-venda" id="preco_venda" class="form-control">
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                  <label for="estoque" class="form-label">Estoque</label>
                  <input type="number" name="estoque" id="estoque" class="form-control">
              </div>
              <div class="col-md-3">
                  <label for="estoque_minimo" class="form-label">Estoque Mínimo</label>
                  <input type="number" name="estoque-minimo" id="estoque_minimo" class="form-control">
              </div>
              <div class="col-md-3">
                <label for="status_produto" class="form-label">Status</label>
                <select id="status_produto" class="form-select" name="status-produto">
                  <option value="1">Ativo</option>
                  <option value="2">Inativo</option>
                </select>
              </div>
            </div>

            <div class="mt-2">
              <button id="btn-cadastrar" class="btn btn-primary" onclick="off()" type="submit">Salvar</button>
              <a class="btn btn-danger" onclick="off()" href="cadastro-produto.php">Voltar</a>
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
              <th scope="col">Preço Venda</th>
              <th scope="col">Estoque</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($produtos as $key => $produto) { ?>
              <tr>
                <th scope="row" id="produto_<?=$produto['id_produto']?>"><?= $produto['id_produto'] ?></th>
                <td id="nome_produto_<?=$produto['id_produto']?>"><?= $produto['nome_produto'] ?></td>
                <td id="preco_venda_<?=$produto['id_produto']?>"><?= number_format($produto['preco_venda'], 2, ',', '.') ?></td>
                <td id="estoque_<?=$produto['estoque']?>"> <?=$produto['estoque']?> </td>
                <td>
                  
                  <button class="btn btn-outline-success my-1" onclick="editarRegistroProduto(<?=$produto['id_produto']?>, '<?= $produto['nome_produto'] ?>', '<?= $produto['unidade_produto'] ?>', '<?= $produto['cod_prod_forn'] ?>', '<?= $produto['preco_custo'] ?>', '<?= $produto['preco_venda'] ?>', '<?= $produto['nome_fornecedor'] ?>', '<?= $produto['status_produto'] ?>', '<?= $produto['estoque'] ?>', '<?= $produto['estoque_minimo'] ?>', '<?= $produto['nome_categoria'] ?>', '<?= $produto['nome_marca'] ?>', '<?= $produto['fk_id_categoria'] ?>', '<?= $produto['fk_id_marcas'] ?>', 'Editar produto', 'produto')"><i class="fa-solid fa-pen-to-square"></i></button>
                  
                  <button class="btn btn-outline-danger" onclick="excluirRegistro(<?=$produto['id_produto']?>, '<?= $produto['nome_produto'] ?>', 'produto')"><i class="fa-solid fa-trash"></i></button>
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