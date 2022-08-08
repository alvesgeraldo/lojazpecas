<!DOCTYPE html>
<html lang="pt-br">
<head>
  
  <?php require 'tag-head.php'; ?>

</head>
<body>
  
  <?php require 'menu.php'; ?>

  <div class="container px-5 border-start border-end">
    <h2 class="py-3">Cadastro Categorias</h2>
    <div class="container p-3 rounded bg-secondary">
      <h5 class="text-light">Filtro de busca</h5>  
      <div class="row text-light">
        <div class="col-6">
          <label for="nome" class="form-label">Nome Categoria</label>
          <input class="form-control" type="text" name="nome-categoria" id="nome">
        </div>
        <div class="col-3">
          <label for="status" class="form-label">Status</label>
          <select class="form-select">
            <option value="1">Ativo</option>
            <option value="2">Inativo</option>
          </select>
        </div>
      </div>
      <div class="mt-1">
        <a class="btn btn-primary" href="#">Buscar</a>
      </div>
    </div>
    <div class="my-2">
        <a class="btn btn-success" href="#">Adicionar</a>
    </div>
  </div>

</body>
</html>