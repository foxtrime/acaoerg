<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("./Conexao/");
    include_once("Conexao.class.php");
    include_once("../Artigos/Artigos.class.php");
    include_once("../Artigos/ArtigosDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(1);

$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa

$idArtigo = $_GET['idArtigo'];

$Artigos  = new Artigos();

$dadosArtigo   = $Artigos->getArtigosByCod($idArtigo);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-5589-1" />
<meta name="author" content="Carlos Eduardo Rezende ce.rezende@gmail.com" />
<meta name="keywords" content="Ergonomia, Ergonomics, Ação Ergonômica, Acao Ergonomica, Ergonomica, Revista, Online" />
<title>Revista Ação Ergonômica</title>
<link rel="stylesheet" type="text/css" href="./estilos.css">
<script language="javascript" src="./script.js"></script>
<script language="javascript" src="./ajax.js"></script>

<script language="javascript">
function fecharPagina() {
  window.close();
}
</script>

</head>
<body>
<table border="0" width="100%" cellspacing="0" cellpadding="5" vspace="0" hspace="0" class="tableConteudo">
<tr>
    <td class="titulo" width="575"><img src="./img/logo.jpg"></td>
    <td
        onclick="javascritp:fecharPagina()"
        onMouseOver="javascript:fechar.src='./img/fecharIn.gif'"
        onMouseOut="javascript:fechar.src='./img/fecharOut.gif'"
        class="autor"
        valign="top"
        style="text-align: right; cursor: pointer;"
    >
        FECHAR&nbsp;&nbsp;&nbsp;<img src="./img/fecharOut.gif" align="ABSMIDDLE" name="fechar">
    </td>
</tr>
<tr>
    <td colspan="2">
    <div class="bordaRevista">
    <table border="0" width="100%" cellspacing="0" cellpadding="5" vspace="0" hspace="0" class="tableConteudo">
    <tr bgcolor="#dddddd">
        <td class="titulo">Título</td>
    </tr>
    <tr bgcolor="#dddddd">
        <td class="text"><?=$dadosArtigo['tit']?></td>
    </tr>
    <tr>
        <td class="titulo">Autores</td>
    </tr>
    <tr>
        <td class="text"><?=$dadosArtigo['aut']?></td>
    </tr>
    <tr bgcolor="#dddddd">
        <td class="titulo">E-mail</td>
    </tr>
    <tr bgcolor="#dddddd">
        <td class="text"><?=$dadosArtigo['email']?></td>
    </tr>
    <tr>
        <td class="titulo">Resumo</td>
    </tr>
    <tr>
        <td class="text"><?=$dadosArtigo['resumo']?></td>
    </tr>
    <tr bgcolor="#dddddd">
        <td class="titulo">Palavras Chave</td>
    </tr>
    <tr bgcolor="#dddddd">
        <td class="text"><?=$dadosArtigo['palChave']?></td>
    </tr>
    <tr>
        <td class="titulo" colspan="2">
        Baixar Artigo &nbsp;
        <a href="./admin/artigo/cadastrar/artigos/<?=$dadosArtigo['arquivo']?>" target="_blank">
            <img src="./img/pdf.jpg" border="0">
        </a>
        </td>
    </tr>
    </div>
    </table>
    </td>
</tr>
<tr><td colspan="2" class="divisoria"></td></tr>
<tr>
    <td colspan="2" height="35" class="rodape">
    Produção Editoral<br>
    GENTE - Grupo de Ergonomia e Novas tecnologias - COPPE / UFRJ
    </td>
</tr>
</table>
</body>
</html>
