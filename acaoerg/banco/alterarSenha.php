<?php
	include'../funcoes.php';
	session_start();
	if (!isset($_SESSION["cod"]))
	{
	 echo('&Aacute;rea n&atilde;o permitida.');
	 exit;
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
		
		#submissoes{
		margin : 5px;
		}

		#submissoes td   { 
     		border:1px dotted #000000;
				padding-left: 10;
				padding-right: 10; 
        padding-top: 2;
				padding-bottom: 2;
				text-align:center;
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

			<div class="esquerda">
			<h3>Alterar Senha</h3>
			<form name="novoArtigo" action="executarSenha.php" method="post">

				<br /><label for="senha1">Nova Senha</label>&nbsp;<input name="senha1" id="senha1" type="password" maxlength="30">
				<br /><label for="senha2">Confirmação</label>&nbsp;<input name="senha2" id="senha2" type="password" maxlength="30">




				<br /><input type="reset" value="Limpar">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Alterar">
                <input type="hidden" name="acao" value="adicionarArtigo" />
 			</form>
			</div>
			
		</div>
		&nbsp;
		<div id="rodape">
			<a href ="alterarSenha.php">Alterar Senha</a>
			<a href ="<?php echo $_SESSION['tipo'] ;?>.php">Principal</a>
			<a href ="sair.php">Sair</a>
		</div>			

	</div>
</body>

</html>
