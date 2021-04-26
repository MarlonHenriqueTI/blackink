jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});


   
   
});


function deletar(id, tabela){
  if(confirm("Tem certeza que deseja remover este registro? Esta ação não tem volta.")){
    window.location.href="http://dropink.art.br/functions.php?deletar=sim&id="+id+"&tabela="+tabela;
  }
}

function deletarAttSaldo(id, tabela, valor, id_estudio){
  if(confirm("Tem certeza que deseja remover este registro? Esta ação não tem volta.")){
    window.location.href="http://dropink.art.br/functions.php?deletar=sim&id="+id+"&tabela="+tabela+"&valor="+valor+"&id_estudio="+id_estudio;
  }
}

$(document).ready(function(){
    $('[name=telefone]').mask('(00) 00000-000#');
    $('[name=cpf]').mask('000.000.000-00');
    $('[name=cep]').mask('00000-000');
    $('[name=whatsapp]').mask('(00) 0 0000-0000');



// Registra o evento blur do campo "cep", ou seja, a pesquisa será feita
      // quando o usuário sair do campo "cep"
      $("[name=cep]").blur(function(){
        // Remove tudo o que não é número para fazer a pesquisa
        var cep = this.value.replace(/[^0-9]/, "");
        
        // Validação do CEP; caso o CEP não possua 8 números, então cancela
        // a consulta
        if(cep.length != 8){
          return false;
        }
        
        // A url de pesquisa consiste no endereço do webservice + o cep que
        // o usuário informou + o tipo de retorno desejado (entre "json",
        // "jsonp", "xml", "piped" ou "querty")
        var url = "https://viacep.com.br/ws/"+cep+"/json/";
        
        // Faz a pesquisa do CEP, tratando o retorno com try/catch para que
        // caso ocorra algum erro (o cep pode não existir, por exemplo) a
        // usabilidade não seja afetada, assim o usuário pode continuar//
        // preenchendo os campos normalmente
        $.getJSON(url, function(dadosRetorno){
          try{
            // Preenche os campos de acordo com o retorno da pesquisa
            $("[name=endereco]").val(dadosRetorno.logradouro);
            $("[name=bairro]").val(dadosRetorno.bairro);
            $("[name=cidade]").val(dadosRetorno.localidade);
            $("[name=uf]").val(dadosRetorno.uf);
          }catch(ex){}
        });
      });

      });



function calcularServico(){
  var material = document.getElementsByName('material'); 
  var comissao_venda = document.getElementsByName('comissao_venda');
  var comissao = document.getElementsByName('comissao');
  var juros = document.getElementsByName('juros');
  var outros = document.getElementsByName('outros'); 
  var lucro = document.getElementsByName('lucro');
  var curtidas = document.getElementsByName('curtidas');
  var fidelizado = document.getElementsByName('fidelizado');
  var promocao = document.getElementsByName('promocao');
  var credito = document.getElementsByName('credito');
  var sessoes = document.getElementsByName('sessoes');
  var resultado = 0.00;
  juros = parseInt(juros[0].value)/100;
  lucro = parseInt(lucro[0].value)/100;
  comissao_venda = parseInt(comissao_venda[0].value)/100;
  comissao = parseInt(comissao[0].value)/100;
  var materialatt = parseFloat(material[0].value) * sessoes[0].value;
  resultado = resultado + parseFloat(materialatt);
  resultado = resultado + (comissao_venda*resultado);
  resultado = resultado + (comissao*resultado);
  lucro = lucro*resultado;
  resultado = resultado + lucro;
  resultado = resultado + parseFloat(outros[0].value);
  resultado = resultado - parseFloat(curtidas[0].value);
  resultado = resultado - parseFloat(fidelizado[0].value);
  resultado = resultado - parseFloat(promocao[0].value);
  resultado = resultado - parseFloat(credito[0].value);
  resultado = resultado + (juros*resultado);
  var valorsessao = resultado/sessoes[0].value;

  document.getElementById('resultado').innerHTML = "Valor do serviço: R$"+resultado.toFixed(2)+"<br>Lucro: R$"+lucro.toFixed(2)+"<br>Número de sessões: "+sessoes[0].value+"<br>Valor das sessões: R$"+valorsessao.toFixed(2);
}


 