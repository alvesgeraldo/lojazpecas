<?php 

  if(isset($_GET['login']) && $_GET['login'] == 'error'){
    $msg = '<span class="text-danger mt-2"> Usuário ou senha inválidos! </span>';
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

  <?php require 'tag-head.php'; ?>

</head>
<body class="text-center">
  
  <div class="container box-login">
    <form action="./valida-login.php" method="post" class="form-signin mx-auto mt-3" >
      <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
      <label for="usuario" class="sr-only">Nome de Usuário</label>
      <input type="text" placeholder="Nome de usuário" class="form-control" id="usuario" name="usuario" required autofocus>
      <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
      <div class="mt-2"><?= $msg ?></div>
      <button class="btn btn-primary mt-3" type="submit">Entrar</button>
    </form>
  </div>

</body>
</html>