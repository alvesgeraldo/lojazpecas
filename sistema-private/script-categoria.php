<?php

  require '../../sistema-private/conexao.php';

  print_r($_POST);
  echo '<br>';
  $conexao = new Conexao();
  print_r($conexao);

?>