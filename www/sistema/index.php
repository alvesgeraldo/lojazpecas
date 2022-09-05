<?php 

  if(isset($_GET['login']) && $_GET['login'] == 'error'){
    $msg = '<span class="text-danger mt-2"> Usuário ou senha inválidos! </span>';
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <?php require 'tag-head.php'; ?>

</head>
<body class="text-center" id="body">
  <main class="form-signin w-100 m-auto">
    <form action="./valida-login.php" method="post">
      <img class="mb-4" src="../img/logo.jpg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Fazer login</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nome de usuário">
        <label for="usuario">Usuário</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
        <label for="senha">Senha</label>
      </div>
      <div class="mt-2"><?= $msg ?></div>
      <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>

    </form>
  </main>

</body>
</html>