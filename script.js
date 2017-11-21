function irParaPagina(endereco){
    window.location.href=endereco;
}

/**************
*       Digitar somente números
**************/
function OnlyNumbers(e) {

if (window.event) //IE
{
tecla = e.keyCode;
}

else if (e.which) //FF
{
tecla = e.which;
}
//techa==8 é para permitir o backspace funcionar para apagar

if ( (tecla >= 48 && tecla <= 57)||(tecla == 8 ) ) {
return true;
}
else {
return false;
}

}//// colocar dentro do input onkeypress="return OnlyNumbers(event)"

/**************
*       Menu
**************/

var selecionado;
function mouseSobre(id){
    var objeto       = document.getElementById("menu"+id);
    if(id != selecionado)
        objeto.className = "selectOver";
}
function mouseFora(id){
    var objeto       = document.getElementById("menu"+id);
    if(id != selecionado)
        objeto.className = "selectOut";
}
function selecionar(id){
    var objeto       = document.getElementById("menu"+id);
    objeto.className = "selectIn";
    selecionado      = id;
}

/**************
*       AJAX - Edicoes
**************/
var mostrar = false;
var marcado = 0;
function exibirOnClick(vol,num,id){
    marcado = id;
    var i   = 1;
    var div = document.getElementById("revista");
    div.style.backgroundColor="skyblue";
    for(i = 1; i <= 8; i++){    //adicionar uma unidade para cada edicao q for adicionada / alterar height e revista css
      var td  = document.getElementById(i);
      td.style.backgroundColor="#eeeeee";
      td.style.borderRightColor = "skyblue";
    }
    var td  = document.getElementById(id);
    td.style.backgroundColor="skyblue";
    td.style.borderRightColor = "skyblue";
    for(i = 1; i <= 8; i++){    //adicionar uma unidade para cada edicao q for adicionada
      if(i != id){
        var td  = document.getElementById(i);
        td.style.borderRightColor = "#aaaaaa";
      }
    }
    div.innerHTML = "<img src='edicoes/vol"+vol+"n"+num+"/capamini.jpg'>";
    mostrar = true;
}
function exibir(vol,num, id){
  if(mostrar == false){
    var div = document.getElementById("revista");
    div.style.backgroundColor="#dddddd";
    div.style.borderTopColor = "#aaaaaa";
    div.style.borderRightColor = "#aaaaaa";
    div.style.borderBottomColor = "#aaaaaa";
    div.innerHTML = "<img src='edicoes/vol"+vol+"n"+num+"/capamini.jpg'>";
  }
    if(marcado!=0 && marcado!=id){
      
      var td = document.getElementById(id);
      td.style.backgroundColor="#dddddd";
      td.style.borderRightColor = "#aaaaaa";
      td.style.cursor = "pointer";
    }
    if(marcado == 0){

      var td = document.getElementById(id);
      td.style.backgroundColor="#dddddd";
      td.style.borderRightColor = "#dddddd";
      td.style.cursor = "pointer";
    }
}
function ocultar(id){
  if(marcado != id){
    if(!mostrar){
      var div = document.getElementById("revista");
      div.innerHTML = "";
      div.style.backgroundColor="#eeeeee";
      div.style.borderRightColor = "#eeeeee";
      div.style.borderBottomColor = "#eeeeee";
      div.style.borderTopColor = "#eeeeee";
    }
    var td = document.getElementById(id);
    td.style.backgroundColor="#eeeeee";
    td.style.borderRightColor = "#aaaaaa";
    
  }
}

function mudacor(ref,cor){
ref.style.backgroundColor=cor;
}

function msgErro(){
 setTimeout("document.getElementById('msgErro').innerHTML = '&nbsp;'",3000)
}

function confirmar(local, id){
  var confirmacao = confirm("Deseja excluir este registro?");
  if(confirmacao){
    window.location.href = local + id;
  }
}

function confirmarText(idTexto, idPagina){
  var confirmacao = confirm("Deseja excluir este registro?");
  if(confirmacao){
    window.location.href = "excluir/?idTexto="+idTexto+"&idPagina="+idPagina;
  }
}

/**************
*       Msg formulario - onFocus
**************/
var exp = new Array();
exp.push("Nome completo");
exp.push("Somente Arquivos .doc Ex: nomeDoArquivo.doc");

function exibirMsgForm(mens, div){
  var div = document.getElementById(div);
  div.innerHTML = exp[mens];
}
function ocultarMsgForm(mens, div){
  var div = document.getElementById(div);
  div.innerHTML = "";
}

/**************
*       Pop - resumo artigo
**************/
function pop(idArtigo){
  window.open("./resumo.php?idArtigo="+idArtigo,"","width=670px, height=515px, top=40px, left=40px, scrollbars=yes, resizable=no, titlebar=no, location=no, status=no");
}
