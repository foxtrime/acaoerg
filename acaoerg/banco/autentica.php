<?php
  	ob_start();
	include'../funcoes.php';
	// Conexão com o banco de dados
	conectar($conexao);				
	// Inicia sessões
	session_start();
	session_destroy();
	session_start();
	session_cache_expire(1);

	$mensagem = "";
	// Recupera o login
	$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE;
	// Recupera a senha, a criptografando em MD5
	$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;
	

    // Usuário não forneceu a senha ou o login
	if(!$login || !$senha){
		$mensagem = "Você deve digitar sua senha e login!";				
	} else{
	
		$sql = "SELECT cod, login, tipo, senha FROM users WHERE login = '" . $login . "'";
		
		$result = @mysql_query($sql) or die("Erro no banco de dados!");
		$total = @mysql_num_rows($result);
		
		if($total)
		{
			$dados = @mysql_fetch_array($result);
			// Agora verifica a senha
			if(!strcmp($senha, $dados["senha"]))
			{
				$_SESSION["cod"] = stripslashes($dados["cod"]);
				$_SESSION["login"] = stripslashes($dados["login"]);
				$_SESSION["tipo"] = stripslashes($dados["tipo"]);
				header("Location: ".$_SESSION["tipo"].".php");
			}
			else{
				$mensagem =  "Senha inválida!";
			}
		}else{
			$mensagem = "O login fornecido é inexistente!";
    	}
	}
	ob_end_flush();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
		<title>A&ccedil;&atilde;o Ergon&ocirc;mica</title>
		<link href="css/figura.css" rel="stylesheet" media="screen">
		<link href="css/coreseestrutura.css" rel="stylesheet" media="screen">
	</head>

<body>
	<div id="conteudo">
		<div id="titulo">
			<h1>A&ccedil;&atilde;o Ergon&ocirc;mica</h1>
		</div>
		<div id="corpo">
			<h3>
			<?php
			 echo $mensagem;
			?>			
			</h3>
		</div>
		<div id="rodape">
			<a href ="javascript:window.close();">Fechar</a>
			<a href ="index.php">In&iacute;cio</a>
		</div>			
	</div>
</body>

</html>
