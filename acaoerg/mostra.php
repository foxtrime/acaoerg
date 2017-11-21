<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
 "http://www.w3.org/TR/html4/frameset.dtd">

<?php
 		include('funcoes.php');
?> 
<html>
<head>
<title>Revista A&ccedil;&atilde;o Ergon&ocirc;mica</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script type="text/javascript">
	document.write("<frameset rows=\""+Math.floor((110*(screen.availWidth/1024)))+",*,50\" frameborder=\"0\" border=\"0\" framespacing=\"0\" >");
</script>
 <frame src="topo.php" name="topo" scrolling="no">
 <?php
		$paginas = array("artigos","criarLista","resumos","pdfs","cadastro");
 		$tab=1;
		 	$parametros = "?";
			$flag = 0;
  		foreach ($_POST as $key => $value) {
			if ($key != "cp"){
				if ($flag ==1 ){
					 $parametros .= "&";
				} 
				$flag =1;
				$parametros .= $key."=".$value;
			}
  		}
  		foreach ($_GET as $key => $value) {
			if ($key != "cp"){
				if ($flag ==1 ){
					 $parametros .= "&";
				} 
				$flag =1;
				$parametros .= $key."=".$value;
			}
  		}

		eco($tab,"<frame src=\"".$paginas[$cp].".php".$parametros."\" name=\"menuLateral\" scrolling=\"auto\" frameborder=\"0\" noresize>\n");
 ?>
 <frame src="rodape.html" name="rodape" scrolling="no">
<noframes>
<div id="corpo"> 
		 Revista A&ccedil;&atilde;o Ergon&ocirc;mica.
</div>

</noframes>
</frameset>
</html>