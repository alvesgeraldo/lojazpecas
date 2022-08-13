<?php

  session_start();

  if($_SESSION['id_usuario'] == ''){
    header('Location: index.php?login=error');
  }

?>