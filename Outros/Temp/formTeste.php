<html>
<head>
<title>Enviando texto</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.email {
text-transform: lowercase;
}
.texto {
color: #0000FF
}
.style1 {color: #FF0000}

-->
</style>
</head>

<body onload="document.email.nome.focus();">
<form action="envia.php" method="post" enctype="multipart/form-data" name="email">
  <h1 align="center" class="style1">Formulario de email com anexo </h1>
  <table width="32%"  border="0" align="center">
    <tr>
      <td>Nome</td>
      <td><input name="nome" type="text" id="nome"></td>
    </tr>
    <tr>
      <td width="33%"><div align="right" class="texto">De:</div></td>
      <td width="67%"><input name="email_from" type="text" class="email"></td>
    </tr>
    <tr>
      <td><div align="right" class="texto">Telefone</div></td>
      <td><input name="telefone" type="text" id="telefone"></td>
    </tr>
    <tr>
      <td><div align="right" class="texto">Anexo</div></td>
      <td><input name="arquivo" type="file"></td>
    </tr>
    <tr>
      <td> </td>
      <td><input type="submit" name="Submit" value="Enviar"></td>
    </tr>
  </table>
</form>
</body>
</html>
