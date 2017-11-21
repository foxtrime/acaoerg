<html>
<head>
<title>Conteudo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="js/form.js"></script>
<link rel="stylesheet" href="css/figuraLateral.css" type="text/css">
<link rel="stylesheet" href="css/texto.css" type="text/css">				
</head>
<body>
<?php
		 include('funcoes.php');
		 $tab=1;
		 if (!((isset($itemMenu))|(isset($itemMenuEdicoes)))){
		 	eco($tab,"&Uacute;ltimos N&uacute;meros\n");
			conectar($conexao);
			$sql = "SELECT codigoDoExemplar, numeroDoExemplar, volumeDoExemplar FROM exemplar WHERE status = 'Publicado' ORDER BY volumeDoExemplar DESC, numeroDoExemplar DESC";
			query($conexao,$sql,$resultado);
			$flag =1;
			while (($linha=mysql_fetch_array($resultado)) & ($flag < 3)) {
				$diretorio = "vol".$linha['volumeDoExemplar']."n".$linha['numeroDoExemplar'];
				if (file_exists("../revistaonline/".$diretorio."/capa.jpg")){
					$extensao = "jpg";
					$flag++;
				}else if (file_exists("../revistaonline/".$diretorio."/capa.gif")){
					$extensao = "gif";
					$flag++;
				}
				
				if (!empty($extensao)){
					eco($tab++,"<script type=\"text/javascript\">\n");
					eco($tab,"document.write(\"<div id='figuraCapa$flag'><a href='index.php?itemMenuEdicoes=".$linha['codigoDoExemplar']."' target='_parent'><img src='".$diretorio."/capa.".$extensao."' height='\"+Math.floor((185*(screen.availWidth/1024)))+\"' width='\"+Math.floor((135*(screen.availWidth/1024)))+\"' /></a></div>\");\n");
					eco(--$tab,"</script>\n");
				}
			}		
		 } else {
		 figuraLateral($tab,((isset($itemMenu))?$itemMenu:NULL),((isset($itemMenuEdicoes))?$itemMenuEdicoes:NULL));		 
		 }
?>
</body>
</html>
