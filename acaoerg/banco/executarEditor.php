<?php
	include'../funcoes.php';
	verifica('editor') ;
	foreach ($_SESSION as $k => $v) {
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
			<h3>Executando instru&ccedil;&otilde;es</h3>
<?php 
	$tab = 4;
    switch ($acao) {

     case 'publicarExemplar':

    	$sql = "UPDATE exemplar SET status ='Publicado' WHERE codigoDoExemplar = '".$_SESSION['codigoDoExemplar']."'";
		conectar($conexao);
		query($conexao,$sql,$resultado);
        if (mysql_affected_rows($conexao)){
     	    eco($tab,'O exemplar vol. '.$volumeDoExemplar.' # '.$numeroDoExemplar.' foi publicado com sucesso!');
			}else{
     	    eco($tab,'N&atilde;o foi poss&iacute;vel publicar o exemplar vol. '.$volumeDoExemplar.' # '.$numeroDoExemplar.'!');
        }

        break;




      case 'adicionarExemplar':

    	$sql = "INSERT INTO exemplar VALUES ( NULL , '$nome' , '1519-7859' , 'GENTE - Grupo de Ergonomia e Novas Tecnologias (COPPE/UFRJ)' , '$mesDoExemplar' , '$anoDoExemplar' , '$numeroDoExemplar' , '$volumeDoExemplar', 'Em espera' )";
		conectar($conexao);
		query($conexao,$sql,$resultado);
        if (mysql_affected_rows($conexao)){
     	    eco($tab,'O exemplar foi adicionado com sucesso!');
			}else{
     	    eco($tab,'N&atildeo foi poss&iacute;vel adicionar o exemplar!');
        }

        break;




      case 'adicionarPalavraChave':

    	$sql = "INSERT INTO palavraschave VALUES ( NULL , '$palavraChavePortugues' , '$palavraChaveIngles')";
		conectar($conexao);
		query($conexao,$sql,$resultado);
        if (mysql_affected_rows($conexao)){
     	    eco($tab,'As palavras chave foram adicionadas com sucesso!');
			}else{
     	    eco($tab,'N&atildeo foi poss&iacute;vel adicionar as palavras chave!');
        }
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
