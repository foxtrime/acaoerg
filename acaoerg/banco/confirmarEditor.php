<?php
	include'../funcoes.php';
	verifica('editor') ;
    foreach ($_POST as $k => $v) {
        $_SESSION[$k]=$v;
        echo '$_SESSION['.$k.']='.$v.'<br />'."\n";
        $$k = $v;
    }
     


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
		<title>A&ccedil;&atilde;o Ergon&ocirc;mica</title>
		<link href="css/figura.css" rel="stylesheet" media="screen">
		<link href="css/coreseestrutura.css" rel="stylesheet" media="screen">

	    <style type="text/css">
		<!--
		#conteudo{
		width:760px;
		}
		-->
        </style>
	</head>

<body>
<div id="conteudo">
		<div id="titulo">
			<h1>A&ccedil;&atilde;o Ergon&ocirc;mica</h1>
		</div>
		<div id="corpo">
			<h3>Confirma&ccedil;&atilde;o</h3>
<?php 
	$tab = 4;
    switch ($acao) {
     case 'publicarExemplar':
    	$sql = "SELECT numeroDoExemplar,volumeDoExemplar FROM exemplar WHERE codigoDoExemplar = '".$codigoDoExemplar."'";
		conectar($conexao);
		query($conexao,$sql,$resultado);
        if ($linha = mysql_fetch_array($resultado)){
    	    eco($tab,'<form action="executarEditor.php" method="post">'."\n");
    	    eco($tab,'Voc&ecirc; tem certeza que deseja publicar o exemplar vol. '.$linha['volumeDoExemplar'].' # '.$linha['numeroDoExemplar'].' ?');
			eco($tab, '&nbsp;&nbsp;<input type="submit" name="botao" value="Sim">&nbsp;&nbsp;'."\n");

			eco($tab, '<input type="hidden" name="volumeDoExemplar" value="'.$linha['volumeDoExemplar'].'">'."\n");
			eco($tab, '<input type="hidden" name="numeroDoExemplar" value="'.$linha['numeroDoExemplar'].'">'."\n");
			eco($tab, '<input type="hidden" name="acao" value="publicarExemplar">'."\n");

     	    eco($tab,'</form>'."\n");
    	    eco($tab,'<form  action="editor.php">'."\n");
			eco($tab, '<input type="submit" name="botao" value="N&atilde;o" onclick="history.back()">'."\n");

     	    eco($tab,'</form>'."\n");
			}
            break;
      case 'adicionarExemplar':
    	    eco($tab,'<form action="executarEditor.php" method="post">'."\n");
    	    eco($tab,'Voc&ecirc; tem certeza que deseja adicionar o exemplar "'.$nome.'", vol. '.$volumeDoExemplar.' # '.$numeroDoExemplar.', publicado em '.$mesDoExemplar.' de '.$anoDoExemplar.' ?');
			eco($tab, '&nbsp;&nbsp;<input type="submit" name="botao" value="Sim">&nbsp;&nbsp;'."\n");

//			eco($tab, '<input type="hidden" name="nome" value="'.$nome.'">'."\n");
//			eco($tab, '<input type="hidden" name="volumeDoExemplar" value="'.$volumeDoExemplar.'">'."\n");
//			eco($tab, '<input type="hidden" name="numeroDoExemplar" value="'.$numeroDoExemplar.'">'."\n");
//			eco($tab, '<input type="hidden" name="mesDoExemplar" value="'.$mesDoExemplar.'">'."\n");
//			eco($tab, '<input type="hidden" name="anoDoExemplar" value="'.$anoDoExemplar.'">'."\n");
			
			eco($tab, '<input type="hidden" name="acao" value="adicionarExemplar">'."\n");

     	    eco($tab,'</form>'."\n");
    	    eco($tab,'<form action="editor.php">'."\n");
			eco($tab, '<input type="submit" name="botao" value="N&atilde;o" onclick="history.back()">'."\n");
     	    eco($tab,'</form>'."\n");
            break;

      case 'adicionarPalavraChave':
    	    eco($tab,'<form action="executarEditor.php" method="post">'."\n");
    	    eco($tab,'Voc&ecirc; tem certeza que deseja adicionar as palavras chave "'.$palavraChavePortugues.'" e "'.$palavraChaveIngles.'" ?');
			eco($tab, '&nbsp;&nbsp;<input type="submit" name="botao" value="Sim">&nbsp;&nbsp;'."\n");
//			eco($tab, '<input type="hidden" name="palavraChavePortugues" value="'.$palavraChavePortugues.'">'."\n");
//			eco($tab, '<input type="hidden" name="palavraChaveIngles" value="'.$palavraChaveIngles.'">'."\n");

			eco($tab, '<input type="hidden" name="acao" value="adicionarPalavraChave">'."\n");

     	    eco($tab,'</form>'."\n");
    	    eco($tab,'<form action="editor.php">'."\n");
			eco($tab, '<input type="submit" name="botao" value="N&atilde;o" onclick="javascript:history.back()">'."\n");

     	    eco($tab,'</form>'."\n");

            break;
    }
?>			
			<hr />

		</div>
		&nbsp;
		<div id="rodape">
			<a href ="alterarSenha.php">Alterar Senha</a>
			<a href ="editor.php">Principal</a>
			<a href ="sair.php">Sair</a>
		</div>			

	</div>
</body>

</html>
