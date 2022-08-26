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

function editarRegistroProduto(id, nomeProduto, un, codForn, custo, venda, forn, status, est, estMin, cat, mar, idCat, idMar, titulo, destino){

  document.getElementById("overlay-adicionar").style.display = "block";

  cod_produto = document.getElementById('cod_produto');
  cod_produto.value = id;

  nome_cadastro = document.getElementById('nome-cadastro');
  nome_cadastro.value = nomeProduto;

  marca = document.getElementById('option_marca');
  marca.value = idMar;
  marca.innerHTML = mar;

  categoria = document.getElementById('option_categoria');
  categoria.value = idCat;
  categoria.innerHTML = cat;

  unidade = document.getElementById('unidade');
  unidade.value = un;

  fornecedor = document.getElementById('fornecedor');
  fornecedor.value = forn;

  cod_forn = document.getElementById('cod_forn');
  cod_forn.value = codForn;

  preco_custo = document.getElementById('preco_custo');
  preco_custo.value = parseFloat(custo).toLocaleString('pt-br', {minimumFractionDigits: 2});;

  preco_venda = document.getElementById('preco_venda');
  preco_venda.value = parseFloat(venda).toLocaleString('pt-br', {minimumFractionDigits: 2});;

  estoque = document.getElementById('estoque');
  estoque.value = est;

  estoque_minimo = document.getElementById('estoque_minimo');
  estoque_minimo.value = estMin;

  status_produto = document.getElementById('status_produto');
  status_produto.value = status;
  

}


