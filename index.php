<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("Conexao/");
    include_once("../template/templateIndTop.php");
    include_once("Conexao.class.php");
    include_once("../Pagina/Pagina.class.php");
    include_once("../Pagina/PaginaDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);
$idPagina = 1;
$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa

$Pagina = new Pagina($idPagina,$idIdioma);
$Pagina->carregarTextos();
?>
<table border="0" width="80%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
<tr><td class="titulo"><font color="#000022"><?=$Pagina->textos[1]?></td></tr>
<tr><td class="text"><?=$Pagina->textos[2]?></td></tr>
<tr><td class="titulo"><font color="#000022"><b><?=$Pagina->textos[3]?></td></tr>
<tr><td class="text"><?=$Pagina->textos[4]?></td></tr>
<tr><td class="text"><?=$Pagina->insertLinkDef($Pagina->textos[16])?></td></tr>
<tr><td class="titulo"><font color="#000022"><?=$Pagina->textos[17]?></td></tr>
<tr><td class="text"><?=$Pagina->insertLinkGuiaAutor($Pagina->textos[18])?></td></tr>
<tr><td class="text"><?=$Pagina->insertRevista($Pagina->textos[19])?></td></tr>
</table>
<script language="javascript"> selecionar(2); </script>
<?php
chdir("Conexao/");
    include_once("../template/templateIndDown.php");
chdir(dirname(__FILE__));
error_reporting(0);
?>
