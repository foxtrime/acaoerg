<html>
<head>
<title>Conteudo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="js/form.js"></script>
<link rel="stylesheet" href="css/buscaArtigos.css" type="text/css">
<link rel="stylesheet" href="css/texto.css" type="text/css">				
</head>
<body>
<?php
		 include('funcoes.php');
		 $tab=1;
		 /*
		 if (substr_count($_SERVER['HTTP_REFERER'],"conteudo.php")){
		 		eco($tab,"Veio do formulario avancado");
		 }
		 if (substr_count($_SERVER['HTTP_REFERER'],"menuLateral.php")){
 		 		eco($tab,"Veio do menu Lateral");
		 }
		 */
		 $sql= "";
		 $parcial= "";
			$flag=0;
			conectar($conexao);  
			if (isset($chboxtitulo)){
					if ($titulo != "Parte do Título"){
							$parcial .= ($flag?" AND ( ":"SELECT * FROM artigo WHERE ( ")."titulo LIKE \"%".mysql_escape_string ($titulo)."%\"";
							$flag = 1;						
					}
					if (isset($combotitulo)){					
						if ($combotitulo != "NULL"){
								if ($titulo2 != "Parte do Título"){
								$parcial .= ($flag?" ".mysql_escape_string ($combotitulo)." ":"SELECT * FROM artigo WHERE ")."titulo LIKE \"%".mysql_escape_string ($titulo2)."%\"";
								$flag = 1;
							}						
						}
					}
					if (!empty($parcial)){
						$sql .=  $parcial.")";
					} 
			}
	  
			$parcial= "";		
			if (isset($chboxpalavraChave)){
					//eco($tab,"Processar palavras Chave<br />\n");
					if ($palavraChave != "Palavra Chave"){
							$sql2="SELECT codigoDaPalavraChave FROM palavraschave WHERE palavraChavePortugues = '".mysql_escape_string($palavraChave)."' OR palavraChaveIngles= '".mysql_escape_string ($palavraChave)."'";
							query($conexao,$sql2,$resultado2);
							$codigoDaPalavraChave = 0; 
							if ($linha2=mysql_fetch_array($resultado2)) {
								 $codigoDaPalavraChave = $linha2['codigoDaPalavraChave'];
								 $parcial .= ($flag?" AND ( ":"SELECT * FROM artigo WHERE ( ")."palavraschave LIKE \"%-".mysql_escape_string($codigoDaPalavraChave)."-%\"";
							} else {
								$parcial .= ($flag?" AND ( ":"SELECT * FROM artigo WHERE ( ")."0";
							}
							$flag = 1;
					}
						if (isset($combopalavraChave)){					
						if ($combopalavraChave != "NULL"){
								if ($palavraChave2 != "Palavra Chave"){
									$sql3="SELECT codigoDaPalavraChave FROM palavraschave WHERE palavraChavePortugues = '".mysql_escape_string($palavraChave2)."' OR palavraChaveIngles= '".mysql_escape_string ($palavraChave2)."'";
									query($conexao,$sql3,$resultado3);
									$codigoDaPalavraChave = 0; 
									if ($linha3=mysql_fetch_array($resultado3)) {
										 $codigoDaPalavraChave = $linha3['codigoDaPalavraChave'];
											 $combopalavraChave = mysql_escape_string ($combopalavraChave);
											 $parcial .= ($flag?" $combopalavraChave ":"SELECT * FROM artigo WHERE ")."palavraschave LIKE \"%-".mysql_escape_string($codigoDaPalavraChave)."-%\"";											 
									} else {
										$parcial .= ($flag?" AND ( ":"SELECT * FROM artigo WHERE ( ")."0";
									}
									$flag = 1;
							}						
						}
						}
						if (!empty($parcial)){
							$sql .=  $parcial.")";
						} 
			}
			$parcial= "";
			if (isset($chboxautor)){
				//	eco($tab,"Processar Autores<br />\n");
					if ($autor != "Nome do Autor"){
							$parcial .= ($flag?" AND ( ":"SELECT * FROM artigo WHERE ( ")."autores LIKE \"%".$autor."%\"";
							$flag = 1;						
					}
						if (isset($comboautor)){
							if ($comboautor != "NULL"){
									if ($autor2 != "Nome do Autor"){
									$parcial .= ($flag?" ".$comboautor." ":"SELECT * FROM artigo WHERE ")."autores LIKE \"%".$autor2."%\"";
									$flag = 1;
									}						
							}
						}  				 						
						if (!empty($parcial)){
							$sql .=  $parcial.")";
						} 

			}
			$parcial = "";
			if ($edicoes){
					$parcial .= ($flag?" AND ( ":"SELECT * FROM artigo WHERE ( ")."codigoDoExemplar = '".$edicoes."'";
					$flag = 1;						
					if (!empty($parcial)){
						$sql .=  $parcial.")";
					} 	
			}
				if ($sql != ""){
					$flag = 0;
					conectar($conexao);			
					query($conexao,$sql,$resultado);
					if (mysql_num_rows($resultado)){
						eco($tab++,"<table>\n");
						tr($tab++);						
							td($tab,"Ano","class=\"titulo\"");
							td($tab,"T&iacute;tulo","class=\"titulo\"");					
							td($tab,"Autores","class=\"titulo\"");					
							td($tab,"Palavras Chave","class=\"titulo\"");
							td($tab,"pdf","class=\"titulo\"");														
							td($tab,"Resumo","class=\"titulo\"");									
						ftr(--$tab);
		  
						while ($linha = mysql_fetch_array($resultado)) {
							tr($tab++);						
								$ano = retornarAno($linha['codigoDoExemplar']);
								td($tab,$ano);
								td($tab,charToHtml($linha['titulo']));					
								td($tab,charToHtml($linha['autores']));					
								td($tab,charToHtml(obterPalavrasChave($linha['palavrasChave'])));
								td($tab,criarLinhaLinks($linha['codigoDoExemplar'],$linha['codigoDoArtigo']));					
							ftr(--$tab);	
						}
						eco(--$tab,"</table>\n");					
					}else{
						eco($tab,"N&atilde;o h&aacute; registros que correspondam as op&ccedil;&otilde;es de pesquisa.\n");
					}
				}else{
					eco($tab,"N&atilde;o h&aacute; registros que correspondam as op&ccedil;&otilde;es de pesquisa.\n");			
				}			
		
				
		/*
					$parametros = "?";
				$flag = 0;
			foreach ($_POST as $key => $value) {
				echo "Chave: $key; Valor: $value<br>\n";
						if ($flag ==1 ){
							 $parametros .= "&";
						} 
						$flag =1;
						$parametros .= $key."=".$value;
			}
	
	*/	 
	 
?>
</body>
</html>
