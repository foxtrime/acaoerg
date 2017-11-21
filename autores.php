<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("Conexao/");
    include_once("../template/templateIndTop.php");
    include_once("Conexao.class.php");
    include_once("../Pagina/Pagina.class.php");
    include_once("../Pagina/PaginaDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);
$idPagina = 4;
$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa

$Pagina = new Pagina($idPagina,$idIdioma);
$Pagina->carregarTextos();
?>
<table border="0" width="98%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
<tr><td class="titulo"><a href="docs/guiaAutor.pdf" target="_blank"><?=$Pagina->textos[14]?></a></td></tr>
<tr><td class="text"><?=$Pagina->insertParagrafo($Pagina->textos[15])?></td></tr>
<tr><td class="titulo"><?=$Pagina->textos[20]?></td></tr>
<tr><td class="text"><?=$Pagina->insertLinkGuiaAutor($Pagina->textos[21])?></td></tr>
<tr><td class="text"><?=$Pagina->insertRevista($Pagina->textos[22])?></td></tr>
</table>
<script language="javascript"> selecionar(4); </script>
<?php
chdir("Conexao/");
    include_once("../template/templateIndDown.php");
chdir(dirname(__FILE__));
error_reporting(0);
?>
