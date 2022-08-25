function on() {
  document.getElementById("overlay-adicionar").style.display = "block";
}

function off() {
  document.getElementById("overlay-adicionar").style.display = "none";
}

function editarRegistro(id, value, title, destino){
  
  document.getElementById("overlay-adicionar").style.display = "block";

  let titulo = document.getElementById('titulo');
  titulo.innerHTML = title;

  let btnCadastrar = document.getElementById('btn-cadastrar');
  btnCadastrar.innerHTML = 'Alterar';

  let formCategoria = document.getElementById('form-categoria');
  formCategoria.action = 'script-'+destino+'.php?acao=atualizar';

  let inputId = document.createElement('input');
  inputId.type = 'hidden';
  inputId.value = id;
  inputId.name = 'id-'+destino;

  let nome = document.getElementById('nome-cadastro');
  nome.value = value;
  
  formCategoria.appendChild(inputId);

}

function excluirRegistro(id, value, destino){

  let res = confirm('Deseja excluir a categoria '+value+'?');
  
  if (res) {

    location.href = 'script-'+destino+'.php?acao=remover&id='+id;
    
  }

}

function visualizarRegistro(id){

  document.getElementById("overlay-adicionar").style.display = "block";

  inputCodProduto = document.getElementById('cod_produto');
  inputCodProduto.value = id;
  

}


