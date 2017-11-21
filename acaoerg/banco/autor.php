<?php
	include'classes.php';
	verifica('autor');
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
			<h3>Artigos Pendentes</h3>
<?php 

			$tab = 4;
			$autor1 = new autor($_SESSION['cod']);

			if ($autor1->getSubmissoesPendentes()){ //percorrer array de submissoesPendentes
				eco($tab++, "<table>\n");	
				tr($tab++);	
					td($tab,"T&iacute;tulo");
					td($tab,"Status");
				ftr(--$tab);				
                reset($autor1->submissoesPendentes);
				tr($tab++);
                    $atual =current($autor1->submissoesPendentes);
					td($tab,charToHtml($atual->titulo));
//					td($tab,$atual->textoStatus());
					td($tab,'nononono');
				ftr(--$tab);
				while (next($autor1->submissoesPendentes)){
				tr($tab++);	
                    $atual =current($autor1->submissoesPendentes);
					td($tab,charToHtml($atual->titulo));
					td($tab,$atual->textoStatus());
				ftr(--$tab);
				}		
				eco(--$tab, "</table>\n");	
			}else{
				eco($tab, "N&atilde;o h&aacute; artigos pendentes.<br />\n");	
			}



?>			
			<hr />
			<div class="esquerda">
			<h3>Enviar Artigo</h3>
			<form name="novoArtigo" action="confirmarAutor.php" method="post" enctype="multipart/form-data">

				<br /><label for="titulo1">T&iacute;tulo</label>&nbsp;<input name="titulo" id="titulo1" type="text" maxlength="255">
				<br /><label for="secao">Se&ccedil;&atilde;o</label>&nbsp;
				<select name="secao" id="secao">
                    <option value="Artigos de pesquisa">Artigos de pesquisa</option>
                    <option value="Artigos de posição">Artigos de posi&ccedil;&atilde;o</option>
                    <option value="Artigos de revisão">Artigos de revis&atilde;o</option>
                    <option value="Teses e Dissertações">Teses e Disserta&ccedil;&otilde;es</option>
                    <option value="Monografias">Monografias</option>
                    <option value="Trabalhos de Curso">Trabalhos de Curso</option>
                    <option value="Outros">Outros</option>

                </select>


				<br /><label for="co_autores">Co-autores</label>&nbsp;<input id="co_autores" name="co_autores" type="text" maxlength="255">
				<br /><label for="palavraChave1">Palavra Chave1</label>&nbsp;
				<?php gerarpalavrasChave(4,NULL,1); ?>
				<br /><label for="palavraChave2">Palavra Chave2</label>&nbsp;
				<?php gerarpalavrasChave(4,NULL,2); ?>
				<br /><label for="palavraChave3">Palavra Chave3</label>&nbsp;
				<?php gerarpalavrasChave(4,NULL,3); ?>
				<br /><label for="palavraChave4">Palavra Chave4</label>&nbsp;
				<?php gerarpalavrasChave(4,NULL,4); ?>
				<br /><label for="palavraChave5">Palavra Chave5</label>&nbsp;
				<?php gerarpalavrasChave(4,NULL,5); ?>

				<br /><label for="arquivoOriginal">Artigo Original&nbsp;</label><input type="file" name="arquivo" id="arquivoOriginal">

				<br /><input type="reset" value="Limpar">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Adicionar">
                <input type="hidden" name="acao" value="adicionarArtigo" />
 			</form>
			</div>
			
		</div>
		&nbsp;
		<div id="rodape">
			<a href ="alterarSenha.php">Alterar Senha</a>
			<a href ="autor.php">Principal</a>
			<a href ="sair.php">Sair</a>
		</div>			

	</div>
</body>

</html>
