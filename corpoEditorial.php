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
$idPagina = 3;
$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa

$Util = new Util();
$Pagina = new Pagina($idPagina,$idIdioma);
$Pagina->carregarTextos();

function quebraTexto($string){
  $paragrafo  = "<div class='tituloB'>";
  $paragrafo .= str_replace("\n","</div><br><div class='titulo'>",$string);
  $paragrafo .= "</div>";
  return $paragrafo;
}
?>
<table border="0" width="98%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
<tr><td class="titulo"><?=quebraTexto($Pagina->textos[7])?></td></tr>
<tr><td class="text"><?=$Pagina->textos[8]?></td></tr>
<tr><td class="titulo"><?=$Pagina->textos[6]?></td></tr>
<tr><td class="text"><?=$Util->paragrafoTexto($Pagina->textos[9])?></td></tr>
<tr><td class="titulo"><?=$Pagina->textos[10]?></td></tr>
<tr><td class="text"><?=$Pagina->textos[11]?></td></tr>
<tr><td class="titulo"><?=$Pagina->textos[12]?></td></tr>
<tr><td class="text" valig="top"><?=$Util->paragrafoTexto($Pagina->textos[13])?></td></tr>
</table>
<script language="javascript"> selecionar(3); </script>
<?php
chdir("Conexao/");
    include_once("../template/templateIndDown.php");
chdir(dirname(__FILE__));
error_reporting(0);
?>
