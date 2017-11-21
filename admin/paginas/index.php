<?php
include("../template/templateTopAdmin.php");
?>
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
//session_start();
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Pagina/Pagina.class.php");
    include_once("../Pagina/PaginaDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);
$Pagina = new Pagina();
$listaDePaginas = $Pagina->getPaginas();
?>
<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center" style="
    background-color: #eeeeee;
">
<tr><td class="tituloB">Selecione a página</td></tr>
<?php foreach($listaDePaginas as $idPagina => $pagina){ ?>
<tr><td><a href="../textos/?idPagina=<?=$idPagina?>"><?=$pagina?></a></td></tr>
<?php } ?>
<tr><td>&nbsp;</td></tr>
<tr><td><a href="../home">Voltar</a></td></tr>
</tr>
</table>
<script language="javascript"> selecionar(3); </script>
<?php
include("../template/templateDownAdmin.php");
?>
