<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Artigos/Artigos.class.php");
    include_once("../Artigos/ArtigosDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$idArtigo = $_GET['idArtigo'];
//echo $idArtigo;

$Artigos   = new Artigos();

include("../template/templateTopAdmin.php");

$textos = $Artigos->getArtigosByCod($idEvento);
?>

<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center" style="background-color: #eeeeee;">
<tr>
    <td class="titulo" colspan="2">Alterar Artigo</td>
</tr>
<form method="post" action="cadastrar/alterarArtigo.php" enctype="multipart/form-data">
<tr>
    <td class="textAdmin" style="text-align: right;">
    <input type="hidden" name="idArtigo" value="<?=$_GET['idArtigo']?>" />
    Artigo:
    </td>
    <td>
        <input type="file" name="arquivo" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" />
    </td>
</tr>
<tr>
    <td colspan="2" class="msgErroForm">
    <?php
    if(isSet($_GET['select'])) {
      echo "Você deve selecionar uma arquivo.";
    }else{
      echo "&nbsp;";
    }
    ?>
    </td>
</tr>
<tr><td colspan="2"><input type="submit" value="Alterar Artigo" /></td></tr>
</form>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><a href="./">Voltar</a></td></tr>
</table>
<script language="javascript"> selecionar(4); </script>
<?php
include("../template/templateDownAdmin.php");
?>
