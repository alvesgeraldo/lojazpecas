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

  let res = confirm('Deseja excluir '+value+'?');
  
  if (res) {

    location.href = 'script-'+destino+'.php?acao=remover&id='+id;
    
  }

}

function editarRegistroProduto(id, nomeProduto, un, codForn, custo, venda, forn, status, est, estMin, cat, mar, idCat, idMar, title, destino){

  document.getElementById("overlay-adicionar").style.display = "block";

  let cod_produto = document.getElementById('cod_produto');
  cod_produto.value = id;
  cod_produto.setAttribute('readonly', 'readonly');
  cod_produto.setAttribute('class', 'form-control-plaintext text-light');

  let nome_cadastro = document.getElementById('nome-cadastro');
  nome_cadastro.value = nomeProduto;

  let marca = document.getElementById('option_marca');
  marca.value = idMar;
  marca.innerHTML = mar;

  let categoria = document.getElementById('option_categoria');
  categoria.value = idCat;
  categoria.innerHTML = cat;

  let unidade = document.getElementById('unidade');
  unidade.value = un;

  let fornecedor = document.getElementById('fornecedor');
  fornecedor.value = forn;

  let cod_forn = document.getElementById('cod_forn');
  cod_forn.value = codForn;

  let preco_custo = document.getElementById('preco_custo');
  preco_custo.value = parseFloat(custo).toLocaleString('pt-br', {minimumFractionDigits: 2});;

  let preco_venda = document.getElementById('preco_venda');
  preco_venda.value = parseFloat(venda).toLocaleString('pt-br', {minimumFractionDigits: 2});;

  let estoque = document.getElementById('estoque');
  estoque.value = est;

  let estoque_minimo = document.getElementById('estoque_minimo');
  estoque_minimo.value = estMin;

  let status_produto = document.getElementById('status_produto');
  status_produto.value = status;
  
  let titulo = document.getElementById('titulo');
  titulo.innerHTML = title;

  let btnCadastrar = document.getElementById('btn-cadastrar');
  btnCadastrar.innerHTML = 'Alterar';

  let formProduto = document.getElementById('form-produto');
  formProduto.action = 'script-'+destino+'.php?acao=atualizar';

}


