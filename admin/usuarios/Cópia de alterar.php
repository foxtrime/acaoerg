<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Users/Users.class.php");
    include_once("../Users/UsersDAO.class.php");
    include_once("../Util/Util.class.php");
chdir(dirname(__FILE__));
//error_reporting(0);

$idUsers = $_GET['idUsers'];

$Users   = new Users();
$Util   = new Util();

if(isSet($_POST['alterou'])){
    $senhaCript = md5(strtolower(trim($_POST['senha'])));
    $Users->alterarUsersByCod($_POST['idUsers'], $_POST['login'], $senhaCript, $_POST['nome'], $_POST['formacao'], $_POST['local'], $_POST['email'], $_POST['tipo']);
    header("location: ./?alterou=true");
    die();
}

include("../template/templateTopAdmin.php");

$textos = $Users->getUsersByCod($idUsers);
?>

<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center">
<tr><td colspan="2" class="titulo">Alterar Usuário</td></tr>
<form method="post" action="<?=$PHP_SELF?>">
<tr>
    <td class="textAdmin" style="text-align: right;">
    <input type="hidden" name="alterou" value="true" />
    <input type="hidden" name="idUsers" value="<?=$_GET['idUsers']?>" />
    Login:
    </td>
    <td><textarea name="login" cols="50" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['login']?></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Senha:</td>
    <td><input type="password" name="senha" value="<?=$textos['senha']?>" size="66" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>

</tr>

<tr>
    <td class="textAdmin" style="text-align: right;">Nome:</td>
    <td><textarea name="nome" cols="50" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['nome']?></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Formação:</td>
    <td><textarea name="formacao" cols="50" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['form']?></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Local de Trabalho:</td>
    <td><textarea name="local" cols="50" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['local']?></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">E-mail:</td>
    <td><textarea name="email" cols="50" rows="3" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$textos['email']?></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">
    Tipo:
    </td>
    <td><?=$Util->selectTipo($textos['tipo'])?></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><input type="submit" value="Alterar Usuário" /></td></tr>
</form>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><a href="./">Voltar</a></td></tr>
</table>
<script language="javascript"> selecionar(1); </script>
<?php
include("../template/templateDownAdmin.php");
?>
