<?php
header('Content-Type: text/html; charset=ISO-8859-1');
session_start();
if( (!isset($_SESSION['nome'])) AND (!isset($_SESSION[tipo])) )
 Header("Location: ../");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-5589-1" />
<title>Revista Ação Ergonômica</title>
<link rel="stylesheet" type="text/css" href="../../estilos.css">
<script language="javascript" src="../../script.js"></script>
<script language="javascript" src="ajax.js"></script>
</head>
<body>
<table border="0" width="100%" cellspacing="0" cellpadding="0" vspace="0" hspace="0">
<tr>
    <td>
    <table border="0" width="100%" cellspacing="0" cellpadding="0" vspace="0" hspace="0" align="center" class="top">
    <tr>
        <td valign="top" >
        <img border="0" src="../../img/uniabeu.png" width="18%" onClick="irParaPagina('index.php')" rowspan="2" valign="top" class="pointer"  style="padding-top: 2%;padding-left: 3%">
        </td>
        <td width="50">
        <a href="../logout.php" onMouseOver="javascript:sair.src='../../img/botaoIn.jpg'" onMouseOut="javascript:sair.src='../../img/botaoOut.jpg'"><img src="../../img/botaoOut.jpg" border="0" name="sair"></a>
        </td>
    </tr>
    <tr><td colspan="2" align="right" class="bemVindo">Olá <b><?=$_SESSION['nome']?></b>, seja bem-vindo!!</td></tr>
    <tr><td height="5"></td></tr>
    <tr>
        <td colspan="2">
        <table border="0" align="right" width="100%" cellspacing="0" cellpadding="0" vspace="0" hspace="0" >
            <tr align="center" height="20" >
                <center>
                <div class="menuMeio">
                    <br>
                <a id="menu1" href="#" onClick="irParaPagina('../usuarios/')" width="121">Cadastro de Usuários</a> |
               <!--  <a id="menu2" href="#" onClick="irParaPagina('../paginas/cadastrar.php')" width="121">Cadastro de Páginas</a> |  --> 
                <a id="menu3" href="#" onClick="irParaPagina('../paginas/')" width="121">Cadastro de textos do site</a> |
                <a id="menu4" href="#" onClick="irParaPagina('../exemplar/')" width="121">Cadastro de Exemplares</a> |
                <a id="menu5" href="#" onClick="irParaPagina('../artigo/')" width="121">Cadastro de Artigos</a>
                </div>
            </center>
            </tr>
         </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
