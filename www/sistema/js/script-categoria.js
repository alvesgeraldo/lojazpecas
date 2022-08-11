function on() {
  document.getElementById("overlay-adicionar").style.display = "block";
}

function off() {
  document.getElementById("overlay-adicionar").style.display = "none";
}

function editarCategoria(id, valueCategoria){
  
  document.getElementById("overlay-adicionar").style.display = "block";

  let titulo = document.getElementById('titulo');
  titulo.innerHTML = 'Editar categoria';

  let btnCadastrar = document.getElementById('btn-cadastrar');
  btnCadastrar.innerHTML = 'Alterar';

  let formCategoria = document.getElementById('form-categoria');
  formCategoria.action = 'script-categoria.php?acao=atualizar';

  let inputId = document.createElement('input');
  inputId.type = 'hidden';
  inputId.value = id;
  inputId.name = 'id-categoria';

  let nome = document.getElementById('nome-cadastro');
  nome.value = valueCategoria;
  
  formCategoria.appendChild(inputId);
  console.log(valueCategoria);

}