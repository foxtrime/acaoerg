<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
 "http://www.w3.org/TR/html4/frameset.dtd">

<?php
 		include('funcoes.php');
?> 
<html>
<head>
<title>Revista A&ccedil;&atilde;o Ergon&ocirc;mica</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="author" content="Pieter Monteiro da Silva Veldman pieterveldman@gmail.com" />
<meta name="keywords" content="Ergonomia, Ergonomics, A��o Ergon�mica, Acao Ergonomica, Ergonomica, Revista, Online" />
</head>
<script type="text/javascript">
//	alert("<frameset rows='"+Math.floor((110*(screen.availWidth/1024)))+",*,50' frameborder='0' border='0' framespacing='0' >")
	document.write("<frameset rows=\""+Math.floor((110*(screen.availWidth/1024)))+",*,50\" frameborder=\"0\" border=\"0\" framespacing=\"0\" >");
	document.write("<frame src=\"topo.php\" name=\"topo\" frameborder=\"0\" scrolling=\"no\">");
//	alert(screen.availWidth);
//	alert("<frameset cols=\"17%,*,"+Math.floor((180*(screen.availWidth/1024)))+"\" frameborder=\"0\" border=\"0\" framespacing=\"0\" >");
	document.write("<frameset cols=\"20%,*,"+Math.floor((180*(screen.availWidth/1024)))+"\" frameborder=\"0\" border=\"0\" framespacing=\"0\" >");
</script>
 

 <?php
 		$tab=1;
		$complemento = "";
		$flag = 0;
		if (isset($itemMenu)){
			 $complemento .= (($flag)?";&":"?")."itemMenu=$itemMenu";
			 $flag=1;
		}
		if (isset($itemMenuEdicoes)){
			 $complemento .= (($flag)?";&":"?")."itemMenuEdicoes=$itemMenuEdicoes";
			 $flag=1;
		}		

		eco($tab,"<frame src=\"menuLateral.php".$complemento."\" name=\"menuLateral\" frameborder=\"0\" noresize>");
		eco($tab,"<frame src=\"conteudo.php".$complemento."\" name=\"conteudo\" frameborder=\"0\">");
		eco($tab,"<frame src=\"figuraLateral.php".$complemento."\" name=\"figuraLateral\" scrolling=\"no\" frameborder=\"0\">");
 ?>
	</frameset>
  <frame src="rodape.html" name="rodape" frameborder="0" scrolling="no">
<noframes>
<p><strong>Revista A&ccedil;&atilde;o Ergon&ocirc;mica. </strong></p>
<p>A��o Ergon�mica � um peri�dico cient�fico e tecnol�gico que visa propiciar aos
  pesquisadores e agentes de mudan�as nas organiza��es que atuam no Brasil, as bases
  conceituais, metodol�gicas e instrumentais para a��es e projetos que visem melhorar de
  forma integrada e n�o dissociada a seguran�a, o conforto, o bem-estar e a efic�cia das
  atividades humanas mediante o estudo das intera��es das pessoas com a atualidade e o
  futuro das tecnologias, da organiza��o e dos ambientes que as acolhem.
 </p>
</noframes>
</frameset>
</html>


