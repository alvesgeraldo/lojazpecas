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
            <tr>
              <th scope="row">1</th>
              <td>Pneus</td>
              <td>Ativo</td>
              <td>Editar - Excluir</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Camara de Ar</td>
              <td>Ativo</td>
              <td>Editar - Excluir</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Transmissão</td>
              <td>Ativo</td>
              <td>Editar - Excluir</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Câmbio</td>
              <td>Ativo</td>
              <td>Editar - Excluir</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>
</html>