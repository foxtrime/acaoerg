<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>A&ccedil;&atilde;o Ergon&ocirc;mica - Banco de Dados</title>
<link href="css/coreseestrutura.css" rel="stylesheet" media="screen">
<link href="css/figura.css" rel="stylesheet" media="screen">

<script type="text/javascript" src="js/menu.js"></script>
<style type="text/css">
<!--
.menu   { width: 50% }
-->
</style>
</head>
<body>
	<div id="conteudo">
		<div id="titulo">
			<h1>A&ccedil;&atilde;o Ergon&ocirc;mica</h1>
		</div>
		<div id="navegacao">
			<div id="menu1" class="menu" onmouseover="over(1)" onmouseout="out(1)">					
      		<div class="caixa">Login</div>
				<div id="item1" class="item">
					<form action="autentica.php" method="post">								
					  <div class="caixa"><label for="login">Usu&aacute;rio</label>
						<input type="text" name="login" id="login" size="15" />
			  			</div>												
								
					  <div class="caixa"><label for="senha">Senha</label>
						<input type="password" id="senha" name="senha" size="15" />
					  </div>
								
					  <div class="caixa"> 
						<input type="submit" name="Enviar" value="Enviar Dados" class="botao" />
					  </div>
					</form>
		  		</div>						
	  		</div>	
			<div id="menu2" class="menu"> <a href ="javascript:window.close()">Fechar</a></div>						
		</div>				
		<div id="corpo">
			<h3>P&aacute;gina de atualiza&ccedil;&atilde;o do banco de dados da revista A&ccedil;&atilde;o Ergon&ocirc;mica. </h3>
		</div>
	</div>

</body>
</html>
