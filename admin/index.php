<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1 />
<title>Revista Ação Ergonômica</title>
<link rel="stylesheet" type="text/css" href="../estilos.css">
<script language="javascript" src="../script.js"></script>
<script language="javascript" src="ajax.js"></script>
</head>
<body bgcolor="#eeeeee">
<table border="0" width="100%" cellspacing="0" cellpadding="0" vspace="0" hspace="0">
<tr>
    <td>
    <table border="0" width="40%" cellspacing="0" cellpadding="0" vspace="0" hspace="0" align="center">
    <tr>
        <td height="106" style="text-align: left; font-size: 35pt; color: #3E5A96; text-decoration: underline;" valign="bottom">
        Área Administrativa
        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td colspan="2" onClick="irParaPagina('index.php')" valign="bottom">
        <img border="0" src="../img/logo.jpg">
        </td>
    </tr>
    </table>
    </td>
</tr>
<tr><td class="topLogin"></td></tr>
<tr>
    <td  bgcolor="#dddddd">
    <table border="0" width="20%" cellspacing="5" cellpadding="0" vspace="0" hspace="0" align="center">
    <form method="post" action="autenticar.php">
    <tr align="center">
        <td class="textAdmin">Usuráio:</td>
        <td><input type="text" name="usuario" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></td>
        <td rowspan="4"><img src="../img/fundoLogin.jpg"></td>
    </tr>
    <tr align="center">
        <td class="textAdmin">Senha:</td>
        <td><input type="password" name="senha" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
        <td align="center" colspan="2">
        <input type="submit" value="logar">&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Limpar">
        </td>
    </tr>
    </form>
    </table>
    </td>
</tr>
<tr><td class="downLogin"></td></tr>
</table>
</body>
</html>
