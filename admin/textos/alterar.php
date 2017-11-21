<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Pagina/Pagina.class.php");
    include_once("../Pagina/PaginaDAO.class.php");
chdir(dirname(__FILE__));
//error_reporting(0);

$Pagina = new Pagina();

if(isSet($_POST['alterou'])){
    $Pagina->alterarTextosById($_POST['texto_pt'], $_POST['texto_en'], $_POST['texto_es'], $_POST['idTexto']);
    header("location: ./?idPagina=".$_POST['idPagina']."&alterou=true");
    die();
}

include("../template/templateTopAdmin.php");

$textos = $Pagina->getTextosById($_GET['idTexto']);

?>
<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center">
<tr><td colspan="2" class="titulo">Alterar Textos</td></tr>
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<tr>
    <td class="textAdmin" style="text-align: right;">
    <input type="hidden" name="alterou" value="true" />
    <input type="hidden" name="idTexto" value="<?=$_GET['idTexto']?>" />
    <input type="hidden" name="idPagina" value="<?=$textos['idPagina']?>" />
    Texto em Português:
    </td>
    <td><textarea name="texto_pt" cols="70" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['textoPt']?></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">
    Texto em Inglês:
    </td>
    <td><textarea name="texto_en" cols="70" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['textoEn']?></textarea></td>
</tr><tr>
    <td class="textAdmin" style="text-align: right;">
    Texto em Espanhol:
    </td>
    <td><textarea name="texto_es" cols="70" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['textoEs']?></textarea></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><input type="submit" value="Alterar Textos" /></td></tr>
</form>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><a href="./?idPagina=<?=$textos['idPagina']?>">Voltar</a></td></tr>
</table>
<script language="javascript"> selecionar(3); </script>
<?php
include("../template/templateDownAdmin.php");
?>
