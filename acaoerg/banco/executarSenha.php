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
    	<h3>Alterando a Senha...</h3>

    <?php
        $tab = 3;

    	if (isset($senha1)&isset($senha2)){
    		if ((!empty($senha1))&!(empty($senha2))){
              if (!strcmp($senha1,$senha2)){
                $sql = "UPDATE users SET senha = '".md5($senha1)."' WHERE cod = '".$_SESSION['cod']."'";
                conectar($conexao);
        		query($conexao,$sql,$resultado);
                if (mysql_affected_rows($conexao)){
             	    eco($tab,'A senha foi alterada com sucesso! Clique <a href ="javascript:window.close()">aqui</a> para fechar a janela.');
        			}else{
             	    eco($tab,'N&atildeo foi poss&iacute;vel alterar a senha!');
                }


              }else{
                 echo 'A nova senha difere da confirma&ccedil;&atilde;o. Tente novamente.';
              }

            }else{
             echo 'Os campos de senha n&atilde;o foram preenchidos corretamente. Tente novamente.';
            }
        }else{
          echo 'Os campos de senha n&atilde;o foram preenchidos corretamente. Tente novamente.';
        }
    ?>
    	</div>

    </div>
    &nbsp;
    <div id="rodape">
    	<a href ="alterarSenha.php">Alterar Senha</a>
    	<a href ="<?php echo$_SESSION['tipo'] ;?>.php">Principal</a>
    	<a href ="sair.php">Sair</a>
    </div>

	</div>
</body>

</html>
