<!DOCTYPE html>
<html lang="en">
<head>

  <?php require 'tag-head.php'; ?>

</head>
<body class="text-center">
  
  <div class="container box-login">
    <form action="" class="form-signin mx-auto mt-3" >
      <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
      <label for="usuario" class="sr-only">Nome de Usuário</label>
      <input type="text" placeholder="Nome de usuário" class="form-control" id="usuario" name="usuario" required autofocus>
      <input type="password" id="senha" class="form-control" placeholder="Senha" required>
      <button class="btn btn-primary mt-3" type="submit">Entrar</button>
    </form>
  </div>

</body>
</html>