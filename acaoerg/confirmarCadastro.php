<?php
	include'funcoes.php';
    session_start();
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
			<h3>Confirma&ccedil;&atilde;o</h3>
<?php 
	$tab = 4;

    	    eco($tab,'<form action="executarCadastro.php" method="post">'."\n");

    	    eco($tab,'<p><br />'.$nome.', voc&ecirc; tem certeza que deseja se cadastrar com o login "'.$login.'", email "'.$email.'" e senha "'.$senha.'" tendo '.$formacao.' como forma&ccedil;&atilde;o e '.$local_de_trabalho.' como local de trabalho</p>');
					eco($tab, '&nbsp;&nbsp;<input type="submit" name="botao" value="Sim">&nbsp;&nbsp;'."\n");
			    eco($tab,'</form>'."\n");
    	    eco($tab,'<form action="cadastro.html">'."\n");
					eco($tab, '<input type="submit" name="botao" value="N&atilde;o">'."\n");
     	    eco($tab,'</form>'."\n");
 
?>						
			<hr />

		</div>


	</div>
</body>

</html>
