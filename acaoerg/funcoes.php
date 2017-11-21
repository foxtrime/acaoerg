<?php
 	/* 
	 * Descricao : Arquivo de funcoes auxiliares
	 * Esse arquivo está divido em 4 grandes blocos : 
	 * 			* Variaveis Globais
	 * 			* Funcoes de Manipulacao de Texto basicas
	 * 			* Funcoes de Manipulacao do banco de dados
	 * 			* Funcoes de criacao de conteudo
	 *
	 *	Autor : Pieter Monteiro da Silva Veldman ; PieterVeldman@gmail.com		
	 *
	 *********************************************************************************************/
 
		 
 	/*********************************************************************************************
	 *
	 *			Variaveis Globais
	 *
	 *********************************************************************************************/


		 /*
		 * Variavel global que armazena a lista dos itens do menu lateral.
		 */
		 $itemsMenu  = array("A Revista","Corpo Editorial","Autores","Artigos Aceitos <img src=\"imagens/seta.gif\" />","Busca Avan&ccedil;ada");
		 $secoes  = array("A Revista","Corpo Editorial","Autores","Artigos Aceitos","Busca Avan&ccedil;ada");
		 $itemsForm  = array("titulo" => "T&iacute;tulo","palavraChave" => "Palavra Chave","autor" => "Autor");
		 $itemsForm2 = array("titulo" => "Parte do T&iacute;tulo","palavraChave" => "Palavra Chave","autor" => "Nome do Autor");

	/*********************************************************************************************
	 *
	 *			Funcoes para manipulacao de texto
	 *
	 *********************************************************************************************/

	/*
	 * Funcao que indenta o codigo. Insere $tab tabulacoes no fluxo de texto 17/05/2005 12:10
	 */
	 function indent($tab){
			for($i=0;$i<$tab;$i++)
					echo "\t";
	 }

	/*
	 * Funcao que retorna $tab (\t)s 20/06/2005 16:08
	 */
		 function indent2($tab){
		 		$retorno = "";
		 		for($i=0;$i<$tab;$i++)
						$retorno .= "\t";
				return $retorno;
		 }

		 
	/*
	 * Funcao que imprime $str indenta o codigo. 17/05/2005 12:11
	 */

		 function eco($tab,$str){
		 		indent($tab);
				echo $str;
				
		 }

	/*
	 * Funcao que imprime $str na tela e salva $str no $arquivo_saida indenta o codigo. 21/06/2005 11:15
	 */

		 function feco($tab,$str,$arquivo_saida){
		 		indent($tab);
				echo $str;
				fwrite($arquivo_saida,indent($tab).$str);
				
		 }

		 
	/*
	* Troca a acentuacao normal por marcacao HTML 18/05/2005 16:35
	*/

	$caractere = Array('"','&','<','>','©','®','TM','´','«','»','¡','¿','À','à','Á','á','Â','â','Ã','ã','Ä','ä','Å','å','Æ','æ','Ç','ç','Ð','ð','È','è','É','é','Ê','ê','Ë','ë','Ì','ì','Í','í','Î','î','Ï','ï','Ñ','ñ','Ò','ò','Ó','ó','Ô','ô','Õ','õ','Ö','ö','Ø','ø','Ù','ù','Ú','ú','Û','û','Ü','ü','Ý','ý','ÿ','Þ','þ','ß','§','¶','µ','¦','±','·','¨','¸','ª','º','¬','­','¯','°','¹','²','³','¼','½','¾','×','÷','¢','£','¤','¥'); 
	$entidadehtml = Array('&quot;','&amp;','&lt;','&gt;','&copy;','<sup>&reg;</sup>','<font size="-1"><sup>TM</sup></font>','&acute;','&laquo;','&raquo;','&iexcl;','&iquest;','&Agrave;','&agrave;','&Aacute;','&aacute;','&Acirc;','&acirc;','&Atilde;','&atilde;','&Auml;','&auml;','&Aring;','&aring;','&AElig;','&aelig;','&Ccedil;','&ccedil;','&ETH;','&eth;','&Egrave;','&egrave;','&Eacute;','&eacute;','&Ecirc;','&ecirc;','&Euml;','&euml;','&Igrave;','&igrave;','&Iacute;','&iacute;','&Icirc;','&icirc;','&Iuml;','&iuml;','&Ntilde;','&ntilde;','&Ograve;','&ograve;','&Oacute;','&oacute;','&Ocirc;','&ocirc;','&Otilde;','&otilde;','&Ouml;','&ouml;','&Oslash;','&oslash;','&Ugrave;','&ugrave;','&Uacute;','&uacute;','&Ucirc;','&ucirc;','&Uuml;','&uuml;','&Yacute;','&yacute;','&yuml;','&THORN;','&thorn;','&szlig;','&sect;','&para;','&micro;','&brvbar;','&plusmn;','&middot;','&uml;','&cedil;','&ordf;','&ordm;','&not;','&shy;','&macr;','&deg;','&sup1;','&sup2;','&sup3;','&frac14;','&frac12;','&frac34;','&times;','&divide;','&cent;','&pound;','&curren;','&yen;'); 

	function charToHtml($str) 
	{ 
		global $caractere,$entidadehtml; 
		$remonta = ""; 
		$remonta = str_replace($caractere,$entidadehtml,$str); 	
		return $remonta; 
	} 
		 
		 
	/*
	 * Funcao que imprime $str dentro de um div de classe $class. 23/05/2005 18:30
	 */

		 function divClass($tab,$str,$class){
   			eco($tab++,"<div class=\"".$class."\">\n");
				eco($tab,$str);
  			eco(--$tab,"</div>\n");			
		 }		 

	/*
	 * Funcao que coloca $par dentro de um td. 01/05/2005 12:20
	 */
		 
		 
	function td() //($tab,$par,$attrib)
	{
		$par2="";
		$limite = 0;
		$num_args = func_num_args();
		if ($num_args > 0)
		{
			if ($num_args > 1)
			{

				$tab = func_get_arg (0);
				$par = func_get_arg (1);
				if ($num_args > 2)
				{
					$attrib = func_get_arg (2);
	
					if ($num_args > 3)
					{
						$limite = func_get_arg (3);
						$tam = strlen($par);						 
					}

				}
				//começa aqui o processamento
				if(empty($par))
				$par= "&nbsp;";
				indent($tab);
				echo "<td".(isset($attrib)?" $attrib":"").">$par</td>\n";
			}
		}
	}
	
	/*
	 * Funcao que imprime <tr>. 01/05/2005 12:23
	 */
	function tr($tab)
	{
		eco ($tab,"<tr>\n");
	}
	
 	/*
	 * Funcao que imprime </tr>. 01/05/2005 12:23
	 */
	function ftr($tab)
	{
		eco ($tab,"</tr>\n");
	}
		 
 	/*********************************************************************************************
	 *
	 *			Funcoes para manipulacao do banco de dados
	 *
	 *********************************************************************************************/

	/*
	* Funcao usada para se conectar ao banco de dados.
	* Devolve o ID da conexão.
	* Criada por Pieter Veldman 01/2005
	*/
	//function conectar(&$conexao,$bancoDeDados){
	function conectar(&$conexao){
		$bancoDeDados = "revistaonline1";
		if (($_SERVER['SERVER_NAME'] == "gente15")||($_SERVER['SERVER_NAME'] == "127.0.0.1")||($_SERVER['SERVER_NAME'] == "localhost")){
	  		$conexao = mysql_connect("localhost", "root", "")
				or die ("Configuração de Banco de Dados Errada!");
		} else {
			$conexao = mysql_connect("localhost", "root", "ergki901")
				or die ("Configuração de Banco de Dados Errada!");
  		}

		
  
  	$db = mysql_select_db($bancoDeDados)
		 	or die ("Banco de Dados Inexistente!");
	}


	/*
	* Executa a instrução contida em $sql e devolve a resposta em $resutaldo
	* Devolve o ID da conexão.
	* Criada por Pieter Veldman 01/2005
	*/
	function query($conexao,$sql,&$resultado)
	{
	 		$resultado = mysql_query($sql,$conexao)
			or die ("Não foi possível realizar a consulta ao banco de dados <br />$sql<br />");
	}

		 
	/*
	* Grava informacoes da visita
	* Criada por Pieter Veldman 04/10/2005 14:05
	*/
	function registraVisita($secao)
	{
		conectar($conexao);
		$hora = date("Y-m-d h-i-s");
		mysql_query ("INSERT INTO visitas VALUES ('".$_SERVER['REMOTE_ADDR']."','".$secao."','".$hora."')",$conexao);
	}
		 
		 
		 
 	/*********************************************************************************************
	 *
	 *			 Funcoes de criacao de conteudo
	 *
	 *********************************************************************************************/

	/*
	 * Cria combobox com todas as palavras chave. 23/05/2005 17:55
	 * Funcao depreciada. O combobox sera substituido por uma caixa de texto 24/05/2005
	 *
	 * Uso :
	 * eco($tab++,"<div class=\"itemMenuBusca\">\n");
	 *	gerarPalavrasChave($tab,NULL,1); 
   * eco(--$tab,"</div>\n");
	 *
	 */		 
		 
		 function gerarPalavrasChave($tab,$palavraChave,$indice){
		 		$sql = "SELECT * FROM palavraschave";
				conectar($conexao);
				query($conexao,$sql,$resultado);		
   			eco($tab,"<select name=\"palavraChave".$indice."\" id=\"palavraChave".$indice."\">\n");
   				eco($tab,"<option value=\"NULL\">N&atilde;o escolhido</option>\n");
				while ($linha = mysql_fetch_array($resultado)){
					eco($tab,"<option ".(($palavraChave==$linha['codigoDaPalavraChave'])?"selected ":"")."value=\"".$linha['codigoDaPalavraChave']."\">".charToHtml($linha['palavraChavePortugues']." - ".$linha['palavraChaveIngles'])."</option>\n");
				}
  			eco($tab,"</select>\n");
		 }

	/*
	 * Cria combobox com todas as edicoes. 23/05/2005 18:15
	 */		 
		 
		 function gerarEdicoes($tab,$edicao){
   	 		$sql = "SELECT * FROM exemplar";
				conectar($conexao);
				query($conexao,$sql,$resultado);						
		
				eco($tab++,"<select name=\"edicoes\">\n");
				eco($tab,"<option value=\"0\">Todas</option>\n");				
				while ($linha = mysql_fetch_array($resultado)){
					eco($tab,"<option ".(($edicao==$linha['codigoDoExemplar'])?"selected ":"")."value=\"".$linha['codigoDoExemplar']."\">vol. ".$linha['volumeDoExemplar']." nº ".$linha['numeroDoExemplar']."</option>\n");
				}
  			eco(--$tab,"</select>\n");
		 }
 
		 
		 
	/*
	 * Cria a bloco do topo da pagina com a figura superior. 17/05/2005 12:15
	 */

		 function topo($tab){
 		 		eco($tab++,"<div id=\"topo\">\n");
 		 		eco($tab,"<a href=\"index.php\" target=\"_parent\">\n");
		 		eco($tab,"<!-- Figura no topo da revista -->\n");
		 		eco($tab++,"<script type=\"text/javascript\">\n");
		 		eco($tab,"document.write(\"<img id='imagemTopo' src='imagens/topo.jpg' width='\"+(screen.availWidth)+\"' />\");\n");
		 		eco($tab--,"</script>\n");
 		 		eco($tab,"</a>\n");		 
 		 		eco(--$tab,"</div>\n");		 
		 }
		 
	/*
	 * Cria linha de formulario com informacoes de titulo do menu lateral. 30/05/2005 17:36
	 */

		 function criarTituloFormMenuLateral($tab){
				divClass($tab,"<input type=\"checkbox\" name=\"chboxtitulo\" checked id=\"chboxtitulo\" onClick=\"mostra(this,'titulo')\" /><label for=\"chboxtitulo\">T&iacute;tulo</label>\n","itemMenuBusca"); 	
				divClass($tab,"<input type=\"text\" name=\"titulo\" class=\"texto\" value=\"Parte do T&iacute;tulo\" onClick=\"limpa(this)\" />\n","itemMenuBusca");						 
		 }

	/*
	 * Cria linha de formulario com informacoes de palavra Chave do menu lateral. 30/05/2005 17:41
	 */

		 function criarPalavraChaveFormMenuLateral($tab){
				divClass($tab,"<input type=\"checkbox\" name=\"chboxpalavraChave\" checked id=\"chboxpalavraChave\" onClick=\"mostra(this,'palavraChave')\" /><label for=\"chboxpalavraChave\">Palavra chave</label>\n","itemMenuBusca");
				divClass($tab,"<input type=\"text\" name=\"palavraChave\" class=\"texto\" value=\"Palavra Chave\" onClick=\"limpa(this)\" />\n","itemMenuBusca");
		 }
				
 
	/*
	 * Cria linha de formulario com informacoes de autor do menu lateral. 30/05/2005 17:41
	 */

		 function criarAutorFormMenuLateral($tab){
 				divClass($tab,"<input type=\"checkbox\" name=\"chboxautor\" checked id=\"chboxautor\" onClick=\"mostra(this,'autor')\" /><label for=\"chboxautor\">Autor:</label>\n","itemMenuBusca");
 				divClass($tab,"<input type=\"text\" name=\"autor\" class=\"texto\" value=\"Nome do Autor\" onClick=\"limpa(this)\" />\n","itemMenuBusca");
		 }

	/*
	 * Cria linha de formulario com informacoes de edicoes. 30/05/2005 17:44
	 */

		 function criarEdicoesForm($tab,$ano){
  			eco($tab++,"<div class=\"itemMenuBusca\">\n");
				eco($tab,"Edi&ccedil;&otilde;es:\n");
					gerarEdicoes($tab,$ano); 
  			eco(--$tab,"</div>\n");
		 }



	/*
	 * Cria o menu lateral da pagina. 07/06/2005 13:30
	 * 23/05/2005 	 
	 */
		 
	 	function menuLateral2($tab,$itemMenu,$itemMenuEdicoes){
		global $itemsMenu;	

 		eco($tab++,"<div id=\"menuLateral\"><!-- Menu de opcoes lateral -->\n");
  		for($i=0;$i < count($itemsMenu);$i++){
  			if ((isset($itemMenu))&($i == $itemMenu)){
  				eco($tab, "<div class=\"itemMenuSelecionado\" id=\"itemMenu".$i."\">".$itemsMenu[$i]."</div>\n");
  			}else{
  			  eco($tab, "<div class=\"itemMenu\"><a href=\"index.php?itemMenu=".$i."\" target=\"_parent\">".$itemsMenu[$i]."</a></div>\n");
  			}	
  		}
   		eco($tab++,"<div id=\"menuEdicoes\">Edi&ccedil;&otilde;es :\n");
   		eco($tab,"<!-- Menu com todas as edicoes  --><br />\n");
   	 		$sql = "SELECT * FROM exemplar  WHERE status= 'Publicado' ORDER BY volumeDoExemplar DESC, numeroDoExemplar DESC";
				conectar($conexao);
				query($conexao,$sql,$resultado);							
				while ($linha = mysql_fetch_array($resultado)){				
					if ((isset($itemMenuEdicoes))&($linha['codigoDoExemplar'] == $itemMenuEdicoes)){
						eco($tab, "<div class=\"itemMenuEdicoesSelecionado\" id=\"itemMenuEdicoes".$linha['codigoDoExemplar']."\">vol. ".$linha['volumeDoExemplar']." nº ".$linha['numeroDoExemplar']."</div>\n");
					}else{
					  eco($tab, "<div class=\"itemMenuEdicoes\"><a href=\"index.php?itemMenuEdicoes=".$linha['codigoDoExemplar']."\" target=\"_parent\">vol. ".$linha['volumeDoExemplar']." nº ".$linha['numeroDoExemplar']."</a></div>\n");
					}	

				}

			eco(--$tab,"</div>\n");
			
   		eco($tab++,"<div id=\"menuBusca\">Busca :<!-- Formulario de busca de artigos -->\n");
  			eco($tab,"<!-- Busca por palavra chave e autor -->\n");
  			eco($tab++,"<form name=\"formBuscaArtigos\" method=\"post\" action=\"mostra.php\" target=\"_blank\">\n");

				criarTituloFormMenuLateral($tab);
				criarPalavraChaveFormMenuLateral($tab);
				criarAutorFormMenuLateral($tab);
				criarEdicoesForm($tab,NULL);
				eco($tab,"<input name=\"cp\" type=\"hidden\" value=\"0\">\n");
				divClass($tab,"<input type=\"submit\" name=\"botao\" id=\"botao\" value=\"Pesquisar ...\">\n","itemMenuBusca");
  
  			eco(--$tab,"</form>\n");
  
  		eco(--$tab,"</div>\n");				
		eco(--$tab,"</div>\n");						
	
		}

	/*
	 * Cria o menu lateral da pagina para NOFRAMES. 18/05/2005 10:56
	 * 23/05/2005 	 
	 */
		 
	 	function menuLateral($tab,$itemMenu,$itemMenuEdicoes){
		global $itemsMenu;	

 		eco($tab++,"<div id=\"menuLateral\"><!-- Menu de opcoes lateral -->\n");
  		for($i=0;$i < count($itemsMenu);$i++){
  			if ((isset($itemMenu))&($i == $itemMenu)){
  				eco($tab, "<div class=\"itemMenuSelecionado\" id=\"itemMenu".$i."\">".$itemsMenu[$i]."</div>\n");
  			}else{
  			  eco($tab, "<div class=\"itemMenu\"><a href=\"index.php?itemMenu=".$i."\" target=\"_self\">".$itemsMenu[$i]."</a></div>\n");
  			}	
  		}
   		eco($tab++,"<div id=\"menuEdicoes\">Edi&ccedil;&otilde;es :\n");
   		eco($tab,"<!-- Menu com todas as edicoes  --><br />\n");
    		for($j=2000; $j <= date("Y"); $j++){
    			if ((isset($itemMenuEdicoes))&($j == $itemMenuEdicoes)){
    				eco($tab, "<div class=\"itemMenuEdicoesSelecionado\" id=\"itemMenuEdicoes".$j."\">".$j."</div>\n");
    			}else{
    			  eco($tab, "<div class=\"itemMenuEdicoes\"><a href=\"index.php?itemMenuEdicoes=".$j."\" target=\"_self\">".$j."</a></div>\n");
    			}	
    		}
			eco(--$tab,"</div>\n");
			
   		eco($tab++,"<div id=\"menuBusca\">Busca :<!-- Formulario de busca de artigos -->\n");
  			eco($tab,"<!-- Busca por palavra chave e autor -->\n");
  			eco($tab++,"<form name=\"formBuscaArtigos\" method=\"post\" action=\"buscaArtigos.php\">\n");

				criarTituloFormMenuLateral($tab);
				criarPalavraChaveFormMenuLateral($tab);
				criarAutorFormMenuLateral($tab);
				criarEdicoesForm($tab,NULL);
			

 				divClass($tab,"<input type=\"submit\" name=\"botao\" id=\"botao\" value=\"Pesquisar ...\">\n","itemMenuBusca");
  
  			eco(--$tab,"</form>\n");
  
  		eco(--$tab,"</div>\n");				
		eco(--$tab,"</div>\n");						
	
		}

	/*
	 * Cria linha de formulario. 30/05/2005 
	 * 
	 */
	

		function criarLinhaForm($tab,$tipo,$checked,$valorText1,$valorCombo,$valorText2,$nomeForm){
			global $itemsForm;
			//eco($tab,$itemsForm[$tipo]."-".$tipo);
  		if(!isset($valorCombo)){
				$valorCombo = "NULL"; 
			}
			
			if (($tipo == "palavraChave") | ($tipo == "titulo")){ 
						divClass($tab,"<input type=\"checkbox\" name=\"chbox".$tipo."\" checked id=\"chbox2".$tipo."\" onClick=\"mostra(this,'".$tipo."'); mostra(this,'".$tipo."2'); mostra(this,'combo".$tipo."'); if (this.checked){comboMostra(document.forms.".$nomeForm."['combo".$tipo."'],'".$tipo."2');}\" /><label for=\"chbox2".$tipo."\">".$itemsForm[$tipo]."</label> <a class=\"lista\" href=\"mostra.php?cp=1&tipo=".$tipo."\" target=\"_blank\">Listar</a>\n","itemMenuBusca");
			}else{
						divClass($tab,"<input type=\"checkbox\" name=\"chbox".$tipo."\" checked id=\"chbox2".$tipo."\" onClick=\"mostra(this,'".$tipo."'); mostra(this,'".$tipo."2'); mostra(this,'combo".$tipo."'); if (this.checked){comboMostra(document.forms.".$nomeForm."['combo".$tipo."'],'".$tipo."2');}\" /><label for=\"chbox2".$tipo."\">".$itemsForm[$tipo]."</label>\n","itemMenuBusca");
			}
					$linhatitulo  = "<input type=\"text\" name=\"".$tipo."\" value=\"".$valorText1."\" onClick=\"limpa(this)\" />";
    				$linhatitulo .= "<select name=\"combo".$tipo."\" onChange=\"comboMostra(this,'".$tipo."2');\"><option ".(($valorCombo=="NULL")?"selected ":"")."value=\"NULL\">Ignorar</option><option ".(($valorCombo=="AND")?"selected ":"")."value=\"AND\">E</option><option ".(($valorCombo=="OR")?"selected ":"")."value=\"OR\">OU</option></select>";
    				$linhatitulo .= "<input type=\"text\" name=\"".$tipo."2\" value=\"".$valorText2."\" onClick=\"limpa(this)\" />";
  		divClass($tab , $linhatitulo."\n" , "itemMenuBusca");
  		eco($tab++ , "<script type=\"text/javascript\">\n");
			eco($tab , "<!--\n");
			eco($tab , "var x=document.forms.".$nomeForm."\n");
			eco($tab , "desabilita(x,'".$tipo."2')\n");
			eco($tab , "// -->\n");
			eco($tab , "</script>\n");
 

		}

	/*
	 * Cria linha de autores de cada artigo . 31/05/2005 18:50
	 *
	 */
		function criarLinhaAutores($autores){ 
				$resposta = "";
				if (($autores!="")){
					 $resposta .= "<span class=\"autores\">".$autores."</span><br />";
				}

				return $resposta;
			}

	/*
	 * Cria linha de links de cada artigo . 31/05/2005 18:40
	 *
	 * Se houver resumo em "$anoDoExemplar/resumos/$codigoDoArtigo.html" criar link para ele
	 * Se houver pdf em "$anoDoExemplar/artigos/$codigoDoArtigo.pdf" criar link para ele
	 */
		function criarLinhaLinks($codigoDoExemplar,$codigoDoArtigo){ 
				$resposta = "";
				$diretorio = retornarDiretorio($codigoDoExemplar);
				//<img alt=\"resumo\" src=\"imagens/html.jpg\" height=\"20\" width=\"20\" />
				if (file_exists($diretorio."/artigos/".$codigoDoArtigo.".pdf")){
					 $resposta .= "<a target=\"_blank\" href=\"".$diretorio."/artigos/".$codigoDoArtigo.".pdf\"><img alt=\"pdf\" src=\"imagens/pdf.jpg\" height=\"20\" width=\"20\" />pdf</a>";
				} else {
				 $resposta .= "&nbsp;";			 
				}
				$resposta .= "</td><td>";
				if (file_exists($diretorio."/resumos/".$codigoDoArtigo.".html")){
					 $resposta .= "<a target=\"_blank\" href=\"".$diretorio."/resumos/".$codigoDoArtigo.".html\"><img alt=\"resumo\" src=\"imagens/html.jpg\" height=\"20\" width=\"20\" />resumo</a>";
				}else{
					 $resposta .= "&nbsp;";
				}

				return $resposta;
			}
			
	/*
	 * Cria lista de palavras chave ou titulo  . 31/05/2005 18:50
	 * 09/06/2005
	 *
	 */
 	function 	criarLista($tab, $tipo,$colunas, $resultado)
	{
		eco( $tab, "<center>\n");	
		eco( $tab++, "<table class=\"lista\" cellspacing=\"8\" cellpadding=\"8\">\n");	
	//	echo "<table class=\"lista\" cellspacing=\"0\">\n";	
		$i =0;
		
		//echo "<li><a  class=\"lista\" href=\"".$tipo."/mostrarDados.php?cod=$cod\" title=\"$nome\" >$nome</a></li>\n";
		while ($linha=mysql_fetch_array($resultado)) 
		{
			$i++;
			if ((($i-1)%$colunas) == 0){
				tr($tab);
			}
		
			if ($tipo == "palavraChave"){
				td( $tab, charToHtml( $linha["palavraChavePortugues"]));
				td( $tab, charToHtml( $linha["palavraChaveIngles"]));
			} else if ($tipo == "titulo"){
				td( $tab, charToHtml( $linha["titulo"]));
			}
//td($id,"<a  class=\"lista\" href=\"".$tipo."/mostrarDados.php?cod=$cod\" title=\"$nome\" >$nome</a>","class=\"lista\"");

		
			indent($tab);
			if ($i%$colunas==0){
				ftr($tab);
			}

			
		}
		eco(--$tab, "</table>");

		eco(--$tab, "</center>\n");	

	}	


		
	/*
	 * Cria o conteudo da pagina. 18/05/2005
	 * 07/06/2005  13:50
	 * 
	 */
		 
		function conteudo2($tab,$itemMenu,$itemMenuEdicoes){
		global $itemsForm2;

		eco($tab++,"<div id=\"conteudo\"><!-- Parte central da pagina. Informacao vai aqui. -->\n");

  		if (!(is_null($itemMenu))){
			switch ($itemMenu){
    			case 0: //Conheca a revista
		  			RegistraVisita("A revista");
					include('conhecaARevista.html');
    				break;
    			case 1: //Corpo Editorial
		  			RegistraVisita("Corpo Editorial");
          		include('corpoEditorial.html');
    				break;
    			case 2: //Instrucoes para Autores
		  			RegistraVisita("Autores");
					include('instrucoes.html');
    				break;
    			case 3: //Artigos aceitos
		  			RegistraVisita("Artigos Aceitos");			
					eco($tab++,"<strong>Artigos Aceitos</strong><table class=\"sumario\">\n");				
					$sql = "SELECT * FROM artigo WHERE status = \"Em espera\"";			 
					conectar($conexao);
					query($conexao,$sql,$resultado);
					while ($linha=mysql_fetch_array($resultado)) {
						eco($tab,"<tr><td>".$linha['titulo']."<br />".criarLinhaAutores($linha['autores'])."</td><td>".criarLinhaLinks($linha['codigoDoExemplar'],$linha['codigoDoArtigo'])."</td><td>".((is_null($linha['paginaInicial']))?"&nbsp;":$linha['paginaInicial'])."</td></tr>\n");
					}
					eco(--$tab,"</table>\n");
    				break;

    			case 4: //Criar formulario de pesquisa
		  			RegistraVisita("Busca Avan&ccedil;ada");				
	           		eco($tab++,"<div id=\"buscaAvancada\"><strong>Busca Avan&ccedil;ada :</strong><!-- Formulario de busca de artigos -->\n");
          			eco($tab,"<!-- Busca por palavra chave e autor -->\n");
          			eco($tab++,"<form name=\"formBuscaAvancadaDeArtigos\" method=\"post\" action=\"mostra.php\" target=\"_blank\">\n");
								
								//criarLinhaForm($tab,$tipo,$checked,$valorText1,$valorCombo,$valorText2)
								criarLinhaForm($tab,"titulo", true, $itemsForm2["titulo"],NULL, $itemsForm2["titulo"], "formBuscaAvancadaDeArtigos");
								criarLinhaForm($tab,"palavraChave", true, $itemsForm2["palavraChave"],NULL, $itemsForm2["palavraChave"], "formBuscaAvancadaDeArtigos");
								criarLinhaForm($tab,"autor", true, $itemsForm2["autor"],NULL, $itemsForm2["autor"], "formBuscaAvancadaDeArtigos");
      			
          			eco($tab++,"<div class=\"itemMenuBusca\">\n");
        				eco($tab,"Pesquisar em :\n");
        					gerarEdicoes($tab,NULL); 
          			eco(--$tab,"</div>\n");
         				eco($tab,"<input name=\"cp\" type=\"hidden\" value=\"0\">\n");
         				divClass($tab,"<input type=\"submit\" name=\"botao\" id=\"botao2\" value=\"Pesquisar ...\">\n","itemMenuBusca");          
          			eco(--$tab,"</form>\n");
          
          		eco(--$tab,"</div>\n");				

    				break;
    			case 20: //Estatistica
				global $secoes;

	  			RegistraVisita("Estat&iacute;sticas");


           		eco($tab++,"<div id=\"estatisticas\"><div align=\"center\"><h2>Estat&iacute;sticas de visitas:</h2><br /></div>\n");
				conectar($conexao);
				query($conexao,"SELECT * FROM visitas",$resultado);
				eco($tab++,"<table>\n");
				eco($tab,"<tr><td><strong>IP</strong></td><td><strong>Se&ccedil;&atilde;o.</strong></td><td><strong>Hora</strong></td></tr>\n");
				while ($linha=mysql_fetch_array($resultado)) {
					$secao = $linha['secao'];

					eco($tab,"<tr><td>".$linha['ip']."</td><td>".$secao."</td><td>".$linha['hora']."</td></tr>\n");
				}          
          		eco(--$tab,"</table>\n");

          		eco($tab++,"<div align=\"center\"><h3>Totais :</h3></div><br />\n");

          		eco($tab++,"<h4>Por Se&ccedil;&atilde;o :</h4>\n");
				query($conexao,"SELECT secao, COUNT(*) FROM visitas GROUP BY secao;",$resultado);
				eco($tab++,"<table>\n");
				eco($tab,"<tr><td><strong>Se&ccedil;&atilde;o</strong></td><td><strong>Visitas</strong></td></tr>\n");
				while ($linha=mysql_fetch_array($resultado)) {
					eco($tab,"<tr><td>".$linha['secao']."</td><td>".$linha['COUNT(*)']."</td></tr>\n");
				}
          		eco(--$tab,"</table>\n");
				
          		eco($tab++,"<h4>Por IP :</h4>\n");
				query($conexao,"SELECT IP, COUNT(*) FROM visitas GROUP BY IP;",$resultado);
				eco($tab++,"<table>\n");
				eco($tab,"<tr><td><strong>IP</strong></td><td><strong>Visitas</strong></td></tr>\n");
				while ($linha=mysql_fetch_array($resultado)) {
					eco($tab,"<tr><td>".$linha['IP']."</td><td>".$linha['COUNT(*)']."</td></tr>\n");
				}
          		eco(--$tab,"</table>\n");

          		eco(--$tab,"</div>\n");								

    				break;

   			}  			
			}else //if (!is_null($itemMenuEdicoes))
			if (!(is_null($itemMenuEdicoes))) { 
 			 //Recuperar informacoes da edicao selecionada
				 RegistraVisita(retornarDiretorio($itemMenuEdicoes));
						

				 $nome_arquivo_saida = $itemMenuEdicoes.".".$_SERVER['REMOTE_ADDR'].".html";
				 $nome_arquivo_saida = $itemMenuEdicoes.".html";
			 	 $arquivo_saida = fopen("../revistaonline/temp/temp".$nome_arquivo_saida,"wt");
				 fwrite($arquivo_saida,"<html>\n");
				 fwrite($arquivo_saida,"<head>\n");
				 fwrite($arquivo_saida,"\t<title>Conteudo</title>\n");
				 fwrite($arquivo_saida,"\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">\n");
				 fwrite($arquivo_saida,"\t<style type=\"text/css\">\n");
				 fwrite($arquivo_saida,"\t<!--\n");
				 
				 $linhas = file ("css/conteudo.css");
				 foreach ($linhas as $linha) {
 						 fwrite($arquivo_saida,"\t\t".$linha."\n"); 
				 }	

				 $linhas = file ("css/texto.css");
				 foreach ($linhas as $linha) {
 						 fwrite($arquivo_saida,"\t\t".$linha."\n"); 
				 }	          				 
				 fwrite($arquivo_saida,"\t-->\n");
				 fwrite($arquivo_saida,"\t</style>\n");
				 fwrite($arquivo_saida,"</head>\n");
				 fwrite($arquivo_saida,"<body>\n");
				 fwrite($arquivo_saida,"\t<div id=\"corpo\">\n");
				 fwrite($arquivo_saida,"\t<div id=\"conteudo\"><!-- Parte central da pagina. Informacao vai aqui. -->\n");

//				 $arquivo_entrada =  fopen("temp".$nome_arquivo_saida,"wt");
				 conectar($conexao);
				 
				 $sql = "SELECT * FROM exemplar WHERE codigoDoExemplar = '".$itemMenuEdicoes."'";			 
				 query($conexao,$sql,$resultado);
				 if ($linha=mysql_fetch_array($resultado)) {
				 	eco($tab,"<div class=\"nome\">".charToHtml($linha['nome'])."</div>\n");
				 	eco($tab,"<div class=\"issn\">Volume ".$linha['volumeDoExemplar'].", n&uacute;mero".$linha['numeroDoExemplar'].", ".$linha['anoDoExemplar']." ISSN ".charToHtml($linha['ISSN'])."</div>\n");
				 	eco($tab,"<div class=\"redeMantenedora\">".charToHtml($linha['entidadeMantenedora'])."</div>\n");
					eco($tab,"<br /><strong>sum&aacute;rio</strong><table class=\"sumario\">\n");
					fwrite($arquivo_saida,indent2($tab)."<div class=\"nome\">".charToHtml($linha['nome'])."</div>\n");
					fwrite($arquivo_saida,indent2($tab)."<div class=\"issn\">Volume ".$linha['volumeDoExemplar'].", n&uacute;mero".$linha['numeroDoExemplar'].", ".$linha['anoDoExemplar']." ISSN ".charToHtml($linha['ISSN'])."</div>\n");
					fwrite($arquivo_saida,indent2($tab)."<div class=\"redeMantenedora\">".charToHtml($linha['entidadeMantenedora'])."</div>\n");
					fwrite($arquivo_saida,indent2($tab)."<br /><strong>sum&aacute;rio</strong><table class=\"sumario\">\n");
					$sql2 = "SELECT * FROM artigo WHERE codigoDoExemplar = ".$linha['codigoDoExemplar']." ORDER BY paginaInicial";			 
					query($conexao,$sql2,$resultado2);
					while ($linha2=mysql_fetch_array($resultado2)) {
						eco($tab,"<tr><td>".$linha2['titulo']."<br />".criarLinhaAutores($linha2['autores'])."</td><td>".criarLinhaLinks($linha2['codigoDoExemplar'],$linha2['codigoDoArtigo'])."</td><td>".((is_null($linha2['paginaInicial']))?"&nbsp;":$linha2['paginaInicial'])."</td></tr>\n");
						fwrite($arquivo_saida,indent2($tab)."<tr><td>".$linha2['titulo']."<br />".criarLinhaAutores($linha2['autores'])."</td><td>".((is_null($linha2['paginaInicial']))?"&nbsp;":$linha2['paginaInicial'])."</td></tr>\n");
					}
						 					
					eco($tab,"</table>\n");
					fwrite($arquivo_saida,indent2($tab)."</table>\n");
					eco($tab,"<br /><a target=\"_blank\" href=\"temp/temp".$nome_arquivo_saida."\">Vers&atilde;o para impress&atilde;o</a>\n");
					fwrite($arquivo_saida,"\t\t</div>\n");
					fwrite($arquivo_saida,"\t\t</div>\n");				
					fwrite($arquivo_saida,"</body>\n");				
					fwrite($arquivo_saida,"</html>\n");				
				 }


			} else {
				conectar($conexao);
	  			RegistraVisita("capa",$itemMenu);
				eco($tab,"<div id=\"emPublicacao\">\n");
					eco($tab,"<strong>Em publica&ccedil;&atilde;o</strong>\n");				
					$sql = "SELECT codigoDoExemplar, nome, numeroDoExemplar, volumeDoExemplar FROM exemplar WHERE status = 'Em Espera' ORDER BY volumeDoExemplar DESC, numeroDoExemplar DESC";
					query($conexao,$sql,$resultado);
					eco($tab++,"<ul>\n");
					while ($linha=mysql_fetch_array($resultado))  {			
						eco($tab,"<li><b><a href=\"index.php?itemMenuEdicoes=".$linha['codigoDoExemplar']."\" target=\"_parent\">Volume ".$linha['volumeDoExemplar']." N&uacute;mero ".$linha['numeroDoExemplar']."</a></b><br \>\n");
						$nome = $linha['nome'];
						eco($tab,$nome."<br \><br \></li>\n");
					}		
					eco(--$tab,"</ul>\n");					
				eco($tab,"</div>\n");
				eco($tab,"<br \><br \>\n");				
				eco($tab,"<div id=\"exemplaresPublicados\">\n");
					eco($tab,"<strong>Exemplares Publicados</strong>\n");								
					$sql = "SELECT codigoDoExemplar, nome, mesDoExemplar, anoDoExemplar, numeroDoExemplar, volumeDoExemplar FROM exemplar WHERE status = 'Publicado' ORDER BY volumeDoExemplar DESC, numeroDoExemplar DESC";
					query($conexao,$sql,$resultado);
					eco($tab++,"<ul>\n");
					while ($linha=mysql_fetch_array($resultado))  {			
						eco($tab,"<li><b><a href=\"index.php?itemMenuEdicoes=".$linha['codigoDoExemplar']."\" target=\"_parent\">Volume ".$linha['volumeDoExemplar']." N&uacute;mero ".$linha['numeroDoExemplar']."</a></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(".$linha['mesDoExemplar']." ".$linha['anoDoExemplar'].")<br \>\n");
						$nome = $linha['nome'];
						eco($tab,$nome."<br \><br \></li>\n");
					}		
					eco(--$tab,"</ul>\n");					
				eco($tab,"</div>\n");


			}
		
		eco(--$tab,"</div>\n");
  	}

	/*
	 * Cria o conteudo da pagina para NOFRAMES. 18/05/2005 
	 * 
	 */
		 
		function conteudo($tab,$itemMenu,$itemMenuEdicoes){
		global $itemsForm2;
			$ano = date("Y");
		while ((!((file_exists("$ano/capa.jpg"))||(file_exists("$ano/capa.gif"))))and ($ano > 1998)){
					$ano--;
		}

		eco($tab++,"<div id=\"conteudo\"><!-- Parte central da pagina. Informacao vai aqui. -->\n");

  		if (!(is_null($itemMenu))){
    		if (file_exists("$ano/capa.jpg")){
    			 eco($tab,"<div id=\"figuraCapa\"><img src=\"$ano/capa.jpg\" height=\"247\" width=\"180\" /></div>\n");
    		}else if (file_exists("$ano/capa.gif")){
    				eco($tab,"<div id=\"figuraCapa\"><img src=\"$ano/capa.gif\" height=\"247\" width=\"180\" /></div>\n");
    		}
			
			eco($tab++,"<script type=\"text/javascript\">\n");
			eco($tab,"tamanho = Math.floor(84/100*screen.availWidth)-180;\n");
			//eco($tab,"alert(\"<div id='miolo' width='\"+tamanho+\"'>\");\n");
			//eco($tab,"alert(\"<div id=\\\"miolo\\\" width\\\"\"+tamanho+\"\\\">\");\n");
			eco($tab,"document.write(\"<div id='miolo' width='\"+tamanho+\"'>\");\n");			
			eco(--$tab,"</script>\n");				
//			eco($tab,"<div id=\"miolo\">\n");
  			switch ($itemMenu){
    			case 0: //Conheca a revista
//							eco($tab,"<table width=\"50%\"><tr><td>\n");
							eco($tab,"<a class=\"linkArquivo\" href=\"docs/conhecaARevista.doc\">Documento original (.rtf)</a>\n\n");					
							include('html/conhecaARevista.html');
//							eco($tab,"</td></tr></table>\n");	
    				break;
    			case 1: //Corpo Editorial
          			include('html/corpoEditorial.html');
    				break;
    			case 2: //Instrucoes para Autores
					include('html/instrucoes.html');
    				break;
    			case 3: //Criar formulario de pesquisa
           		eco($tab++,"<div id=\"buscaAvancada\"><strong>Busca Avan&ccedil;ada :</strong><!-- Formulario de busca de artigos -->\n");
          			eco($tab,"<!-- Busca por palavra chave e autor -->\n");
          			eco($tab++,"<form name=\"formBuscaAvancadaDeArtigos\" method=\"post\" action=\"mostra.php\">\n");
								
								//criarLinhaForm($tab,$tipo,$checked,$valorText1,$valorCombo,$valorText2)
								criarLinhaForm($tab,"titulo", true, $itemsForm2["titulo"],NULL, $itemsForm2["titulo"], "formBuscaAvancadaDeArtigos");
								criarLinhaForm($tab,"palavraChave", true, $itemsForm2["palavraChave"],NULL, $itemsForm2["palavraChave"], "formBuscaAvancadaDeArtigos");
								criarLinhaForm($tab,"autor", true, $itemsForm2["autor"],NULL, $itemsForm2["autor"], "formBuscaAvancadaDeArtigos");
      			
          			eco($tab++,"<div class=\"itemMenuBusca\">\n");
        				eco($tab,"Pesquisar em :\n");
        					gerarEdicoes($tab,NULL); 
          			eco(--$tab,"</div>\n");

//         				divClass($tab,"<input type=\"reset\" value=\"Apagar Tudo\"><input type=\"submit\" name=\"botao2\" id=\"botao\" value=\"Pesquisar ...\">\n","itemMenuBusca");
         				divClass($tab,"<input type=\"submit\" name=\"botao\" id=\"botao2\" value=\"Pesquisar ...\">\n","itemMenuBusca");          
          			eco(--$tab,"</form>\n");
          
          		eco(--$tab,"</div>\n");				

    				break;
   			}  			
			}else //if (!is_null($itemMenuEdicoes))
			if (!(is_null($itemMenuEdicoes))) { 
 			 //Recuperar informacoes da edicao selecionada
			 
				 $ano = $itemMenuEdicoes;
				 if (file_exists("$ano/capa.jpg")){
      			 eco($tab,"<div id=\"figuraCapa\"><img src=\"$ano/capa.jpg\" height=\"247\" width=\"180\" /></div>\n");
      	 }else if (file_exists("$ano/capa.gif")){
      				eco($tab,"<div id=\"figuraCapa\"><img src=\"$ano/capa.gif\" height=\"247\" width=\"180\" /></div>\n");
      	 }
				 eco($tab,"<div id=\"miolo\">\n");
				 
				 conectar($conexao);
				 
				 $sql = "SELECT * FROM exemplar WHERE anoDoExemplar = '".$itemMenuEdicoes."'";			 
				 query($conexao,$sql,$resultado);
				 if ($linha=mysql_fetch_array($resultado)) {
				 	eco($tab,"<div class=\"nome\">".charToHtml($linha['nome'])."</div>\n");
				 	eco($tab,"<div class=\"issn\">Volume ".$linha['volumeDoExemplar'].", n&uacute;mero".$linha['numeroDoExemplar'].", ".$linha['anoDoExemplar']." ISSN ".charToHtml($linha['ISSN'])."</div>\n");
				 	eco($tab,"<div class=\"redeMantenedora\">".charToHtml($linha['entidadeMantenedora'])."</div>\n");
					eco($tab,"<strong>sum&aacute;rio</strong><table class=\"sumario\">\n");
					$sql2 = "SELECT * FROM artigo WHERE codigoDoExemplar = ".$linha['codigoDoExemplar']."";			 
					query($conexao,$sql2,$resultado2);
					while ($linha2=mysql_fetch_array($resultado2)) {
						eco($tab,"<tr><td>".$linha2['titulo']."<br />".criarLinhaAutores($linha2['autores']).criarLinhaLinks($linha2['codigoDoExemplar'],$linha2['codigoDoArtigo'])."</td><td>".$linha2['paginaInicial']."</td></tr>\n");
					}
						 					
					eco($tab,"</table>\n");
				 }


			}
    	eco($tab,"</div>\n");
		eco(--$tab,"</div>\n");

						
  	}
	/*
	 * Cria a pagina lateral direita. 18/08/2005 17:10 
	 * 
	 */
		 
	function figuraLateral($tab,$itemMenu,$itemMenuEdicoes){
		$diretorio = "";
		$extensao = "";
		if (!(is_null($itemMenuEdicoes))) { 
			$diretorio = retornarDiretorio($itemMenuEdicoes);
		} else if (!(is_null($itemMenu))){
			conectar($conexao);
			$sql = "SELECT numeroDoExemplar, volumeDoExemplar FROM exemplar WHERE status='Publicado' ORDER BY volumeDoExemplar DESC, numeroDoExemplar DESC";
			query($conexao,$sql,$resultado);
			$flag =1;
			while (($linha=mysql_fetch_array($resultado)) & ($flag)) {
				$diretorio = "vol".$linha['volumeDoExemplar']."n".$linha['numeroDoExemplar'];
				if ((file_exists("$diretorio/capa.jpg"))||(file_exists("$diretorio/capa.gif"))) {
					$flag = 0;
				}
			}
		}
			
		if (file_exists("$diretorio/capa.jpg")){
			$extensao = "jpg";
		}else if (file_exists("$diretorio/capa.gif")){
			$extensao = "gif";
		}
		if (!empty($extensao)){
			eco($tab++,"<script type=\"text/javascript\">\n");
			eco($tab,"document.write(\"	<div id='figuraCapa1'><img src='".$diretorio."/capa.".$extensao."' height='\"+Math.floor((247*(screen.availWidth/1024)))+\"' width='\"+Math.floor((180*(screen.availWidth/1024)))+\"' /></div>\");\n");
//			eco($tab,"alert(\"	<div id='figuraCapa1'><img src='".$diretorio."/capa.".$extensao."' height='\"+Math.floor((247*(screen.availWidth/1024)))+\"' width='\"+Math.floor((180*(screen.availWidth/1024)))+\"' /></div>\");\n");
			eco($tab--,"</script>\n");
		}
  	}

	/*
	 * Retorna o ano do exemplar dado certo codigoDoExemplar. 21/06/2005 12:06 
	 * 
	 */
		
		function retornarAno($codigoDoExemplar){
				conectar($conexao);
				query($conexao,"SELECT anoDoExemplar FROM exemplar WHERE codigoDoExemplar = '".$codigoDoExemplar."'",$resultado);
				if ($linha = mysql_fetch_array($resultado)){
					 return $linha['anoDoExemplar'];
				}
		}

	/*
	 * Retorna o diretorio base de um exemplar dado certo codigoDoExemplar. 09/08/2005 15:15 
	 * 
	 */
		
		function retornarDiretorio($codigoDoExemplar){
				conectar($conexao);
				if (isset($codigoDoExemplar)){
					$sql = "SELECT numeroDoExemplar, volumeDoExemplar FROM exemplar WHERE codigoDoExemplar = ".$codigoDoExemplar ;
					query($conexao,$sql,$resultado);
					if ($linha = mysql_fetch_array($resultado)){
						 return  "vol".$linha['volumeDoExemplar']."n".$linha['numeroDoExemplar'];
					}
				}else{
					return "";
				}
		}



	/*
	 * Retorna as palavras chaves em formato texto. 21/06/2005 12:15 
	 * 
	 */
	
		function obterPalavrasChave($palavra_chave){
				$retorno = "";
				$flag = 0;
				$palavras = explode("-",$palavra_chave);
				conectar($conexao);
	  		foreach ($palavras as $palavra) {
  				query($conexao,"SELECT palavraChavePortugues, palavraChaveIngles FROM palavraschave WHERE codigoDaPalavraChave = '".$palavra."'",$resultado);
					if ($linha = mysql_fetch_array($resultado)){
                         if ($flag)
                         $retorno .= ',';
                         $retorno .= " ".$linha['palavraChavePortugues'].", ".$linha['palavraChaveIngles'];
						 $flag=1;
					} 		    
				}
				return $retorno;
																			 
		}

	/*
	 * Verifica se usuario esta realmente logado. 22/09/2005 15:20 
	 * 
	 */
	
		function verifica($tipo){
			session_start();
			
			if(!isset($_SESSION["login"]))
			{
				header("Location: index.php");
				exit;
			} else {
				//checa se o usuario tem permissao para aquele setor
				if (!($_SESSION["tipo"]==$tipo))
				{
					echo('&Aacute;rea n&atilde;o permitida.');
					exit;
				}
				
			}
		}

	/*
	 *Limpa as sessoes. 09/01/2003 13:14
	 */

		function limpaSessoes(){
			$cod = $_SESSION["cod"];
			$login = $_SESSION["login"];
			$tipo = $_SESSION["tipo"];
			session_destroy();
			session_start();
			$_SESSION["cod"] = $cod;
			$_SESSION["login"] = $login;
			$_SESSION["tipo"] = $tipo;
		}

	/*
	 * Retorna o nome do autor a partir de seu codigo. 31/01/2006 11:53
	 *
	 */

		function obterNomeDoUsuario ($cod) {
				conectar($conexao);
 				query($conexao,"SELECT nome FROM users WHERE cod = ".$cod,$resultado);
					if ($linha = mysql_fetch_array($resultado)){
                      return $linha['nome'];
					}


		}

?>
