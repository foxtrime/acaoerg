<?php
	include'../funcoes.php';
	verifica('autor') ;
    if (isset($_FILES['arquivo']['tmp_name']))
    $_SESSION['caminho_Do_Arquivo']=$_FILES['arquivo']['tmp_name'];
    $_SESSION['nome_Do_Arquivo']=$_FILES['arquivo']['name'];

    foreach ($_POST as $k => $v) {
        $_SESSION[$k]=$v;
//        echo '$_SESSION['.$k.']='.$v.'<br />'."\n";
        $$k = $v;
    }
    foreach ($_SESSION as $k => $v) {
        echo '$_SESSION['.$k.']='.$v.'<br />'."\n";
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
      case 'adicionarArtigo':
    	    eco($tab,'<form action="executarAutor.php" method="post">'."\n");
    	    $palavrasChave= '';
    	    $flag = 0;

    	    for ($i =1 ; $i<6 ;$i++)
    	    {
        	    $palavra_Chave = 'palavraChave'.$i;
                if (isset($$palavra_Chave)) {
                    if ($flag)
              	    $palavrasChave.= '-';
              	    $palavrasChave.= $$palavra_Chave;
              	    $flag = 1;

                }
            }
    	    eco($tab,'Voc&ecirc; tem certeza que deseja adicionar o artigo "'.$titulo.'" na se&ccedil;&atilde;o '.$secao.' tendo '.$co_autores.' como co-autores e com as palavras-chave '.obterPalavrasChave($palavrasChave).' ?');
			eco($tab, '&nbsp;&nbsp;<input type="submit" name="botao" value="Sim">&nbsp;&nbsp;'."\n");

			eco($tab, '<input type="hidden" name="acao" value="adicionarArtigo">'."\n");
			eco($tab, '<input type="hidden" name="palavrasChave" value="'.$palavrasChave.'">'."\n");
     	    eco($tab,'</form>'."\n");
    	    eco($tab,'<form action="autor.php">'."\n");
			eco($tab, '<input type="submit" name="botao" value="N&atilde;o" onclick="history.back()">'."\n");
     	    eco($tab,'</form>'."\n");
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
