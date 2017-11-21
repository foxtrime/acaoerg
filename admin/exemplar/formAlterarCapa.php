<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Exemplares/Exemplares.class.php");
    include_once("../Exemplares/ExemplaresDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$idExemplar = $_GET['idExemplar'];

//echo $idEvento;

$Exemplares   = new Exemplares();

include("../template/templateTopAdmin.php");

$textos = $Exemplares->getExemplarByCod($idExemplar);
?>

<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center"  style="background-color: #eeeeee;">
<tr>
    <td class="titulo" colspan="2">Alterar Capa</td>
</tr>
<form method="post" action="cadastrar/alterarCapa.php" enctype="multipart/form-data">
<tr>
    <td class="textAdmin" style="text-align: right;">
    <input type="hidden" name="idExemplar" value="<?=$_GET['idExemplar']?>" />
    Imagem Logo:
    </td>
    <td>
        <input type="file" name="arquivo" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" />
    </td>
</tr>
<tr>
    <td colspan="2" class='msgErroForm'>
    <?php
    if(isSet($_GET['select'])) {
      echo "Você deve selecionar uma arquivo.";
    }else{
      echo "&nbsp;";
    }
    ?>
    </td>
</tr>
<tr><td colspan="2"><input type="submit" value="Alterar Capa" /></td></tr>
</form>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><a href="./">Voltar</a></td></tr>
</table>
<script language="javascript"> selecionar(4); </script>
<?php
include("../template/templateDownAdmin.php");
?>
