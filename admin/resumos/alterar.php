<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Resumo/Resumo.class.php");
    include_once("../Resumo/ResumoDAO.class.php");
    include_once("../Util/Util.class.php");
chdir(dirname(__FILE__));
//error_reporting(0);

$Resumo = new Resumo();
$Util   = new Util();

if(isSet($_POST['alterou'])){
    $Resumo->alterarResumoByCod($_POST['idResumo'], $_POST['resumo'], $_POST['email'], $_POST['idArtigo']);
    header("location: ./?alterou=true");
    die();
}

include("../template/templateTopAdmin.php");

$idArtigo = $_GET['idArtigo'];

$dados = $Resumo->getResumoByCod($idArtigo);
?>

    <table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center">
    <tr><td colspan="2" class="titulo">Alterar Resumo</td></tr>
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    <tr>
        <td class="textAdmin" style="text-align: right;">
        <input type="hidden" name="alterou" value="true" />
        <input type="hidden" name="idResumo" value="<?=$dados['id']?>" />
        Resumo:
        </td>
        <td>
            <textarea name="resumo" cols="50" rows="5" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['resumo']?></textarea>
        </td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        E-mail:
        </td>
        <td>
            <textarea name="email" cols="50" rows="2" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['email']?></textarea>
        </td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        ID Artigo:
        </td>
        <td>
            <textarea name="idArtigo" cols="50" rows="2" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$idArtigo?></textarea>
        </td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><input type="submit" value="Alterar Resumo" /></td></tr>
    </form>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><a href="./">Voltar</a></td></tr>
    </table>
    <script language="javascript"> selecionar(6); </script>
<?php
include("../template/templateDownAdmin.php");
?>
