<?php
	include'../funcoes.php';
	verifica('editor') ;
	limpaSessoes();

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
			<h3>Exemplares a publicar</h3>
<?php 
			$tab = 4;
			$sql = "SELECT * FROM exemplar WHERE status = 'Em espera' ORDER BY volumeDoExemplar DESC, numeroDoExemplar DESC";
			conectar($conexao);
			query($conexao,$sql,$resultado);
            $flag = 1;
			if (mysql_num_rows($resultado)){
				eco($tab++, "<form  name=\"publicar\" action=\"confirmareditor.php\" method=\"post\">\n");
				eco($tab, "<input name=\"acao\" type=\"hidden\" value=\"publicarExemplar\">\n");
				while ($linha = mysql_fetch_array($resultado)){				
					  eco($tab, "<input name=\"codigoDoExemplar\" ".($flag?'checked ':'')."type=\"radio\" value=\"".$linha['codigoDoExemplar']."\" id=\"".$linha['codigoDoExemplar']."\"><label for=\"".$linha['codigoDoExemplar']."\"> vol. ".$linha['volumeDoExemplar']." # ".$linha['numeroDoExemplar']."</label><br />\n");
					  $flag=0;
				}
				eco($tab, "<input type=\"submit\" name=\"botao\" value=\"Publicar\">\n");				
				eco(--$tab, "</form>\n");
			} else {
			  eco($tab, "N&atilde;o h&aacute; exemplares em espera.<br />\n");
			}
?>			
			<hr />
			<div id="adicionarExemplar">
			<h3>Adicionar Novo Exemplar</h3>
			<form name="novoExemplar" action="confirmarEditor.php" method="post">
				<input name="acao" type="hidden" value="adicionarExemplar">
        		<br /><label for="nome">Nome do Exemplar</label>&nbsp;<input name="nome" id="nome" type="text" maxlength="255">
				<br /><label for="mesDoExemplar">M&ecirc;s do Exemplar</label>&nbsp;

                <select id="mesDoExemplar" name="mesDoExemplar">
                    <option selected value="jan">janeiro</option>
                    <option value="fev">fevereiro</option>
                    <option value="mar">mar&ccedil;o</option>
                    <option value="abr">abril</option>
                    <option value="mai">maio</option>
                    <option value="jun">junho</option>
                    <option value="jul">julho</option>
                    <option value="ago">agosto</option>
                    <option value="set">setembro</option>
                    <option value="out">outubro</option>
                    <option value="nov">novembro</option>
                    <option value="dez">dezembro</option>
                </select>
				<br /><label for="anoDoExemplar">Ano do Exemplar</label>&nbsp;<input id="anoDoExemplar" name="anoDoExemplar" type="text" maxlength="255">
				<br /><label for="numeroDoExemplar">N&uacute;mero do Exemplar</label>&nbsp;<input id="numeroDoExemplar" name="numeroDoExemplar" type="text" maxlength="255">
				<br /><label for="volumeDoExemplar">Volume do Exemplar</label>&nbsp;<input id="volumeDoExemplar" name="volumeDoExemplar" type="text" maxlength="255">
				<br />Status 
				<input id="status1" name="status" type="radio" value="Publicar"><label for="status1">Publicar</label>
				<input id="status2" name="status" type="radio" value="Em espera" checked><label for="status2">Em espera</label>
				<br /><input type="reset" value="Limpar">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Adicionar">
 			</form>
			</div>
			<div id="adicionarPalavraChave">
			<h3>Adicionar PalavraChave</h3>
			<form name="novaPalavraChave" action="confirmarEditor.php" method="post">
				<input name="acao" type="hidden" value="adicionarPalavraChave">
        		<br /><label for="portugues">Em Portugu&ecirc;s</label>&nbsp;<input name="palavraChavePortugues" id="portugues" type="text" maxlength="255">
				<br /><label for="ingles">Em Ingl&ecirc;s</label>&nbsp;<input name="palavraChaveIngles" id="ingles" type="text" maxlength="255">
				<br /><input type="reset" value="Limpar">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Adicionar">
 			</form>
			</div>
			
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
