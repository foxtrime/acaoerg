<html>
<head>
<script language="javascript">

function checa_formulario(email){

        if (email.nome.value == ""){
  alert("Por Favor nao deixe o seu nome em branco!!!");
   email.nome.focus();
        return (false);
}

        if (email.email_from.value == ""){
  alert("Por Favor nao deixe o seu email em branco!!!");
   email.email_from.focus();
        return (false);
}

        if (email.email.value == ""){
  alert("Nao deixe o email destinatario em branco!!!");
   email.email.focus();
        return (false);
}

        if (email.assunto.value == ""){
  alert("Nao deixe o assunto em branco!!!");
   email.assunto.focus();
        return (false);
}

}
</script>
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
<form onsubmit="return checa_formulario(this)" action="envia.php" method="post" enctype="multipart/form-data" name="email">
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
      <td><div align="right" class="texto">Para</div></td>
      <td><input name="email" type="text" class="email">
    </tr>
    <tr>
      <td><div align="right" class="texto">Assunto</div></td>
      <td><input name="assunto" type="text" id="assunto"></td>
    </tr>
    <tr>
      <td><div align="right" class="texto">Mensagem</div></td>
      <td><textarea name="mensagem" cols="50" rows="10" id="mensagem"></textarea></td>
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
