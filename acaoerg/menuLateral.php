<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
 "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
  <title>Menu Lateral</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <script type="text/javascript" src="js/form.js"></script>
  <link rel="stylesheet" href="css/menuLateral.css" type="text/css">
  <link rel="stylesheet" href="css/texto.css" type="text/css">		
</head>
<body>
<?php
		 include('funcoes.php');
		 $tab = 1;
		 //menuLateral($tab,$itemMenu,$itemMenuEdicoes);
		 menuLateral2($tab,((isset($itemMenu))?$itemMenu:NULL),((isset($itemMenuEdicoes))?$itemMenuEdicoes:NULL)); 
?>
</body>
</html>
