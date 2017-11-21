<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("Conexao/");
    include_once("../template/templateIndTop.php");
    include_once("Conexao.class.php");
    include_once("../Pagina/Pagina.class.php");
    include_once("../Pagina/PaginaDAO.class.php");
    include_once("../Util/Util.class.php");
chdir(dirname(__FILE__));
error_reporting(0);
$idPagina = 41;
$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa

$Util = new Util();
$Pagina = new Pagina($idPagina,$idIdioma);
$Pagina->carregarTextos();
?>
<table border="0" width="98%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
<tr><td class="titulo"><?=$Pagina->textos[33]?></td></tr>
<tr><td class="text"><?=$Util->paragrafoTexto($Pagina->textos[34])?></td></tr>
<tr><td class="titulo"><?=$Pagina->textos[35]?></td></tr>
<tr><td class="text"><?=$Pagina->textos[36]?></td></tr>
<tr><td class="titulo"><?=$Pagina->textos[37]?></td></tr>
<tr><td class="text"><?=$Pagina->textos[38]?></td></tr>
<tr><td class="titulo"><?=$Pagina->textos[39]?></td></tr>
<tr><td class="text"><?=$Util->paragrafoTexto($Pagina->textos[40])?></td></tr>
</table>

<?php
chdir("Conexao/");
    include_once("../template/templateIndDown.php");
chdir(dirname(__FILE__));
error_reporting(0);
?>
