<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Artigo/Artigo.class.php");
    include_once("../Artigo/ArtigoDAO.class.php");
    include_once("../Util/Util.class.php");
chdir(dirname(__FILE__));
//error_reporting(0);

$Artigo = new Artigo();
$Util   = new Util();

if(isSet($_POST['alterou'])){
    $Artigo->alterarArtigoByCod($_POST['codArtigo'], $_POST['codExemplar'], $_POST['titulo'], $_POST['autores'], $_POST['pagInicial'], $_POST['pagFinal'], $_POST['palChave'], $_POST['status']);
    header("location: ./?alterou=true");
    die();
}

include("../template/templateTopAdmin.php");

$dados = $Artigo->getArtigosByCod($_GET['idArtigo']);
?>

    <table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center">
    <tr><td colspan="2" class="titulo">Alterar Artigo</td></tr>
    <form method="post" action="<?=$PHP_SELF?>">
    <tr>
        <td class="textAdmin" style="text-align: right;">
        <input type="hidden" name="alterou" value="true" />
        <input type="hidden" name="codArtigo" value="<?=$_GET['idArtigo']?>" />
        Código do Exemplar:
        </td>
        <td><textarea name="codExemplar" cols="50" rows="1" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['codExemplar']?></textarea></td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        Título:
        </td>
        <td><textarea name="titulo" cols="50" rows="2" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['tit']?></textarea></td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        Autores:
        </td>
        <td><textarea name="autores" cols="50" rows="2" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['aut']?></textarea></td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        Página Inicial:
        </td>
        <td><textarea name="pagInicial" cols="50" rows="1" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['pagInicial']?></textarea></td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        Página Final:
        </td>
        <td><textarea name="pagFinal" cols="50" rows="1" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['pagFinal']?></textarea></td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        Palavras Chave:
        </td>
        <td><textarea name="palChave" cols="50" rows="1" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['palChave']?></textarea></td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        Status:
        </td>
        <td><?=$Util->select($dados['status'])?></td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><input type="submit" value="Alterar Artigo" /></td></tr>
    </form>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><a href="./">Voltar</a></td></tr>
    </table>
    <script language="javascript"> selecionar(5); </script>
<?php
include("../template/templateDownAdmin.php");
?>
