<?php
	include'../funcoes.php';
	verifica('autor') ;
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

      case 'adicionarArtigo':
        //instanciar objeto submissao e trabalhar com o objeto
        $codigo_submissao = '';
    	$sql = "INSERT INTO submissoes VALUES ( '' , '$titulo' , '$secao' , '".obterNomeDoUsuario($cod)."' , '$co_autores' , '".date("Y-m-d")."' , NULL, NULL, '$palavrasChave', 'original_enviado' )";
		conectar($conexao);
		query($conexao,$sql,$resultado);
        if (mysql_affected_rows($conexao)){

    		query($conexao , "SELECT cod FROM submissoes WHERE  titulo = '$titulo' " , $resultado2);
            	if ($linha = mysql_fetch_array($resultado2)){

                    $codigo_submissao = $linha['cod'];

                    $dir = "submissoes/".$codigo_submissao;
                    mkdir($dir);
        			$extensao = explode(".",$caminho_Do_Arquivo);
                	if (move_uploaded_file($caminho_Do_Arquivo, $dir.'/original.'.$extensao[count($extensao)-1] )){
        				echo "<strong>Artigo enviado com sucesso!</strong>";
        			}else{
        				echo "<strong>Erro ao enviar seu artigo!</strong>";
        			}

                    //ver arquivo ajudaArquivos

             	    eco($tab,'O exemplar foi adicionado com sucesso!');

					}



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
			<a href ="autor.php">Principal</a>
			<a href ="sair.php">Sair</a>
		</div>			

	</div>
</body>

</html>
