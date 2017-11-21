<?php
	include'funcoes.php';
    session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
		<title>A&ccedil;&atilde;o Ergon&ocirc;mica</title>
		<link href="banco/css/figura.css" rel="stylesheet" media="screen">
		<link href="banco/css/coreseestrutura.css" rel="stylesheet" media="screen">

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
			<h3>Executando instru&ccedil;&otilde;es... </h3>
<?php 
	$tab = 4;


    	$sql = "INSERT INTO users VALUES ('','$login','".md5($senha)."','$nome','$formacao','$local_de_trabalho','$email', 'autor')";
		conectar($conexao);
		query($conexao,$sql,$resultado);
        if (mysql_affected_rows($conexao)){
     	    eco($tab,'O usu&aacute;rio foi adicionado com sucesso! Clique <a href ="javascript:window.close()">aqui</a> para fechar a janela.');
			}else{
     	    eco($tab,'N&atildeo foi poss&iacute;vel adicionar o usu&aacute;o!');
        }
?>			
			<hr />

		</div>
		&nbsp;
		

	</div>
</body>

</html>
