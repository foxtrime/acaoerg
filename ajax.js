function getAjax(){
  try {
    ajax = new ActiveXObject("Microsoft.XMLHTTP"); // Versões novas do IE
  }
  catch(e) {
    try {
      ajax = new ActiveXObject("Msxml2.XMLHTTP"); // Versões antigas do IE
    }
	catch(ex) {
      try {
        ajax = new XMLHttpRequest(); // Outros (Mozilla, Safari, Opera...)
      }
	  catch(exc) {
        alert("Esse browser não tem recursos para uso do Ajax");
        ajax = null;
      }
    }
  }
  return ajax;
}

function executar(endereco){
    var ajax = getAjax();
    if(ajax){
        ajax.open("POST", endereco, true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function(){
			var target = document.getElementById("container");
			if(ajax.readyState < 4) {
				target.innerHTML = "<div class='carregando'>Carregando...</div>";
			} else {
				if(ajax.status == 200)
					target.innerHTML = ajax.responseText;
                    location.href = "#container";
			}
		}
    	ajax.send("");
	}
}

function exibirConteudoEmContainer(endereco, container, queryString, ocultarAposCincoSegundos, ancora){
    var ajax = getAjax();
    if(ajax){
        ajax.open("POST", endereco, true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function(){
			var target = document.getElementById(container);
			if(ajax.readyState < 4) {
				target.innerHTML = "<div class='texto'>Carregando...</div>";
			} else {
				if(ajax.status == 200){
					target.innerHTML = ajax.responseText;
					if(ocultarAposCincoSegundos != null && ocultarAposCincoSegundos != undefined && ocultarAposCincoSegundos == true)
						setTimeout("limparDiv('"+container+"')", 5000);
					if(ancora != null && ancora != undefined)
						location.href = "#"+ancora;
				}
			}
		}
		var parametro = null;
		if(queryString != null && queryString != undefined) parametro = queryString;
    	ajax.send(parametro);
	}
}
