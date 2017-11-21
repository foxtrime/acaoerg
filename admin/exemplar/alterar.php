<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Exemplares/Exemplares.class.php");
    include_once("../Exemplares/ExemplaresDAO.class.php");
    include_once("../Util/Util.class.php");
chdir(dirname(__FILE__));
//error_reporting(0);

$idExemplar = $_GET['idExemplar'];

$Exemplares   = new Exemplares();
$Util   = new Util();

if(isSet($_POST['alterou'])){
    $Exemplares->alterarExemplarByCod($_POST['idExemplar'], $_POST['nome'], $_POST['issn'], $_POST['entidade'], $_POST['mes'], $_POST['ano'], $_POST['numero'], $_POST['vol'], $_POST['status']);
    header("location: ./?alterou=true");
    die();
}

include("../template/templateTopAdmin.php");

$textos = $Exemplares->getExemplarByCod($idExemplar);
?>
<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center"  style="background-color: #eeeeee;">
<tr><td colspan="3" class="titulo">Alterar Exemplar</td></tr>
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<tr>
    <td class="textAdmin" style="text-align: right;">
    <input type="hidden" name="alterou" value="true" />
    <input colspan="3" type="hidden" name="idExemplar" value="<?=$_GET['idExemplar']?>" />
    Nome do Exemplar:
    </td>
    <td><textarea name="nome" cols="50" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['nome']?></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">
    ISSN:
    </td>
    <td><textarea name="issn" cols="50" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['issn']?></textarea></td>
    <td rowspan="7" width="180" align="center" valign="top">
		<img src="cadastrar/capa/<?=$textos['capa']?>" width="150"><br>
		<a href='formAlterarCapa.php?idExemplar=<?=$_GET['idExemplar']?>'>Alterar Capa</a>
	</td>
</tr>

<tr>
    <td class="textAdmin" style="text-align: right;">
    Entidade Mantenedora:
    </td>
    <td><textarea name="entidade" cols="50" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['entid']?></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">
    M�s do Exemplar:
    </td>
    <td><textarea name="mes" cols="50" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['mes']?></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">
    Ano do Exemplar:
    </td>
    <td><textarea name="ano" cols="50" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['ano']?></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">
    N�mero do Exemplar:
    </td>
    <td><textarea name="numero" cols="50" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['num']?></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">
    Volume do Exemplar:
    </td>
    <td><textarea name="vol" cols="50" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['vol']?></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">
    Status:
    </td>
    <td><?=$Util->select($textos['status'])?></td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3"><input type="submit" value="Alterar Exemplar" /></td></tr>
</form>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3"><a href="./">Voltar</a></td></tr>
</table>
<script language="javascript"> selecionar(4); </script>
<?php
include("../template/templateDownAdmin.php");
?>
