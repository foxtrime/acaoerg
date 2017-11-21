<html>
<head>
			<title>Conteudo</title>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="js/form.js"></script>
<link rel="stylesheet" href="css/conteudo.css" type="text/css">
<link rel="stylesheet" href="css/texto.css" type="text/css">				
</head>
<body>
	<div id="corpo"> 
<?php
		 include('funcoes.php');
		 $tab=2;
		 conteudo2($tab,((isset($itemMenu))?$itemMenu:NULL),((isset($itemMenuEdicoes))?$itemMenuEdicoes:NULL));	 
?>
	</div>
</body>
</html>
