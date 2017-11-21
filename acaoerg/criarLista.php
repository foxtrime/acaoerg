<html>
<head>
<title>Revista A&ccedil;&atilde;o Ergon&ocirc;mica</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/texto.css" />
<script language=javascript src="js/form.js"></script>
</head>
<body bgcolor="#FFFFFF" text="#000000">
  <?php
		 include('funcoes.php');
		 $tab = 1;

		 if ($tipo == "titulo") {
		 		 divClass($tab,"Lista de T&iacute;tulos:","tituloLista");
		 		$sql = "SELECT titulo FROM artigo";
				conectar($conexao);
				query($conexao,$sql,$resultado);		
  			if (mysql_num_rows($resultado)){
  			 	criarLista($tab, $tipo, 1, $resultado, NULL );
  			} else {
  				eco($tab,"<strong>N&atilde;o h&aacute; items cadastrados.</strong>\n");
  			}

		 }else if ($tipo == "palavraChave") {
	 		  divClass($tab,"Lista de Palavras Chave:","tituloLista");
		 		$sql = "SELECT * FROM palavraschave ORDER BY palavraChavePortugues";
				conectar($conexao);
				query($conexao,$sql,$resultado)	;	
  			if (mysql_num_rows($resultado)){
  			 	criarLista($tab, $tipo, 1, $resultado );
  			} else {
  				eco($tab,"<strong>N&atilde;o h&aacute; items cadastrados.</strong>\n");
  			}

		 }
		 
 

		 
?>
</body>
</html>
