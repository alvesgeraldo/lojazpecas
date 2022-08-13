<?php 

  require '../../sistema-private/conexao.php';
  require '../../sistema-private/usuarios/usuarios.service.php';
  require '../../sistema-private/usuarios/usuarios.model.php';

  $conexao = new Conexao();
  $usuario = new Usuario();

  $usuario->__set('nome_usuario', $_POST['usuario']);
  $usuario->__set('senha', md5($_POST['senha']));

  $usuarioService = new UsuarioService($conexao, $usuario);
  $usuario = $usuarioService->validaLogin();

  if($usuario[0]['nome_usuario'] != '' && $usuario[0]['id_usuario']){
    
    session_start();

    $_SESSION['id_usuario'] = $usuario[0]['id_usuario'];
    $_SESSION['nome_usuario'] = $usuario[0]['nome_usuario'];
    $_SESSION['perfil'] = $usuario[0]['perfil'];

    header('location: home.php');

  } else {
    header('location: index.php?login=error');
  }

?>