	/*
	 * Arquivo contendo funcoes javascript para a manipulacao de formularios
	 * Autor : Pieter Monteiro da Silva Velman - PieterVeldman@gmail.com
	 */

	/*
	 * Funcao que habilita ou desabilita a edicao de uma caixa de texto 24/05/2005 13:10
	 */
	function mostra(chbox,campo) 
	{
		if (chbox.checked){
			chbox.form[campo].disabled=false;
		} else {
			chbox.form[campo].disabled=true;
		}
	}


	/*
	 * Funcao que habilita ou desabilita a edicao de uma caixa de texto a partir de um combobox 24/05/2005 17:10
	 */
	function comboMostra(combobox,campo) 
	{
		if (combobox.value=='NULL'){
			combobox.form[campo].disabled=true;
		} else {
			combobox.form[campo].disabled=false;			
		}
	}


	/*
	 * Funcao que desabilita a edicao de uma caixa de texto 24/05/2005 17:35
	 */
	function desabilita(referenciaForm,campo) 
	{
		referenciaForm[campo].disabled=true;
	}



	/*
	 * Funcao que habilita ou desabilita a edicao de duas caixa de texto 24/05/2005 13:10
	 * Depreciada 30/05/2005
	 */
	 
	function mostraversao(chamador,campo) 
	{
		var campo2=campo+'2';
		//document.write(chamador.form.name+'---');
		
		if (chamador.checked){
			chamador.form[campo].disabled=false;
			chamador.form[campo2].disabled=false;
		} else {
			chamador.form[campo].disabled=true;
			chamador.form[campo2].disabled=true;
		}
		
		//document.write(campo2);
	}

	/*
	 * Esvazia o conteúdo de uma caixa de texto se o texto padrão não tiver sido alterado 24/05/2005 13:20
	 */
	function limpa(chamador) 
	{
		if ((chamador.value=='Parte do Título')|
			(chamador.value=='Palavra Chave')|
			(chamador.value=='Nome do Autor'))
		chamador.value='';
	}

	
	/*
	 * Valida as informacoes de um formulario antes de enviar os dados 24/05/2005 
	 
	
	function validate()
	{
		x=document.myForm
		input=x.myInput.value
		if (input.length>5)
		{
			alert("The field cannot contain more than 5 characters!")
			return false
		}
		else
		{
			return true
		}
	}
*/